<?php
if (isset($_POST['chunkNumber']) && isset($_FILES['file'])) {
    $chunkNumber = (int) $_POST['chunkNumber'];
    $file = $_FILES['file'];
    $file_tmp = $file['tmp_name'];

    $file_destination = "uploads/{$file['name']}.part{$chunkNumber}";

    if (move_uploaded_file($file_tmp, $file_destination)) {
        echo "Chunk {$chunkNumber} has been uploaded successfully.";
    }
}

if (isset($_POST['isLastChunk']) && $_POST['isLastChunk'] === 'true') {
    $fileName = $_POST['fileName'];
    $file_destination = "uploads/{$fileName}";
    $fp = fopen($file_destination, 'w');

    $i = 0;
    while (true) {
        $chunk = "uploads/{$fileName}.part{$i}";
        if (!file_exists($chunk)) {
            break;
        }

        $chunkData = file_get_contents($chunk);
        fwrite($fp, $chunkData);
        unlink($chunk);
        $i++;
    }

    fclose($fp);
    echo "The file has been uploaded successfully.";
}
