<?php
//require ('./vendor/autoload.php');
include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('Helvetica');
$pdf->ezText('Hello World!',50);
$pdf->ezStream();


















?>