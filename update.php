<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Data Simplisia</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>
		.group-input-simplisia
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
	header('Content-type: text/html');
	class getSimplisia
	{
		public $simplisia_data;

		public $namaSimplisia;
		function __construct()
		{
			try
			{
				$options = array
					(
						'location' => "http://localhost/simplisia/classDb/koneksi.php",
						'uri' => "http://localhost",
						'exceptions' => 1,
						'trace' => 1
					);
				$client = new SoapClient(null,$options);
				if(isset($_GET['nama_simplisia']))
				{
					$this->namaSimplisia=$_GET['nama_simplisia'];
					$this->simplisia_data = $client->readbyNamaSimplisia($this->namaSimplisia);	
				}

			}
			catch(SoapFault $e)
			{
				echo $e->faultstring;
			}
		}

		public function getData()
		{
			return $this->simplisia_data;
		}

		public function getNamaSimplisia()
		{
			return $this->namaSimplisia;
		}
	}

	
	$getDataSimplisia = new getSimplisia();
	$data = $getDataSimplisia->getData();
	
	
	if(isset($_POST['nama_simplisia']))
	{
		$simplisiaNew = array(
			'nama_simplisia' => $_POST['nama_simplisia'],
			'nama_lain' => $_POST['nama_lain'],
			'nama_tanaman_asal' => $_POST['nama_tanaman_asal'],
			'keluarga' => $_POST['keluarga'],
			'zat_berkhasiat' => $_POST['zat_berkhasiat'],
			'penggunaan' => $_POST['penggunaan'],
			'pemerian' => $_POST['pemerian'],
			'bagian' => $_POST['bagian'],
			'penyimpanan' => $_POST['penyimpanan'],
			'jenis' => $_POST['jenis']
			);
		try
		{
			$options = array
					(
						'location' => "http://localhost/simplisia/classDb/koneksi.php",
						'uri' => "http://localhost",
						'exceptions' => 1,
						'trace' => 1
					);
			$client= new SoapClient(null,$options);
			$edit = $client->update_simplisia($getDataSimplisia->getNamaSimplisia(),$simplisiaNew);
			header('Location:index.php');
		}
		catch(SoapFault $e)
		{
			echo ($e->faultstring);
		}
	}
	
		
?>



	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<form class="form-inline" method="POST">
			 <table class="group-input-simplisia">
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['nama_simplisia'];?>" name="nama_simplisia" placeholder="Nama Simplisia">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['nama_lain'];?>" name="nama_lain" placeholder="Nama Lain">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['nama_tanaman_asal'];?>" name="nama_tanaman_asal" placeholder="Nama Tanaman Asal"> 
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['keluarga'];?>" name="keluarga" placeholder="Keluarga">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['zat_berkhasiat'];?>" name="zat_berkhasiat" placeholder="Zat Berkhasiat yang Terkandung">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['penggunaan'];?>" name="penggunaan" placeholder="Penggunaan Simplisia">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['pemerian'];?>" name="pemerian" placeholder="Pemerian">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['bagian'];?>" name="bagian" placeholder="Bagian yang Digunakan">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['penyimpanan'];?>" name="penyimpanan" placeholder="Cara Penyimpanan">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
			 	<tr>
			 		<td class="pad-10">
			 			<div class="full-width form-group">    
					    <div class="full-width input-group">
					      <input type="text" class="form-control" value="<?php echo $data['jenis'];?>" name="jenis" placeholder="Jenis">
					    </div>
					  	</div>
			 		</td>
			 	</tr>
				<tr>
					<td class="pad-10">
						<button type="submit" class="btn btn-primary">Update Simplisia</button>
					</td>
				</tr>
			 </table>
			
			  
			</form>		
		</div>
	</div>
	
</body>
</html>



