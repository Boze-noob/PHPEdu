<?php

header('Content-Type: text/plain');

if (extension_loaded('soap')) {
    try {
        ini_set('default_socket_timeout', 5000);
        ini_set('soap.wsdl_cache_enabled', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        

        $value = $_POST['inputValue'];
        if ($_POST['currency'] === "toEur") {
            $sClient = new SoapClient('toEur.wsdl',array(
                'trace' => true,
                'keep_alive' => true,
                'soap_version' => SOAP_1_1,
                'connection_timeout' => 5000,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
            ));
            try{
             $response = $sClient->BTE($value);
            } catch(SoapFault $e){
                echo $e;
            }
        } else {
            $sClient = new SoapClient('toBam.wsdl',array(
                'trace' => true,
                'keep_alive' => true,
                'soap_version' => SOAP_1_1,
                'connection_timeout' => 5000,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
            ));
            $response = $sClient->ETB($value);
        }
        $bom = pack("CCC", 0xef, 0xbb, 0xbf);
        if (0 == strncmp($stresponser, $bom, 3)) {
            echo "BOM detected - file is UTF-8\n";
            $response = substr($response, 3);
        }
        var_dump($response);
    } catch (SoapFault $e) {
        var_dump($e);
        echo $e;
    }
}
?>