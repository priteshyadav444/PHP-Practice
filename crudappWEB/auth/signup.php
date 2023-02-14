<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        // function InvalidMsg(textbox) {
        //     console.log(textbox.value);
        //     if (textbox.value === '') {
        //         textbox.setCustomValidity('Required email address');
        //     } else if (textbox.validity.typeMismatch) {
        //         textbox.setCustomValidity('please enter a valid email address');
        //     } else {
        //         textbox.setCustomValidity('');
        //     }
        //     return true;
        // }
    </script>
</head>
<?php


$path = "../../validation/Validators/FormValidator.php";
include $path;
// require_once 'vender/autoload.php';

// include "../../validation/Validators/FileValidator.php";

use Validators\FormValidator;
use Validators\FileValidator;


$obj = new FormValidator();
if (isset($_POST['submit'])) {
    var_dump($_POST);

    $validations = [
        'docs' => 'required|filetype:pdf|max:40000'
    ];
    if (!$obj->validate($_POST, $validations)->isError()) {
        $file = new FileValidator($_FILES, "docs", "files");
        $file->upload();
    }
}
?>

<body>
    <div class="container mt-3">
        <?php
        if ($obj->isError() != false) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($obj->all() as $error)
                echo "<li>$error</li>";
            echo '</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">';
            echo 'All Field are Valid';
            echo '</div>';
        }
        ?>
        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="123" />
            <div class="mb-3">
                <label for="exampleInputEmail0" class="form-label">Name</label>
                <input type="text" name="name" value='<?php echo "{$obj->old('name')}"; ?>' class="form-control" id="exampleInputEmail0" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" name="email" value='<?php echo "{$obj->old('email')}"; ?>' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" name="phone" value='<?php echo "{$obj->old('phone')}"; ?>' class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">File Upload</label>
                <input type="file" name="docs" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>