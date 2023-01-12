<?php

namespace ObjectOperation;

class ObjectFormatter
{
    public function format(array $data = null, int $code = null, string $statuscode = null) 
    {
        $result = array('status' => $statuscode, 'code' => $code, 'data' => $data);
        return json_encode($result);
    }
}
