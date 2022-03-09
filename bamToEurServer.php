<?php 
 ini_set("soap.wsdl_cache_enabled", "0");
 ini_set('default_socket_timeout', 5000);
 
 echo "Usli smo u bamToEurServer.php";

 $server = new SoapServer("toEur.wsdl");

 function BTE($requsetValue){
     return $requsetValue * 0.51 . " EUR";
 }

 $server -> AddFunction("BTE");
 $server -> handle();

?>