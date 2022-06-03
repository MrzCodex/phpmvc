<?php
class Auth extends Controller{
    private $lib,$db;
    public function __construct(){
        $this->lib = new Lib();
        $this->db = new Database();
        $this->lib->is_login();
    }
    public function index(){
        $this->view('auth/login');
    }
    public function register(){
        $this->view('auth/register');
    }
    public function register_progress(){
        if($this->model('Auth_model')->register($_POST) > 0){
             header ('Location:'.BASEURL.'/auth');
        }
    }
    public function login(){
        $this->_login($_POST);
        exit;
    } 
    private function _login($data){
        $email = $this->lib->antihtml($data['email']);
        $password = $this->lib->antihtml($data['password']);

        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind('email',$email);
    
        if($row = $this->db->sigle()){
            $data_user[] = $row;
            if(password_verify($password,$data_user[0]->password)){
                $this->lib->cookieset($data_user[0]->id);
                if(isset($_POST['ingat'])){
                    $this->db->query("SELECT * FROM user WHERE email = :email");
                    $this->db->bind('email',$email);
                    $data_cookie [] = $this->db->sigle();
                    setcookie('id',$data_cookie[0]->id,time() + 3600,'/');
                    setcookie('cookie',$data_cookie[0]->cookie,time() + 3600,'/');
                    setcookie('key',hash('sha256',$data_cookie[0]->email),time() + 3600,'/');
                }
                unset($_SESSION['lockscreen']);
                $_SESSION['user_data_lock'] = $data_user[0]->id;
                $_SESSION['user_data'] = $data_user[0]->id;
                Flasher::setflash('Selamat Datang',"{$data_user[0]->nama}",'success');
                header('Location:'.BASEURL.'/home');
            }else{
                echo "<script>
                    alert('Password Salah !');
                    document.location.href='../auth';
                </script>";
            }
        }else{
            echo "<script>
                    alert('Email Belum Terdaftar !');
                    document.location.href='../auth';
                </script>";
        }
    }
    public function lockscreen(){
        if(!isset($_SESSION['user_data_lock'])){
            header('Location:'.BASEURL);
        }
        $data['session'] = $this->model('Auth_model')->session_login($_SESSION['user_data_lock']);
        $_SESSION['lockscreen'] = "Ok";
        $this->view('auth/lockscreen','no',$data);
    }

    public function logout(){
        session_start();
        unset($_SESSION['user_data']);
        unset($_SESSION['user_data_lock']);
        setcookie('id','',time() - 3600,'/');
        setcookie('cookie','',time() - 3600,'/');
        setcookie('key','',time() - 3600,'/');
        header('Location:'.BASEURL);
    }
}