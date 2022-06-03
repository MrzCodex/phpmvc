<?php 
class Laku extends Controller{
    private $lib;
    public function __construct(){
        $this->lib = new Lib();
        $this->lib->is_not_login();
        $this->lib->is_not_login();
        $this->lib->cookiecheck();
        
    }
    public function index(){
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $data['allbarang'] = $this->model('Laku_model')->barang();
        $data['laku'] = $this->model('Laku_model')->Laku();
        $this->view('template/index','laku/index',$data);
    }
    public function add(){
        if($this->model('Laku_model')->add($_POST) > 0){
            session_start();
            Flasher::setflash('Data Laku','Berhasil Di Tambah','success');
            header('Location:'.BASEURL.'/laku');
        }
    }
    public function edit(){
        echo json_encode($this->model('Laku_model')->laku_id($_POST));
    }
    public function editprogress(){
       if($this->model('Laku_model')->edit($_POST) > 0){
        if(!session_id()){
            session_start();
        }
        Flasher::setflash('Data Laku','Berhasil di Update','success');
        header('Location:'.BASEURL.'/laku');
       }
    }
    public function delete(){
        if($this->model('Laku_model')->delete($_POST) > 0){
            if(!session_id()){
                session_start();
            }
            Flasher::setflash('Data Laku','Berhasil di delete','success');
            header('Location:'.BASEURL.'/laku');
        }
    }
}