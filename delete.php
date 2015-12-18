<?php
	header('Content-type: text/html');
	
	
	if(isset($_GET['nama_simplisia']))
	{
		$nama_simplisia = $_GET['nama_simplisia'];
		//var_dump($nama_simplisia);
		try
		{
			$options = array
				(
					'location' => "http://localhost/simplisia/classDb/koneksi.php",
					'uri' => "http://localhost",
				);
			$client = new SoapClient(null,$options);
			$deleteSimplisia = $client->deletebyNamaSimplisia($nama_simplisia);
			//print_r($deleteSimplisia);
		}
		catch(SoapFault $e)
		{
			 echo $e->faultstring; 
		}
		
	}
	header("Location:index.php");
?>

