<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
include '../config/FormValidator.php';
if (isset($_POST['submit'])) {

    $validations = [
        'name' => 'decimal',
        'phoneno' => 'required|numeric|max:10|min:10'
    ];

    $obj = new FormValidator();
    $obj->validate($_POST, $validations);
    // print_r($_POST);
}
?>

<body>
    <div class="container mt-3">
        <?php
        if ($obj->isError()) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($obj->all() as $error) {
                echo "<li>$error</li>";
            }
            echo '</div>';
        }
        ?>
        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

            <div class="mb-3">
                <label for="exampleInputEmail0" class="form-label">Name</label>
                <input type="text" name="name" value="ads" class="form-control" id="exampleInputEmail0" aria-describedby="emailHelp" value="">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="password" value="12345678asdASD@" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="abc@gmail.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" name="cpassword" value="12345678asdASD@" class="form-control" id="exampleInputPassword1" value="12345678">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>