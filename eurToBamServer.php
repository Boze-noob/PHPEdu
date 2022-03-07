<?php 
 ini_set("soap.wsdl_cache_enabled", "0");
 ini_set('default_socket_timeout', 5000);

 $server = new SoapServer("toBam.wsdl");

 function requestValueETB($requsetValue){
     return $requsetValue * 1.96 . " BAM";
 }

 $server -> AddFunction("requestValueETB");
 $server -> handle();

?>