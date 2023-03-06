<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options(array("isRemoteEnabled" => true));
$options->setIsRemoteEnabled(true);
$options->setIsPhpEnabled(true);
$options->setIsJavascriptEnabled(true);


$dompdf = new Dompdf($options);
$filePath = "invoice/index.html";
// $filePath = "https://www.w3schools.com/spaces/";
// print_r($data);






$data = file_get_contents($filePath);
$dompdf->loadHtml($data);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();
$filname = "invoice" . rand(1, 100) . ".pdf";

file_put_contents("invoice/" . $filname, $output);

// Output the generated PDF to Browser
$dompdf->stream("invoice.pdf", array("Attachment" => false));
