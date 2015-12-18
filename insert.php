<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Simplisia</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>
		.group-input-books
		{
			width: 100%;
		}
		.full-width
		{
			width: 100%;
		}
		.pad-10
		{
			padding-top: 10px;
		}
	</style>
</head>
<body>
	<?php
	include('soapClientNG.php');
	$options = array
			(
				'location' => "http://localhost/a/simplisia/classDb/koneksi.php",
				'uri' => "http://localhost",
			);
	if(isset($_POST['nama_simplisia']))
	{
		$newSimplisia = array(
			'nama_simplisia' => $_POST['nama_simplisia'],
			'nama_lain' => $_POST['nama_lain'],
			'nama_tanaman_asal' => $_POST['nama_tanaman_asal'],
			'keluarga' => $_POST['keluarga'],
			'zat_berkhasiat' => $_POST['zat_berkhasiat'],
			'penggunaan' => $_POST['penggunaan'],
			'pemerian' => $_POST['penggunaan'],
			'bagian' => $_POST['bagian'],
			'penyimpanan' => $_POST['penyimpanan'],
			'jenis' => $_POST['jenis']
			);
		try
		{
			$client = new SoapClientNG(null,$options);
			$addsimplisia = $client->insert_simplisia($newSimplisia);
			header('Location:client.php');		
		}
		catch(SoapFault $e)
		{
		
		}
	}
		
?>



	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<form class="form-inline" method="POST">
			 <table class="group-input-books">
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">
					    <div class="full-width input-group">
					      </a><input type="text" class="form-control" name="nama_simplisia" placeholder="Nama Simplisia">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="nama_lain" placeholder="Nama Lain">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="nama_tanaman_asal" placeholder="Nama Tanaman Asal"> 
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="keluarga" placeholder="Keluarga">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="zat_berkhasiat" placeholder="Zat Berkhasiat yang Terkandung">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="penggunaan" placeholder="Penggunaan">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="pemerian" placeholder="Pemerian dari Simplisia">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="bagian" placeholder="Bagian yang Digunakan">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="penyimpanan" placeholder="Ketentuan Penyimpanan Simplisia">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" name="jenis" placeholder="Jenis Simplisia">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
				<tr>
					<td class="pad-10">
						<button type="submit" class="btn btn-primary">Add Simplisia</button>
					</td>
				</tr>
			 </table>
			
			  
			</form>		
		</div>
	</div>
	
</body>
</html>