<?php
require "lib/nusoap.php";
$client = new nusoap_client("http://localhost/soa/server.php?wsdl");

echo $client->call("TesClass.hi", array("name"=>"hello world"));