<?php 
class Lib{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function gettitle($title,$title2,$title3){
        $data['title'] = $title;
        $data['title2'] = $title2;
        $data['title3'] = $title3;
        $chars = "_ -";
        $chars = explode(" ",$chars);
        $data = str_replace($chars,' ',$data);
        return $data;
    }
    public function besarpertama($value){
        $pecah = str_split($value);
        $pertama = strtoupper($pecah[0]);
        unset($pecah[0]);
        $hasil =  $pertama.implode($pecah); 
        return $hasil;
    }
    public function rp($value){
        return number_format($value,2,",",".");
    }
    public function truepositif($value){
        if($value < 0){
            $value *= -1;
        }
        return $value;
    }
    public function upload(){
        $nama_file = $_FILES['gambar']['name'];
        $nama_tmp = $_FILES['gambar']['tmp_name'];
        $ukuran = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];

        if($error === 4){
            echo "<script>
                    alert('Gambar Tidak Boleh Kosong');
                </script>";
            return FALSE;
        }
        $gambar_valid =['png','jpg','jpeg'];
        $tipegambar  = explode('.',$nama_file);
        $tipegambar  = strtolower(end($tipegambar));
        if(!in_array($tipegambar,$gambar_valid)){
            echo "<script>
                 alert('Bukan Gambar');
                 </script>";
            return FALSE;
        }
        $nama_gambarnew = uniqid();
        $nama_gambarnew .= '.'.$nama_file;
        move_uploaded_file($nama_tmp,'../public/assets/img/'.$nama_gambarnew);
        return $nama_gambarnew;
    }
    public function deletefile($table,$id,$dbfile){
        $this->db->query("SELECT * FROM $table WHERE id=:id");
        $this->db->bind('id',$id);
        $row = $this->db->sigle();
        if(is_file('../public/assets/img/'.$row->$dbfile)){
            unlink('../public/assets/img/'.$row->$dbfile);
        }

    }
    public function antihtml($value){
        return htmlspecialchars($value);
    }
    public function is_not_login(){
        // $this->cookiecheck();
      if(!session_id()){  
    session_start();
      }
    if(!isset($_SESSION['user_data'])){
        header('Location:'.BASEURL.'/auth');
    }else if(isset($_SESSION['lockscreen'])){
        unset($_SESSION['user_data']);
        //unset semua cookie di saat lockscreen
        setcookie('id','',time() - 3600,'/');
        setcookie('cookie','',time() - 3600,'/');
        setcookie('key','',time() - 3600,'/');
        header('Location:'.BASEURL.'/auth/lockscreen');
    }
    }
    public function is_login(){
    $this->cookiecheck();
    if(!session_id()){
        session_start();
    }
    if(isset($_SESSION['user_data'])){
        unset($_SESSION['lockscreen']);
        header('Location:'.BASEURL.'/home');
    }
    }
    public function cookieset($id){
        $cookie = uniqid();
        $this->db->query("UPDATE `user` SET `date_login` = :tanggal,`cookie` = :cookie WHERE `user`.`id` = :id;");
        $this->db->bind('id',$id);
        $this->db->bind('tanggal',time());
        $this->db->bind('cookie',$cookie);
        $this->db->execute();
    }
    public function cookiecheck(){
        if(isset($_COOKIE['id'])&&isset($_COOKIE['cookie'])&&isset($_COOKIE['key'])){
            $id = $_COOKIE['id'];
            $cookie = $_COOKIE['cookie'];
            $key = $_COOKIE['key'];

            $this->db->query("SELECT * FROM user WHERE id = :id");
            $this->db->bind('id',$id);
            $r = $this->db->sigle();
    
            if($id == $r->id && $cookie == $r->cookie && $key == hash('sha256',$r->email)){
                if(!session_id()){
                    session_start();
                }
                $_SESSION['user_data']=$this->db->sigle()->id;
                $_SESSION['user_data_lock']=$this->db->sigle()->id;
            }else{
                header('Location:'.BASEURL.'/auth/logout');
            }
        }
    }
}