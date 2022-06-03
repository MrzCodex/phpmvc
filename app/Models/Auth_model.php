<?php
class Auth_model{
    private $db;
    private $lib;
    private $table ="user";
    public function __construct(){
        $this->db = new Database();
        $this->lib = new Lib();
    }

    // public function getalluser(){
    //     $this->db->query("SELECT * FROM $this->table");
    //     return $this->db->resultSet();
    // }
    public function register($data){
        $nama = $this->lib->antihtml($data['nama']);
        $email = $this->lib->antihtml($data['email']);
        $password = $this->lib->antihtml($data['password']);
        $date = $this->lib->antihtml(time());
        $gambar = $this->lib->antihtml('no image');
        $check = $this->db->query("SELECT * FROM user WHERE email = :cemail");
        $this->db->bind('cemail',$email);
        if($this->db->sigle()){
            echo "<script>
                    alert('Email $email Sudah Terdaftar');
                    document.location.href='register';
                </script>";
            return FALSE;
        }
        $this->db->query("INSERT INTO user VALUES(NULL,:nama,:email,:password,:date_created,:date_login,:cookie,:gambar)");
        $this->db->bind('nama',$this->lib->antihtml($data['nama']));
        $this->db->bind('email',$this->lib->antihtml($data['email']));
        $this->db->bind('password',$this->lib->antihtml(password_hash($data['password'],PASSWORD_DEFAULT)));
        $this->db->bind('date_created',$this->lib->antihtml($date));
        $this->db->bind('date_login',$this->lib->antihtml($date));
        $this->db->bind('cookie',$this->lib->antihtml('No Cookie'));
        $this->db->bind('gambar',$this->lib->antihtml($gambar));
        $this->db->execute();
        return $this->db->rowcount();
    }
    
    public function session_login($data){
        $id = $data;
        $this->db->query("SELECT id,nama,email,date_created,date_login,cookie,gambar_user FROM $this->table WHERE id=:id");
        $this->db->bind('id',$id);
        return $this->db->sigle();
    }
}