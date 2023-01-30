<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if (isset($_REQUEST['submit'])) {
    print_r(htmlspecialchars($_GET['name']));
}
?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
        <input type="text" name="name" /> <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>