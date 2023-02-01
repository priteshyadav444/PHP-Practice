<?php

/**
 * ObjectFormatter
 */
class ObjectFormatter
{
    /**
     * format : data in json format ex. { status}
     *
     * @param  mixed $data
     * @param  mixed $code
     * @param  mixed $statuscode
     * @return void
     */
    public function format(array $data = [], int $code = 200, string $statuscode = "SUCCESSFULL", string $message = null)
    {
        $keys = array('statuscode', 'code', 'data');
        $values = array($statuscode, $code, $data);
        if ($message != null)
            $keys["message"] = $message;
        return json_encode(array_combine($keys, $values));
    }
}
