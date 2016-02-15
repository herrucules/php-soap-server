<?php
require "simplehash.php";
require 'lib/nusoap.php';

$server = new nusoap_server();
$server->configureWSDL("soa", "urn:soa");
$server->register(
  "SimpleHash.Encode",
  array("string"=>"xsd:string"),
  array("return"=>"xsd:string")
  );
$server->register(
  "SimpleHash.Decode",
  array("string"=>"xsd:string"),
  array("return"=>"xsd:string")
  );
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
