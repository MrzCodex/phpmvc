<?php
class Setting extends Controller{
    private $lib;
    public function __construct(){
        $this->lib = new Lib();
        $this->lib->is_not_login();
        $this->lib->cookiecheck();
    }
    public function index(){
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $data['setting'] = $this->model('Setting_model')->getnameapp();
        $this->view('template/index','setting/index',$data);
    }
    public function ubahnama(){
        if($this->model('Setting_model')->changenameapp($_POST) > 0){
            if(!session_id()){
                session_start();
            }
            Flasher::setflash('NAMA APP','BERHASIL DI UBAH','success');
            header('Location:'.BASEURL.'/setting');
        }else{
            Flasher::setflash('NAMA APP','GAGAL DI UBAH','danger');
            header('Location:'.BASEURL.'/setting');
        }
    }
}