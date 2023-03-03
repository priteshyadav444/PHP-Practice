<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$data = file_get_contents("invoice/index.html");

$dompdf->loadHtml($data);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();
$filname = "invoice" . rand(1, 100) . ".pdf";
file_put_contents($filname, $output);
// Output the generated PDF to Browser
$dompdf->stream("invoice.pdf");
