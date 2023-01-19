<?php
class Hyphen
{
    public function showPattern($input)
    {
        $result = "";
        for ($i = 1; $i <= $input; $i++) {
            if ($i == 1) {
                $result .= $i;
            } else {
                $result .= '-' . $i;
            }
        }
        return $result;
    }
}

$hyphen = new Hyphen();
echo $hyphen->showPattern(10);
