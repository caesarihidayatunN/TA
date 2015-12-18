<?php 
    $ns = "http://".$_SERVER['HTTP_HOST']."/simplisia/kategorisimplisia.php";//setting namespace
    require_once 'lib/nusoap.php'; // load nusoap toolkit library in controller
    $server = new soap_server; // create soap server object
    $server->configureWSDL("WEB SERVICE DATA SIMPLISIA UNTUK FARMAKOGNOSI MENGGUNAKAN SOAP WSDL", $ns); // wsdl configuration
    $server->wsdl->schemaTargetNamespace = $ns; // server namespace

    ########################Kategori Simplisia##############################################################
    // Complex Array Keys and Kategori Simplisia++++++++++++++++++++++++++++++++++++++++++
    $server->wsdl->addComplexType("kategoriData","complexType","struct","all","",
        array(
        "nama_simplisia"=>array("name"=>"nama_simplisia","type"=>"xsd:string"),
        "jenis"=>array("name"=>"jenis","type"=>"xsd:string")
        )
    );
    // Complex Array Simplisia++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    $server->wsdl->addComplexType("kategoriArray","complexType","array","","SOAP-ENC:Array",
        array(),
        array(
            array(
                "ref"=>"SOAP-ENC:arrayType",
                "wsdl:arrayType"=>"tns:kategoriData[]"
            )
        ),
        "kategoriData"
    );
    // End Complex Jenis++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //create jenis simplisia
    $input_create = array('jenis' => "xsd:string"); // parameter create kategori
    $return_create = array("return" => "xsd:string");
    $server->register('create',
        $input_create,
        $return_create,
        $ns,
        "urn:".$ns."/create",
        "rpc",
        "encoded",
        "Menyimpan jenis Simplisia baru");
    //end create jenis simplisia
    //readbyNamaSimplisia
    $input_readbyNamaSimplisia = array('nama_simplisia' => "xsd:string"); // parameter readbyNamaSimplisia
    $return_readbyNamaSimplisia = array("return" => "tns:kategoriArray");
    $server->register('readbyNamaSimplisia',
        $input_readbyNamaSimplisia,
        $return_readbyNamaSimplisia,
        $ns,
        "urn:".$ns."/readbyNamaSimplisia",
        "rpc",
        "encoded",
        "Mengambil jenis simplisia by nama simplisia");

    $input_update = array('nama_simplisia' => "xsd:string","jenis"=>"xsd:string"); // parameter update kategori
    $return_update = array("return" => "xsd:string");
    $server->register('updatebyNamaSimplisia',
        $input_update,
        $return_update,
        $ns,
        "urn:".$ns."/updatebyNamaSimplisia",
        "rpc",
        "encoded",
        "Mengupdate jenis by nama simplisia");
    //end update kategori buku
    //delete kategori buku
    $input_delete = array('nama_simplisia' => "xsd:string"); // parameter hapus kategori
    $return_delete = array("return" => "xsd:string");
    $server->register('deletebyNamaSimplisia',
        $input_delete,
        $return_delete,
        $ns,
        "urn:".$ns."/deletebyNamaSimplisia",
        "rpc",
        "encoded",
        "Menghapus jenis by nama simplisia");
    //end delete kategori buku
    //Ambil Semua Data kategori buku
    $input_readall = array(); // parameter ambil data kategori
    $return_readall = array("return" => "tns:kategoriArray");
    $server->register('readall',
        $input_readall,
        $return_readall,
        $ns,
        "urn:".$ns."/readall",
        "rpc",
        "encoded",
        "Mengambil Semua Data Simplisia");
    //Ambil Semua Data kategori buku
    ################################Kategori BUKU#######################################################
    ###########################FUNCTION KATEGORI BUKU###################################################
    function insert_simplisia($nama_simplisia){
        require_once 'classDb/Classkategori.php';
        $kategori = new Classkategori;
        if ($kategori->create($jenis)) {
            $respon = "sukses";
        }else{
            $respon = "error";
        }
        return $respon;
    }
    function readbyNamaSimplisia($nama_simplisia){
        require_once 'classDb/Classkategori.php';
        $kategori = new Classkategori;
        $hasil = $kategori->readbyNamaSimplisia($nama_simplisia);
        $daftar = array();
        while ($item = $hasil->fetch_assoc()) {
            array_push($daftar, array('nama_simplisia'=>$item['nama_simplisia'],'jenis'=>$item['jenis']));
        }
        return $daftar;
    }
    function readall(){
        require_once 'classDb/Classkategori.php';
        $kategori = new Classkategori;
        $hasil = $kategori->readAll();
        $daftar = array();
        while ($item = $hasil->fetch_assoc()) {
            array_push($daftar, array('nama_simplisia'=>$item['nama_simplisia'],'jenis'=>$item['jenis']));
        }
        return $daftar;
    }
    function updatebyNamaSimplisia($nama_simplisia,$jenis){
        require_once 'classDb/Classkategori.php';
        $kategori = new Classkategori;
        if ($kategori->updatebyid($nama_simplisia,$jenis)) {
            $respon = "sukses";
        }else{
            $respon = "error";
        }
        return $respon;
    }
    function deletebyNamaSimplisia($nama_simplisia){
        require_once 'classDb/Classkategori.php';
        $kategori = new Classkategori;
        if ($kategori->deletebyid($nama_simplisia)) {
            $respon = "sukses";
        }else{
            $respon = "error";
        }
        return $respon;
    }

    $server->service(file_get_contents("php://input"));
 ?>