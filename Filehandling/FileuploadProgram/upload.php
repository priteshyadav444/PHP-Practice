<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'FileUpload.php';
if (isset($_POST['submit'])) {
    echo "<pre> File Details";
    print_r($_FILES);

    $key = 'filename';

    // $size = $_FILES[$key]['size'];
    // $tempFile = $_FILES[$key]['tmp_name'];
    // $filename = basename($_FILES[$key]['name']);
    // $targetDir = "uploads/";
    // $targetFile = $targetDir . $filename;
    // $errors = $_FILES[$key]['error'];

    // echo "Image Info :";
    // getimagesize($tempFile);

    // echo "path Info :";
    // var_dump(pathinfo($targetFile, PATHINFO_EXTENSION));

    // echo "Mime Info :";
    // echo mime_content_type($_FILES['fileToUpload']['tmp_name']);

    // print_r($_POST);
}
?>

<body>
    <form action="<?php htmlspecialchars("fileupload.php") ?>" method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label>&nbsp; <input type="file" allow="pdf" multiple="multiple" name="filename" id="fileToUpload"> <br><br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>