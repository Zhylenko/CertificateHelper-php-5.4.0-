<?php

namespace CertificateHelper;

use Exception;
use CertificateHelper\Contracts\ICertificateHelper;

class CertificateHelper implements ICertificateHelper
{
    private $url;

    public function __construct($url)
    {
        $this->setURL($url);
    }

    public function setURL($url)
    {
        $host = $this->parseHost($url);

        if (strpos($host, '.') === false) {
            throw new Exception('Wrong URL syntax');
        }

        $this->url = $host;

        return $this;
    }

    public function getURL()
    {
        return $this->url;
    }

    public function getValidFromDate($format = DATE_RFC822)
    {
        $certificateInfo = $this->getCertificateInfo();
        
        return date($format, $certificateInfo['validFrom_time_t']);
    }

    public function getValidToDate($format = DATE_RFC822)
    {
        $certificateInfo = $this->getCertificateInfo();
        
        return date($format, $certificateInfo['validTo_time_t']);
    }

    public function getCertificateInfo($timeout = 10)
    {
        try {
            $url = "ssl://" . $this->getURL() . ":443";

            $context = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
            $socket = stream_socket_client(
                $url,
                $errorCode,
                $errorMessage,
                $timeout,
                STREAM_CLIENT_CONNECT,
                $context
            );
        } catch (\Throwable $th) {
            throw $th;
        }

        $certificate     = stream_context_get_params($socket);
        $certificateInfo = openssl_x509_parse($certificate['options']['ssl']['peer_certificate']);

        return $certificateInfo;
    }

    public function parseHost($url)
    {
        $parseUrl   = parse_url(trim($url));

        return isset($parseUrl['host']) ? $parseUrl['host'] : explode('/', $parseUrl['path'], 2)[0];
    }
}
