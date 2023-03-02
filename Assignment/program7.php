<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
        <?php
        // checking using cookies for registered user set or not 
        if (empty($_COOKIE['visitid'])) {
            echo "<b>Please enter your details carefully</b>";
        }
        ?>
        <br /><br />
        <label>Enter Username:</label><input type="text" name="username" required><br><br>
        <label>Enter Mobile:</label><input type="number" name="mobileno" required><br><br>

        <input type="submit" name="submit" value="submit" />
    </form>
</body>
<?php

if (isset($_POST['submit'])) {
    // check is username and mobile entered properly or not
    if (!empty(trim($_POST['username'])) && !empty(trim($_POST['mobileno']))) {

        $username = $_POST['username'];
        $mobileno = $_POST['mobileno'];

        // Using session to store registered user data(username and mobile no). using $_SESSION['mobile'] to check is  already registerd or not
        if (isset($_SESSION['mobileno']) && $_SESSION['mobileno'] == $mobileno) {
            echo "<b style='color:red'>You have already registered.</b>";
        } else {
            // stroing in session
            $_SESSION['username'] = $username;
            $_SESSION['mobileno'] = $mobileno;
            echo "<b style='color:green'> Your details saved successfully.</b>";
            setcookie("visitid", session_id(), strtotime("+1 week"));
        }
    } else {
        echo "<b style='color:red'>Please enter All Details</b>";
    }
}
?>

</html>