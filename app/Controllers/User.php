<?php
class User extends Controller{
    private $lib;
    public function __construct(){
        $this->lib = new Lib();
        $this->lib->is_not_login();
        $this->lib->cookiecheck();
    }
    public function index(){
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $data['nama'] ="Mirza Aja";
        $data['model'] = $this->model('User_model')->getalluser();
        $this->view('template/index','user/index',$data);
    }

    public function details(){
        if(!isset($_POST['id'])){
            $url = BASEURL;
            echo "<script>
                    alert('Not Valid Url');
                    document.location.href='$url';
                </script>";
                return FALSE;
        }
        $data = $this->lib->gettitle(NAMEAPP." | ".$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__CLASS__),$this->lib->besarpertama(__FUNCTION__));
        $data['model'] = $this->model('User_model')->getdetail();
        $this->view('template/index','user/detail',$data);
    }
    public function add(){
      if($this->model('User_model')->adduser($_POST) > 0 ){
          session_start();
          Flasher::setflash('Berhasil di','Tambah','success');
          header('Location:'.BASEURL.'/user');
      }
    }
    public function edit(){
       echo json_encode($data['model'] = $this->model('User_model')->getdetail());
    }
    public function editprogress(){
        if($this->model('User_model')->edituser($_POST) > 0 ){
            session_start();
            Flasher::setflash('Berhasil di','Edit','success');
            header('Location:'.BASEURL.'/user');
        }
    }
    public function delete(){
        $this->lib->deletefile('user',$_POST['id'],'gambar_user');
        if($this->model('User_model')->delete($_POST) > 0){
            session_start();
            Flasher::setflash('Berhasil di','Hapus','danger');
            header('Location:'.BASEURL.'/user');
        }
    }
}