<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

// include "./checkDataType.php";

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

if (isset($_POST['submit'])) {
    if (!empty($_POST['data'])) {
        // check data types 
        echo $_POST['data'] . " is " . checkDataType($_POST['data']);
    }
}
?>

<body>
    <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
        <label>Enter Input :</label><input type="text" name="data" required> </br>
        <input type="submit" name="submit" />
    </form>
</body>

</html>