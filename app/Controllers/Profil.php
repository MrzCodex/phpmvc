<?php 
class Profil extends Controller{
    private $lib;
    public function __construct(){
        $this->lib = new Lib();
        $this->lib->is_not_login();
        $this->lib->cookiecheck();
    }
    public function index(){
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $this->view('template/index','profil/index',$data);
    }
    public function ubahnama(){
        if($this->model('Profil_model')->ubahnama($_POST) > 0){
            if(!session_id()){
                session_start();
            }
            session_start();
            Flasher::setflash('Nama','Berhasil Di ubah','success');
            header('Location:'.BASEURL.'/profil');
        }else{
            session_start();
            Flasher::setflash('Nama','Gagal Di ubah','danger');
            header('Location:'.BASEURL.'/profil');
        }
    }
    public function ubahfoto(){
        if($this->model('Profil_model')->ubahfoto($_POST) > 0){
            session_start();
            Flasher::setflash('Foto Profil','Berhasil Di ubah','success');
            header('Location:'.BASEURL.'/profil');
        }
    }
    public function hapusfoto(){
        if(!session_id()){
            session_start();
        }
        $id = $_SESSION['user_data'];
        $this->lib->deletefile('user',$id,'gambar_user');
        Flasher::setflash('Foto Profil','Di Hapus','success');
        header('Location:'.BASEURL.'/profil');
    }
    public function ubahpassword(){
        $this->model('Profil_model')->ubahpassword($_POST);
    }
}