<?php
class User_model{
    private $db;
    private $lib;
    private $table ="user";
    public function __construct(){
        $this->db = new Database();
        $this->lib = new Lib();
    }

    public function getalluser(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getdetail(){
        $id = $_POST['id'];
        $this->db->query("SELECT id,nama,email,password,date_created,gambar_user FROM $this->table WHERE id=:id");
        $this->db->bind('id',$id);
        return $this->db->sigle();
    }
    public function adduser($data){
        $check = $this->db->query("SELECT * FROM user WHERE email = :cemail");
        $this->db->bind('cemail',$data['email']);
        if($this->db->sigle()){
            echo "<script>
                    alert('Email Sudah Terdaftar');
                    document.location.href='../user';
                </script>";
            return FALSE;
        }
        $query = "INSERT INTO `user` (`id`, `nama`, `email`, `password`, `date_created`, `date_login`, `cookie`, `gambar_user`) VALUES (NULL, :nama, :email , :password, :date_created, :date_login, :cookie, :gambar_user);";
        $this->db->query($query);
        $this->db->bind('nama',$this->lib->antihtml($data['nama']));
        $this->db->bind('email',$this->lib->antihtml($data['email']));
        $this->db->bind('password',password_hash($data['password'],PASSWORD_DEFAULT));
        $this->db->bind('date_created',$this->lib->antihtml(time()));
        $this->db->bind('date_login',$this->lib->antihtml(time()));
        $this->db->bind('cookie','No Cookie');
        if($_FILES['gambar']['error'] ===4){
            $gambar = "No Image";
        }else{
            $gambar = $this->lib->upload();
        }
        $this->db->bind('gambar_user',$this->lib->antihtml($gambar));

        $this->db->execute();
        return $this->db->rowcount();
    }
    public function edituser($data){    
        $query = "UPDATE $this->table SET nama=:nama,email=:email,date_created=:date_created,gambar_user=:gambar_user WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$this->lib->antihtml($data['id']));
        $this->db->bind('nama',$this->lib->antihtml($data['nama']));
        $this->db->bind('email',$this->lib->antihtml($data['email']));
        $this->db->bind('date_created',$this->lib->antihtml(time()));
        if($_FILES['gambar']['error']===4){
            $gambar = $data['gambar_lama'];
        }else{
            $id = $data['id'];
            $this->lib->deletefile($this->table,$id,'gambar_user');
            $gambar = $this->lib->upload();
        }
        $this->db->bind('gambar_user',$this->lib->antihtml($gambar));

        $this->db->execute();
        return $this->db->rowcount();
    }
    public function delete($data){
        $id = $data['id'];
        $this->lib->deletefile($this->table,$id,'gambar_user');
        $this->db->query("DELETE FROM user WHERE id = :id");
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowcount();
    }
}