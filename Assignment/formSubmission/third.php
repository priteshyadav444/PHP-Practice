<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();
if (!empty($_SESSION['redirect'])) {
    $redirectPage = $_SESSION['redirect'];
    if ($redirectPage != 'third.php') {
        header("location: $redirectPage");
    }
}
if (empty($_SESSION['first_name']) or empty($_SESSION['last_name']) or empty($_SESSION['email']) or empty($_SESSION['username']) or empty($_SESSION['dob']) or empty($_SESSION['city']) or empty($_SESSION['state'])) {
    echo "<script> alert('Some Fields Are Lost. Please Start Again'); </script>";
    header('location: first.php');
} else {
    $FIRSTNAME = $_SESSION['first_name'];
    $LASTNAME = $_SESSION['last_name'];
    $EMAIL = $_SESSION['email'];
    $USERNAME = $_SESSION['username'];
    $AGE = date_diff(new DateTime(),  new DateTime($_SESSION['dob']))->y;
    $CITY = $_SESSION['city'];
    $STATE = $_SESSION['state'];
    unset($_SESSION['redirect']);
}
?>

<body>
    <h2> All Details</h2>
    <?php
    echo "First Name : $FIRSTNAME <br>";
    echo "Last Name : $LASTNAME<br>";
    echo "Email : $EMAIL<br>";
    echo "User Name : $USERNAME<br>";
    echo "Age: $AGE <br>";
    echo "City: $CITY <br>";
    echo "State: $STATE <br>";

    echo "<h2> Headers Details: </h2>";

    echo "HTTP_HOST => " . $_SERVER['HTTP_HOST'];
    echo "<br>HTTP_USER_AGENT => " . $_SERVER['HTTP_USER_AGENT'];
    echo "<br>SERVER_NAME => " . $_SERVER['SERVER_NAME'];
    echo "<br>SERVER_ADDR => " . $_SERVER['SERVER_ADDR'];
    echo "<br>SERVER_PORT => " . $_SERVER['SERVER_PORT'];
    echo "<br>REQUEST_METHOD => " . $_SERVER['REQUEST_METHOD'];
    echo "<br>QUERY_STRING => " . $_SERVER['QUERY_STRING'];
    echo "<br>REQUEST_URI => " . $_SERVER['REQUEST_URI'];
    echo "<br>SERVER_SIGNATURE => " . $_SERVER['SERVER_SIGNATURE'];

    ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>

</html>