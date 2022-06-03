<?php
class Profil_model{
    private $db;
    private $table = "user";
    private $lib;
    public function __construct(){
        $this->db = new Database();
        $this->lib = new Lib();
    }

    public function ubahnama($data){
        $id = $this->lib->antihtml($data['id']);
        $nama = $this->lib->antihtml($data['nama']);
        $this->db->query("UPDATE $this->table SET nama = :nama WHERE $this->table.id = :id;");
        $this->db->bind('id',$id);
        $this->db->bind('nama',$nama);
        $this->db->execute();
        return $this->db->rowcount();
    }
    public function ubahfoto($data){
        $id = $this->lib->antihtml($data['id']);
        $gambar_lama = $this->lib->antihtml($data['gambar_lama']);
        if($_FILES['gambar']['error'] ===4){
            echo "<script>
                    alert('Masukan Foto Profil');
                    document.location.href='../profil';
                </script>";
            return FALSE;
        }
        $gambar = $this->lib->antihtml($this->lib->upload());
        $this->lib->deletefile($this->table,$id,'gambar_user');
        $query = "UPDATE `$this->table` SET `gambar_user` = :gambar WHERE `$this->table`.`id` = :id;";
        $this->db->query($query);
        $this->db->bind('id',$id);
        $this->db->bind('gambar',$gambar);
        $this->db->execute();
        return $this->db->rowcount();
    }
    public function ubahpassword($data){
        $id = $this->lib->antihtml($data['id']);
        $password_old = $this->lib->antihtml($data['password_old']);

        $this->db->query("SELECT password FROM $this->table WHERE id=:id");
        $this->db->bind('id',$id);
        if($row =$this->db->sigle()){
            if(password_verify($password_old,$row->password)){
                $password_new = $this->lib->antihtml($data['password_new']);
                $query2 = "UPDATE $this->table SET password = :passwordnew WHERE $this->table.id = :id;";
                $this->db->query($query2);
                $this->db->bind('id',$id);
                $this->db->bind('passwordnew',password_hash($password_new,PASSWORD_DEFAULT));
                $this->db->execute();
                    if(!session_id()){
                        session_start();
                    }
                    Flasher::setflash('Password Berhasil','di Ubah','success');
                    header('Location:'.BASEURL.'/profil');

            }else{
                if(!session_id()){
                    session_start();
                }
                Flasher::setflash('Password Lama','Salah','danger');
                header('Location:'.BASEURL.'/profil');
            }
        }
    }
}