<?php
	include('classDb/Classkategori.php');

	$nc = new Classkategori();
	$nama_simplisia='CURCUMAE RHIZOMA';
	$data = array(
		'nama_simplisia' => 'CURCUMAE RHIZOMA',
		'nama_lain' => 'Temu Lawak',
		'nama_tanaman_asal' => 'Curcuma Xanthorrhiza',
		'keluarga' => 'Zingiberaceae',
		'zat_berkhasiat' => 'Minyak atsiri yang mengandung felandren dan tumerol, zat warna kurkumin, pati. Kadar minyak atsiri tidak kurang dari 8,2 % b/v',
		'penggunaan' => 'Kolagoga,antispasmodika',
		'pemerian' => 'Bau khas aromatik, rasa tajam dan pahit',
		'bagian' => 'Kepngan akar tinggal',
		'penyimpanan' => 'Dalam wadah tertutpu baik',
		'jenis' => 'Rhizoma'

		); 
	$data = $nc->update_simplisia($nama_simplisia,$data);
	var_dump($data);
?>