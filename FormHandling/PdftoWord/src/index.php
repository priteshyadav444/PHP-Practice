<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Ilovepdf\Ilovepdf;

$ilovepdf = new Ilovepdf('project_public_e01edee78a2f1e83f12092d65568ecc8_1UTFF0fdbdeceaea3c91005620bba5daa11af', 'secret_key_617b0f8de0a230f94d11b088d1c8640f_MSQQM29f0543e1d6a64a31cfb4b215ad3d733');
$myTask = $ilovepdf->newTask('officepdf');

$file1 = $myTask->addFile('nameing.docx');

$myTask->execute();
$myTask->download();
