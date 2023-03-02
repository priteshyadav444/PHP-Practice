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

//check passed no is int or not
function isInt($input): bool
{
    $intValue = intval($input);
    return ($input == $intValue);
}
//check passed no is isFloat or not
function isFloat($input): bool
{
    $floatval = (float)$input;
    if (strpos($input, '.') == false)
        if (isInt($input)) return false;
    return ($floatval == $input);
}


if (isset($_POST['submit'])) {
    if (!empty($_POST['data']) && isFloat($_POST['data']) || isInt($_POST['data']==true)) {
        echo round($_POST['data'], 2);
    } else {
        echo "Not Floating Number";
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