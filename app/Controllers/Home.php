<?php
class Home extends Controller{
    private $lib;
    public function __construct(){
        $this->lib = new Lib();
        $this->lib->is_not_login();
        $this->lib->cookiecheck();
    }
    public function index(){
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $this->view('template/index','home/index',$data);
    }

}