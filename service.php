<?php

header('Content-Type: text/plain');

if (extension_loaded('soap')) {
    try {
        ini_set('default_socket_timeout', 5000);
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);

        $value = $_POST['value'];
        if ($_POST['currency'] === "toEur") {
            $sClient = new SoapClient('toEur.wsdl',array(
                'trace' => true,
                'keep_alive' => true,
                'connection_timeout' => 5000,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
            ));
            $response = $sClient->BTE($value);
        } else {
            $sClient = new SoapClient('toBam.wsdl',array(
                'trace' => true,
                'keep_alive' => true,
                'connection_timeout' => 5000,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
            ));
            $response = $sClient->ETB($value);
        }
        var_dump($response);
    } catch (SoapFault $e) {
        var_dump($e);
        echo $e;
    }
}
?>