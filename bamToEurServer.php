<?php 
 ini_set("soap.wsdl_cache_enabled", "0");
 ini_set('default_socket_timeout', 5000);

 $server = new SoapServer("toEur.wsdl", array(
    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
 )
);

 function BTE($requestValue){
     return $requestValue * 0.51 . " EUR";
 }

 $server -> AddFunction("BTE");
 $server -> handle();

?>