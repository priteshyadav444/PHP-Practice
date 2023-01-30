<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        const data = new FormData();
        $("#submit").click(function() {
            $.post('data_test.php'), {
                    name: "Pritesh"
                },
                function(data, status) {
                    $("#msg").load(data + status);
                }
        });
    });
</script>
<?php


if (isset($_REQUEST['submit'])) {
    echo "<pre>";
    print_r(getallheaders());
    echo "Request : ";
    print_r($_REQUEST);
    echo "GET : ";
    print_r($_GET);
    echo "POST : ";
    print_r($_POST);
}
?>


<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" /> <br>
        <input type="button" name="submit" id="submit" value="submit">
    </form>
    <div id="msg"></div>
</body>

</html>