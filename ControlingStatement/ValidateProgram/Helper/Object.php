<?php
class ObjectFormatter
{
    public function format(array $data = null, int $code = 200, string $statuscode = "SUCCESS")
    {
        $result = array('status' => $statuscode, 'code' => $code, 'data' => $data);
        return json_encode($result);
    }
}
