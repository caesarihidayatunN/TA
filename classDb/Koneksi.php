<?php
	require('Classkategori.php');
	$options = array("uri" => "http://localhost","encoding"=>"ISO-8859-1");

	$server = new SoapServer(null,$options);
	$server->setClass('Classkategori');
	$server->handle();
?>