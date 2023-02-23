<?php
// 

use FTP\Connection;

@session_start();



include './Userinfo.php';
include './connection.php';

echo $_SERVER['HTTP_USER_AGENT'];
class Analytics
{
    public $trackingKey  = "visitid";
    public $engagementKey = "engid";
    public $domain = ""; // mention your domain name in .example.com 
    public $userInfo = "";
    public $conn = "";

    public function __construct($userInfo = null, $conn = null)
    {
        $this->userInfo = $userInfo;
        $this->conn = $conn;
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
    public function setRetentionCookie()
    {
        setcookie($this->trackingKey, $this->getDate(), strtotime("+1 week"), "/", $this->domain, true);
    }
    public function setEngagementSession()
    {
        $_SESSION[$this->engagementKey] = $this->getDate();
        // setcookie($this->engagementKey, new DateTime(), strtotime("+1 week"), "/", $this->domain, true);
    }
    public function track()
    {
        // generate logs 
        $this->generatLog();

        if ($this->isCookieSet($this->trackingKey)) {
            // update engagment time in database
            if ($this->isSessionSet($this->engagementKey)) {
                $engagement_date = new DateTime($_SESSION[$this->engagementKey]);
                $current_date = new DateTime($this->getDate());
                $time_diff_sec = date_diff($engagement_date, $current_date)->s;
                $hour = 3600;

                // checking engagment time in second.
                if ($time_diff_sec < $hour && $time_diff_sec > 0) {
                    echo $time_diff_sec;
                    // update engagement log in database
                }
                // check retantion 
            }
            $retation_date = new DateTime($_COOKIE[$this->trackingKey]);
            $current_date = new DateTime($this->getDate());

            $diff = date_diff($retation_date, $current_date);
            // update retention
            if ($diff->days != 0) {
                echo "Date is not Same";
                // update retention date
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
        // insert into retention table
        $this->setEngagementSession();
        // insert into engagement table
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
    // generate Visitor Id using tracking id
    public function generateVisitorId()
    {
    }

    // get Tracking Id
    public function getTrackingId()
    {
        return $this->trackingKey;
    }


    // check passed id available in database
    public function isUniqueUser($visitorId = null)
    {
        $isAvialable = true;
        return $isAvialable;
    }
    // on both case increase visitor count. for unqiue increase unique visitor count. 
    public function incrementVisitor()
    {
        static $visitor = 0;
        $visitor++;
    }
}
$userInfo = new UserInfo();
$conn = new ConnectionLog();
$obj = new Analytics($userInfo, $conn);


$obj->track();

echo "<pre>";
