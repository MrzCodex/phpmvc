<?php
class Barang extends Controller{
    private $lib;
    public function __construct(){
        $this->lib = new Lib();
        $this->lib->is_not_login();
        $this->lib->cookiecheck();
    }
    public function index(){
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $data['databarang'] = $this->model('Barang_model')->data_barang_all();
        $this->view('template/index','barang/index',$data);
    }
    public function add(){
       if($this->model('Barang_model')->add($_POST) > 0){
           Flasher::setflash('Barang','di Tambahkan','success');
           header('Location:'.BASEURL.'/barang');
       }
    }
    public function edit(){
        if(!isset($_POST['id'])){
            header('Location:'.BASEURL);
        }
       echo json_encode($this->model('Barang_model')->data_barang_id());
    }
    public function editprogress(){
        if(!isset($_POST['id'])){
            header('Location:'.BASEURL);
        }
        if($this->model('Barang_model')->edit($_POST) > 0){
            session_start();
            Flasher::setflash('Barang','Berhasil Di Ubah','success');
            header('Location:'.BASEURL.'/barang');
        }else{
            session_start();
            Flasher::setflash('Barang','Gagal Di Ubah','danger');
            header('Location:'.BASEURL.'/barang');
        }
    }
    public function delete(){
        if($this->model('Barang_model')->delete($_POST) > 0){
            session_start();
            Flasher::setflash('Barang','di Hapus','danger');
            header('Location:'.BASEURL.'/barang');
        }else{
            Flasher::setflash('Barang','Gagal di Hapus','danger');
            header('Location:'.BASEURL.'/barang');
        }
    }
}