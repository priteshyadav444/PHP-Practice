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
    if ($redirectPage != 'second.php') {
        header("location: $redirectPage");
    }
}

if (empty($_SESSION['username']) or empty($_SESSION['email'])) {
    var_dump($_SESSION);
    header('location: first.php');
}

$USERNAME = $_SESSION['username'];
$EMAIL_ADDRESS = $_SESSION['email'];


$parent = dirname(__DIR__);
include_once "$parent/validation/validators/FormValidator.php";

use Form\FormValidator;

$obj = new FormValidator();
if (isset($_POST['submit'])) {
    $obj->validate($_POST, [
        "city" => "required|string",
        "state" => "required|string",
        "dob" => "required|date",
    ]);

    if ($obj->isError()) {
        foreach ($obj->all() as $error) {
            echo "<li style='color:red'>$error</li>";
        }
    } else {
        $_SESSION['city'] = $obj->senitizeInput($_POST['city']);
        $_SESSION['state'] = $obj->senitizeInput($_POST['state']);
        $_SESSION['dob'] = $_POST['dob'];
        $_SESSION['redirect'] = "third.php";
        header('location: third.php');
    }
}
?>

<body>
    <h2> Hello <?php echo $USERNAME ?>, your email address is : <?php echo $EMAIL_ADDRESS ?>.</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h4> Enter your City : </h4>
        <input type="text" name="city" value=<?php echo $obj->old('city'); ?>><br>
        <h4> Select Your State : </h4>
        <select name="state">
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
        </select><br><br>
        <h4> Selet your DOB: </h4>
        <input type="date" name="dob" value="<?php echo $obj->old('dob') ?>"><br><br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>

</html>