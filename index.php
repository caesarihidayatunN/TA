<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>DAFTAR SIMPLISIA</title>
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
  <script src="assets/js/jquery-2.1.1.js"></script>
</head>

<body>
<div class="row">
  <div class="col-md-2 col-md-offset-5">
    <a href="insert.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah Data Simplisia</button></a>
  </div>
</div>  
<?php 
  header('Content-type: text/html');
  include('soapClientNG.php');
  
  class Simplisia
  {
    public $simplisia;
    public function __construct()
    {
      $options = array
      (
        'location' => "http://localhost/simplisia/classDb/koneksi.php",
        'uri' => "http://localhost",
        'exceptions' => 1
      );
      try
      {
        $client = new SoapClient(null,$options);
        $this->simplisia = $client->readAll();
        
      }
      catch(SoapFault $e)
      {
        echo $e->faultstring; 
      }

      
    }

    public function getAllSimplisia()
    {
      return $this->simplisia;
    }
  } 
?>

<?php
  
  $getSimplisia = new Simplisia();
  $data = $getSimplisia->getAllSimplisia();
 // var_dump($data);
  ?>
  <center>
  <div class="row">
  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Simplisia</th>
            <th>Nama Lain</th>
            <th>Nama Tanaman Asal</th>
            <th>Keluarga</th>
            <th>Zat Berkhasiat Utama</th>
            <th>Penggunaan</th>
            <th>Pemerian</th>
            <th>Bagian yang Digunakan</th>
            <th>Penyimpanan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;?>
        <?php 
        
        ?>
          <?php foreach ($data as $spl){?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $spl['nama_simplisia']; ?></td>
              <td><?php echo $spl['nama_lain']; ?></td>
              <td><?php echo $spl['nama_tanaman_asal']; ?></td>
              <td><?php echo $spl['keluarga']; ?></td>
              <td><?php echo $spl['zat_berkhasiat']; ?></td>
              <td><?php echo $spl['penggunaan']; ?></td>
              <td><?php echo $spl['pemerian']; ?></td>
              <td><?php echo $spl['bagian']; ?></td>
              <td><?php echo $spl['penyimpanan']; ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="...">
                <?php echo "<a href=\"update.php?nama_simplisia=". $spl['nama_simplisia'] ."\">
                  <button type=\"button\" class=\"btn btn-info\">Update</button></a>";?>
                <?php echo "<a href=\"delete.php?nama_simplisia=". $spl['nama_simplisia'] ."\">
                  <button type=\"button\" class=\"btn btn-danger\" onclick='javascript: return confirm('Anda yakin hapus ?')'>Delete</button></a>";?>
              </div>
            </td>
            </tr>
          <?php $i++;?>
          <?php } ?>
        </tbody>
    </table>
    </div>  
  </div>
  </center>

  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
