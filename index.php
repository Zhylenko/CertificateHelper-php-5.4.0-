<?php
require_once __DIR__ . '/vendor/autoload.php';

use CertificateHelper\CertificateHelper;

$url = "google.com";
$certificateHelper = new CertificateHelper($url);


echo "Valid From: " . $certificateHelper->getValidFromDate() . "<br>";
echo "Valid To: " . $certificateHelper->getValidToDate() . "<br>";

echo '<pre>';
print_r($certificateHelper->getCertificateInfo());
echo '</pre>';