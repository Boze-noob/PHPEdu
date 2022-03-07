<?php 
 ini_set("soap.wsdl_cache_enabled", "0");
 ini_set('default_socket_timeout', 5000);

 $server = new SoapServer("toEur.wsdl");

 function requestValueBTE($requsetValue){
     return $requsetValue * 0.51 . " EUR";
 }

 $server -> AddFunction("requestValueBTE");
 $server -> handle();

?>