<?php 
 ini_set("soap.wsdl_cache_enabled", "0");
 ini_set('default_socket_timeout', 5000);

 $server = new SoapServer("toBam.wsdl", array(
    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
 ));

 function ETB($requestValue){
     return $requestValue * 1.96 . " BAM";
 }

 $server -> AddFunction("ETB");
 $server -> handle();

?>