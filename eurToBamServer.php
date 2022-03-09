<?php 
 ini_set("soap.wsdl_cache_enabled", "0");
 ini_set('default_socket_timeout', 5000);

 echo "Usli smo u eurToBamServer.php";

 $server = new SoapServer("toBam.wsdl");

 function ETB($requsetValue){
     return $requsetValue * 1.96 . " BAM";
 }

 $server -> AddFunction("ETB");
 $server -> handle();

?>