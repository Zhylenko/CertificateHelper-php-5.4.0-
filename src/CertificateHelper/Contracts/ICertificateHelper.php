<?php

namespace CertificateHelper\Contracts;

interface ICertificateHelper
{
    public function __construct($url);

    public function setURL($url);

    public function getURL();

    public function getValidFromDate($format = DATE_RFC822);

    public function getValidToDate($format = DATE_RFC822);

    public function getCertificateInfo($timeout = 10);

    public function parseHost($url);
}
