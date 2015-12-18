<?php 
    include("adodb/adodb.inc.php"); 
    include("adodb/adodb-exceptions.inc.php");

    class Classkategori{
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

        public function readbyNamaSimplisia($nama_simplisia)
        {

            $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
            $simplisia = $this->db->Execute("SELECT * FROM simplisia where nama_simplisia='$nama_simplisia' LIMIT 1");
            $data_simplisia = array();
            while(!$simplisia->EOF)
            {
                $data_simplisia['nama_simplisia'] = $simplisia->fields[0];
                $data_simplisia['nama_lain'] = $simplisia->fields[1];
                $data_simplisia['nama_tanaman_asal'] = $simplisia->fields[2];
                $data_simplisia['keluarga'] = $simplisia->fields[3];
                $data_simplisia['zat_berkhasiat'] = $simplisia->fields[4];
                $data_simplisia['penggunaan'] = $simplisia->fields[5];
                $data_simplisia['pemerian'] = $simplisia->fields[6];
                $data_simplisia['bagian'] = $simplisia->fields[7];
                $data_simplisia['penyimpanan'] = $simplisia->fields[8];
                $data_simplisia['jenis'] = $simplisia->fields[9];
                $simplisia->MoveNext();
            }
            return $data_simplisia; 
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


        public function updatebyNamaSimplisia($nama_simplisia,$jenis){
            include 'Koneksi.php';
            $sql = "UPDATE simplisia SET jenis = ? WHERE nama_simplisia = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si',$jenis,$nama_simplisia);
            $query = $stmt->execute();
            $stmt->close();
            $conn->close();
            return $query;
        }
        public function deletebyNamaSimplisia($nama_simplisia){
            $sql = "DELETE FROM simplisia WHERE nama_simplisia = '$nama_simplisia'";
            $ret = $this->db->Execute($sql);
            if($ret === false)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        public function update_simplisia($nama_simplisia,$data)
        {
            $sql = "UPDATE simplisia SET ";
            $sql .= " nama_simplisia='". $data['nama_simplisia']."'";
            $sql .= ", nama_lain='". $data['nama_lain']."'";
            $sql .= ", nama_tanaman_asal='". $data['nama_tanaman_asal']."'";
            $sql .= ", keluarga='". $data['keluarga']."'";
            $sql .= ", zat_berkhasist='". $data['zat_berkhasiat']."'";
            $sql .= ", penggunaan='". $data['penggunaan']."'";
            $sql .= ", pemerian='". $data['pemerian']."'";
            $sql .= ", bagian='". $data['bagian']."'";
            $sql .= ", penyimpanan='". $data['penyimpanan']."'";
            $sql .= ", jenis='". $data['jenis']."'";
            $sql .= " WHERE nama_simplisia='".$nama_simplisia."'";
            //return $sql;
            $update = $this->db->Execute($sql);
            if($update === false)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
 ?>