<?php
class ObjectFormatter
{
    public function format(array $data = [], int $code = 200, string $statuscode = "SUCCESS")
    {
        $keys = array('statuscode', 'code', 'data');
        $values = array($statuscode, $code, $data);

        return json_encode(array_combine($keys, $values));
    }
}
