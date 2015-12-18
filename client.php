<?php
error_reporting(E_ALL);
ini_set('display_error',1);

require_once('lib/nusoap.php');
$url = 'http://localhost/simplisia/wsdlSimplisia.php?wsdl';
$client = new nusoap_client($url, 'WSDL');
$nama_simplisia =  isset($_GET["nama_simplisia"]) ? $_GET["nama_simplisia"] : '' ;

$result = $client->call('readbyNamaSimplisia', array('nama_simplisia'=>$nama_simplisia));
$data = json_decode($result);
?>