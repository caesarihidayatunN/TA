<?php
	include("adodb/adodb.inc.php");	
	include("adodb/adodb-exceptions.inc.php");		
	class Library
	{
		public $db = null;
		function __construct() 
		{		
			try
			{
				$this->db = &ADONewConnection('mysql');
				$this->db->Connect('localhost', 'root', '','simplisia');
			}
			catch(Exception $e)
			{
				die($this->db->ErrorMsg());
			}
			
  		}



		public function readAll()
		{
			
			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$simplisia = $this->db->Execute('SELECT * FROM simplisia');	
			$spl = array();
			while (!$simplisia->EOF) { 
	            $spl[$simplisia->fields[0]]['nama_simplisia'] = $simplisia->fields[0];
	            $spl[$simplisia->fields[0]]['nama_lain'] = $simplisia->fields[1];
	            $spl[$simplisia->fields[0]]['nama_tanaman_asal'] = $simplisia->fields[2];
	            $spl[$simplisia->fields[0]]['keluarga'] = $simplisia->fields[3];
	            $spl[$simplisia->fields[0]]['zat_berkhasiat'] = $simplisia->fields[4];
	            $spl[$simplisia->fields[0]]['penggunaan'] = $simplisia->fields[5];
	            $spl[$simplisia->fields[0]]['pemerian'] = $simplisia->fields[6];
	            $spl[$simplisia->fields[0]]['bagian'] = $simplisia->fields[7];
	            $spl[$simplisia->fields[0]]['penyimpanan'] = $simplisia->fields[8];
	            $simplisia->MoveNext(); 
	        }  
			return $spl;
		}

		public function readbyNamaSimplisia($nama_simplisia)
		{

			$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
			$simplisia = $this->db->Execute('SELECT * FROM simplisia where nama_simplisia='.$nama_simplisia.'');
			if ($simplisia === false) 
			{
			    print 'error getting Data Simplisia : '.$this->db->ErrorMsg().'<br>';
			}
			else
			{
				return $simplisia->fields;
			}
		}

		public function insert_simplisia($nama_simplisia)
		{
			$ns=$new_simplisia['nama_simplisia'];
			$nl=$new_simplisia['nama_lain'];
			$nta=$new_simplisia['nama_tanaman_asal'];
			$keluarga=$new_simplisia['keluarga'];
			$zat=$new_simplisia['zat_berkhasiat'];
			$penggunaan=$new_simplisia['penggunaan'];
			$pemerian=$new_simplisia['pemerian'];
			$bagian=$new_simplisia['bagian'];
			$penyimpana=$new_simplisia['penyimpanan'];
			$jenis=$new_simplisia['jenis'];
			$spl = "insert into simplisia (nama_simplisia, nama_lain, nama_tanaman_asal, keluarga, zat_berkhasiat, penggunaan, pemerian, bagian, penyimpanan, jenis) ";
			$spl .= "values ('$ns', '$nl', '$nta', '$keluarga', '$zat', '$penggunaan', '$pemerian', '$bagian', '$penyimpanan', $jenis)";
			$inputSimplisia = $this->db->Execute($spl);
			if ($inputSimplisia === false) 
			{
			    return 'error adding Data Simplisia: '.$this->db->ErrorMsg().'<BR>';
			}
			else
			{
				return 'success adding Data Simplisia';
			}
		}

		public function update_simplisia(update_simplisia($nama_simplisia,$update_simplisia)
		{
			$nama_simplisia=$update_simplisia['nama_simplisia'];
			$nama_lain=$update_simplisia['nama_lain'];
			$nama_tanaman_asal=$update_simplisia['nama_tanaman_asal'];
			$keluarga=$update_simplisia['keluarga'];
			$zat=$update_simplisia['zat_berkhasiat'];
			$penggunaan=$update_simplisia['penggunaan'];
			$pemerian=$update_simplisia['pemerian'];
			$bagian=$update_simplisia['bagian'];
			$penyimpanan=$update_simplisia['penyimpanan'];
			
			$simplisia="UPDATE simplisia SET nama_simplisia='$nama_simplisia',nama_lain='$nama_lain',nama_tanaman_asal='$nama_tanaman_asal',keluarga='$keluarga', zat_berkhasiat='$zat',penggunaan='$penggunaan', pemerian='$pemerian',bagian='$bagian', penyimpanan='$penyimpanan'  WHERE nama_simplisia='$nama_simplisia'";
			$updateSimplisia = $this->db->Execute($simplisia);
			if ($updateSimplisia === false) 
			{
			    print 'error Update Data Simplisia: '.$this->db->ErrorMsg().'<BR>';
			}
			else
			{
				print 'success Update Data Simplisia';
			}
		}

		public function destroy_simplisia($nama_simplisia)
		{
			$simplisia="DELETE FROM simplisia WHERE nama_simplisia='$nama_simplisia'";
			$deleteSimplisia = $this->db->Execute($simplisia);
			if ($deleteSimplisia === false) 
			{
			    print 'error deleting Simplisia: '.$this->db->ErrorMsg().'<BR>';
							header('Location:client.php');
			}
			else
			{
				header('Location: http://localhost/a/simplisia/client.php');
				die();
			}
		}

	}
	
?>