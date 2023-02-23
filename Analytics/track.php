<?php
@session_start();



include './Userinfo.php';
include './connection.php';

class Analytics
{
    public $trackingKey  = "visitid";
    public $engagementKey = "engid";
    public $sessionKey = "PHPSESSID";
    public $domain = ""; // mention your domain name in .example.com 
    public $userInfo = "";
    public $conn = "";

    public function __construct(UserInfo $userInfo, ConnectionLog $conn = null)
    {
        $this->userInfo = $userInfo;
        $this->conn = $conn;
    }
    public function setRetentionCookie()
    {
        setcookie($this->trackingKey, $this->getDate(), strtotime("+1 week"), "/", $this->domain, true);
    }
    public function setEngagementSession()
    {
        $_SESSION[$this->engagementKey] = $this->getDate();

        if ($this->sessionKey) {
            $info[0] = session_id();
            $this->conn->insertEngagementLog($info);
        }
    }
    public function track()
    {
        $this->generatLog();
        
        // checking tracking set or not
        if ($this->isCookieSet($this->trackingKey)) {
            // update engagment if session is set
            if ($this->isSessionSet($this->engagementKey)) {
                $this->updateEngagement();
            }
            
            $retation_date = new DateTime($_COOKIE[$this->trackingKey]);
            $current_date = new DateTime($this->getDate());
            
            $diff = date_diff($retation_date, $current_date);
            
            // Update Retention if Tracking Cookies date is not todays.
            if ($diff->days != 0) {
                $this->updateRetentionLog();
                $this->resetTracker();
            } else {
                $this->setEngagementSession();
            }
        } else {
            $this->resetTracker();
        }
    }
    
    public function resetTracker()
    {
        $this->setRetentionCookie();
        $this->setEngagementSession();
    }
    public function generatLog()
    {
        $info = array();
        $info[0] = $this->userInfo->getCurrentURL();
        $info[1] = $this->userInfo->getRefererURL();
        $info[2] =  $this->userInfo->getIP();
        $info[3] = $this->userInfo->getRegionName() . "/" . $this->userInfo->getCity() . "/" . $this->userInfo->getCountryName();
        $info[4] = $this->userInfo->getBrowser();
        $info[5] = $this->userInfo->getDevice();
        
        $this->conn->insertVisitorLog($info);
    }
    public function updateRetentionLog()
    {
        $info = array();
        $info[0] = $this->isCookieSet($this->sessionKey) ? $_COOKIE[$this->sessionKey] : "000";
        $this->conn->insertRetentionLog($info);
    }
    public function updateEngagement()
    {
        $engagement_date = new DateTime($_SESSION[$this->engagementKey]);
        $current_date = new DateTime($this->getDate());
        $time_diff_sec = date_diff($engagement_date, $current_date)->s;
        $hour = 3600;
        
        // checking engagment time in second.
        if ($time_diff_sec < $hour && $time_diff_sec > 0) {
            echo "inside";
            $info[0] = $time_diff_sec;
            $info[1] = $this->isCookieSet($this->sessionKey) ? $_COOKIE[$this->sessionKey] : "000";
            $this->conn->updateEngagementLog($info);
        }
    }
    public function isCookieSet($key = null): bool
    {
        return !empty($_COOKIE[$key]);
    }
    public function isSessionSet($key = null): bool
    {
        return !empty($_SESSION[$key]);
    }
    public function getDate(): string
    {
        $result = date("Y-m-d H:i:s");
        return $result;
    }
}


$database = new Database("localhost", "root", "", "student");
$obj = new Analytics(new UserInfo(), new ConnectionLog($database));

$obj->track();
