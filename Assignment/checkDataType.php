<?php

function isInt($input): bool
{
    $intValue = intval($input);
    return ($input == $intValue);
}
function isFloat($input): bool
{
    $floatval = (float)$input;
    if (strpos($input, '.') == false)
        if (isInt($input)) return false;
    return ($floatval == $input);
}
function checkDataType($data): string
{
    if (strcasecmp($data, "null") == 0) {
        return "Null";
    } elseif (isFloat($data)) {
        return "Floating";
    } elseif (isInt($data)) {
        return "Numeric";
    } elseif (strcasecmp($data, "true") == 0 or strcasecmp($data, "false") == 0) {
        return "Boolean";
    } elseif (is_string($data)) {
        return "String";
    } else {
        return "Invalid DataType";
    }
}
