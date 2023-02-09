<?php
class FileUpload
{
    private $fileObject = array();
    private $key = "";
    private $targetDir = "";
    private $errors = array();
    public function __construct($input, $key, $targetDir = "uploads/")
    {
        if (count($input) < 0)
            $this->fileObject = [$key => array("name" => "", "full_path" => "", "type" => "", "tmp_name" => "", "error" => 4, "size" => 0)];
        $this->fileObject = $input;
        $this->key = $key;
        $this->targetDir = $targetDir;
        $this->errors = array();
    }
    public  function isFileUploaded(): bool
    {
        if (isset($this->fileObject) == true && isset($this->fileObject[$this->key]['tmp_name']) == true && empty($this->fileObject[$this->key]['error'])) {
            return true;
        }
        return false;
    }
    public  function getFileSize()
    {
        if ($this->isFileUploaded()) {
            return $this->fileObject[$this->key]['size'];
        }
        return 0;
    }
    public  function getFileType(): bool|string
    {

        if ($this->isFileUploaded()) {
            $memeType = mime_content_type($this->fileObject[$this->key]['tmp_name']);
            // check passed file extention and meme type.
            if ($this->getMemeType(pathinfo($this->fileObject[$this->key]['name'], PATHINFO_EXTENSION)) != $memeType)
                array_push($this->errors, $this->errorMessage("INVALID_FORMAT"));
            return $memeType;
        }
        return false;
    }
    public  function getTempFile(): string
    {
        if ($this->isFileUploaded()) {
            $tempFile = $_FILES[$this->key]['tmp_name'];
            return $tempFile;
        }
        return false;
    }
    public  function getTargetFile(): string
    {
        if ($this->isFileUploaded()) {
            $targetFile = basename($_FILES[$this->key]['name']);
            return $targetFile;
        }
        return "/";
    }
    public function upload()
    {
        $tempFile = $this->getTempFile();
        $targetFile = $this->targetDir . "/" . $this->getTargetFile();

        if (!file_exists($this->targetDir)) mkdir($this->targetDir);

        if (!move_uploaded_file($tempFile, $targetFile))
            return false;

        return true;
    }
    public function isError($return = false): bool|array
    {
        if ($return == true)
            return $this->errors;

        if (empty($this->errors))
            return false;
        else
            return true;
    }
    public function validate($valationType)
    {
        if (strpos($valationType, ":") != false)
            list($type, $info) = explode(":", $valationType);
        else
            $type = $valationType;

        if ($type == "required") {
            if (!$this->isFileUploaded())
                array_push($this->errors, $this->errorMessage(4));
        }
        if ($type == "max") {
            if ($this->getFileSize() > $info)
                array_push($this->errors, $this->errorMessage(2, $info));
        }
        if ($type == "filetype") {
            if (!$this->checkMimeType($info))
                array_push($this->errors, $this->errorMessage("INVALID_FILE_FORMAT", $info));
        }
    }
    public function errorMessage($errorCode, $info = "")
    {
        $message = match ($errorCode) {
            0 => "File is uploaded successfully",
            1 => "Uploaded file cross the limit.",
            2 => "Uploaded file cross the limit. $info KB",
            3 => "File is partially uploaded or there is any error in between uploading.",
            4 => "No file was uploaded.",
            6 => "Missing a temporary folder.",
            7 => "Failed to write file to disk.",
            8 => "A PHP extension stopped the uploading process.",
            "INVALID_FILE_FORMAT" => "File should be in $info format.",
            "INVALID_FORMAT" => "Uploaded file not matched with extention",
            default => "Unexpected Error in File Uploading",
        };
        return $message;
    }
    public function checkMimeType($type)
    {
        $memeType = $this->getMemeType($type);
        return ($this->getFileType() == $memeType);
    }
    private function getMemeType($type)
    {
        $memeType =  match ($type) {
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "json" => "application/json",
            "png" => "image/png",
            "pdf" => "application/pdf",
            "txt" => "text/plain",
            "zip" => "application/zip",
            default => "application/octet-stream",
        };
        return $memeType;
    }
}
