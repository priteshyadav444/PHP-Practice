<!DOCTYPE html>
<html>
<?php

if (isset($_POST['submit'])) {
    echo "<pre>";
    // Method One
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);

    var_dump($mimeType);
    finfo_close($finfo);

    $acceptedMimeTypes = array("image/jpeg", "image/png", "image/gif", "application/pdf");

    if (!in_array($mimeType, $acceptedMimeTypes)) {
        echo "Error: Only JPEG, PNG, and GIF files are allowed.";
    } else {
        // Upload the file code
    }

    // method two
    // print_r($_FILES);
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    // $uploadOk = 1;
    // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // print_r($check);

    // if ($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    // } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }

    // if (
    //     ($check['mime'] ?? "null") != "image/jpeg"
    // ) {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
    //     $uploadOk = 0;
    // } else {
    //     $uploadOk = 1;
    // }


    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded. <br>";
    //     // if everything is ok, try to upload file
    // } else {
    //     if (!file_exists($target_dir)) mkdir($target_dir); // check directory exit of not;

    //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //         echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded. <br>";
    //     } else {
    //         echo "Sorry, there was an error uploading your file. <br>";
    //     }
    // }
}
?>

<body>

    <form action="<?php htmlspecialchars("fileupload.php") ?>" method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label><input type="file" multiple name="filename[]" id="fileToUpload" required> <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>

</html>