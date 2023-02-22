<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function InvalidMsg(textbox) {
            console.log(textbox);
            $message = "";

            if (textbox.value === '') {
                textbox.setCustomValidity(textbox.name + ' Required');
            } else if (textbox.validity.typeMismatch) {
                textbox.setCustomValidity('please valid Data : ' + textbox.type);
            } else {
                textbox.setCustomValidity('');
            }
            return true;
        }
    </script>
</head>
<?php
session_start();
if (!empty($_SESSION['redirect'])) {
    $redirectPage = $_SESSION['redirect'];
    if ($redirectPage != 'first.php') {
        header("location: $redirectPage");
    }
}
$parent = dirname(__DIR__);
include_once "$parent/validation/validators/FormValidator.php";

use Form\FormValidator;

$obj = new FormValidator();
$fullname = "";
$_POST['first_name'] = "";
$_POST['last_name'] = "";

if (isset($_POST['submit'])) {

    if (isset($_POST['fullname'])) {
        $arr = explode(" ", $_POST['fullname']);
        if (count($arr) >= 2) {
            $_POST['first_name'] = $arr[0];
            $_POST['last_name'] = $arr[1];
        } elseif (count($arr))
            $_POST['first_name'] = $arr[0];
    }
    // i have created program for validation which is similar to larvel validation.
    $obj->validate($_POST, [
        "first_name" => "required|string",
        "last_name" => "required|string",
        "email" => "required|email",
        "username" => "required|alphanumeric",
    ]);

    if ($obj->isError()) {
        foreach ($obj->all() as $error)
            echo "<li style='color:red'>$error</li>";
        $fullname = (empty($obj->old('first_name')) || empty($obj->old('last_name'))) == true ? "" : $obj->old('first_name') . " " . $obj->old('last_name');
    } else {
        $_SESSION['first_name'] = $obj->senitizeInput($_POST['first_name']);
        $_SESSION['last_name'] = $obj->senitizeInput($_POST['last_name']);
        $_SESSION['email'] = $obj->senitizeInput($_POST['email']);
        $_SESSION['username'] = $obj->senitizeInput($_POST['username']);

        $_SESSION['redirect'] = "second.php";
        header('location: second.php');
    }
}
?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h4> Enter your Full Name: </h4>
        <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder=" Ex. Pritesh Yadav"><br>
        <h4> Enter your Email: </h4>
        <input type="" name="email" value="<?php echo $obj->old('email'); ?>"><br><br>
        <h4> Enter your Username: </h4>
        <input type="text" name="username" value="<?php echo $obj->old('username'); ?>"><br><br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>

</html>