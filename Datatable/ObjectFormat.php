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
         * @param  mixed $status
         * @return void
         */
        public static function format(array $data = [], int $code = 200, string $status = "SUCCESSFULL", string $message = null)
        {
            $keys = array();
            $values = array();
            if ($message != null) {
                array_push($keys, 'status', 'code', 'message', 'data');
                array_push($values, $status, $code, $message, $data);
            } else {
                $keys = array('status$status', 'code', 'data');
                $values = array($status, $code, $data);
            }
            return json_encode(array_combine($keys, $values), JSON_UNESCAPED_SLASHES);
        }
    }
