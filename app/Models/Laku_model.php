<?php
class Laku_model{
    private $db;
    private $lib;
    private $table = 'laku';
    public function __construct(){
        $this->db = new Database();
        $this->lib = new Lib();
    }
    private function ceksisabarang($id){
        $this->db->query('SELECT * FROM barang WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->sigle()->sisa;
    }
    private function ubahsisabarang($id,$sisa){
        $this->db->query('UPDATE `barang` SET `sisa` = :sisa WHERE `barang`.`id` = :id_barang;');
        $this->db->bind('id_barang',$id);
        $this->db->bind('sisa',$sisa);
        $this->db->execute();
    }
    private function cekqty($id){
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id',$this->lib->truepositif($id));
        return $this->db->sigle()->qty;
    }
    public function laku(){
        $query = "SELECT laku.id,nama_barang,barang.id as id_barang,harga_jual,qty,nama,laku.tanggal FROM laku  JOIN user ON laku.user_id=user.id  LEFT JOIN barang ON laku.id_barang=barang.id";
        $this->db->query($query);
        return $this->db->resultset();
    }
    public function barang(){
        $this->db->query('SELECT * FROM barang');
        return $this->db->resultset();
    }
    public function add($data){
        $qty = $this->lib->truepositif($data['qty']);
        if(!session_id()){
            session_start();
        }
  
        if($this->ceksisabarang($data['nama_barang']) < $qty){
            Flasher::setflash('Barang','Tidak Cukup','danger');
            header('Location:'.BASEURL.'/laku');
        }else{
      
            if($data['qty'] == 0){
                Flasher::setflash('Barang','Jumlah Barang Tidak Boleh 0','danger');
                header('Location:'.BASEURL.'/laku');
                return FALSE;
            }

            $sisa_sekarang = $this->ceksisabarang($data['nama_barang']);
            $qty = $this->lib->truepositif($data['qty']);
            $sisa = $sisa_sekarang - $qty;
            $this->ubahsisabarang($data['nama_barang'],$sisa);

            $nama_barang = $data['nama_barang'];
            $qty = $this->lib->truepositif($data['qty']);
            $user_id = $_SESSION['user_data'];
            $tanggal = time();
            $query = "INSERT INTO laku VALUES(NULL,:nama_barang,:qty,:user_id,:tanggal)";
            $this->db->query($query);
            $this->db->bind('nama_barang',$nama_barang);
            $this->db->bind('qty',$qty);
            $this->db->bind('user_id',$user_id);
            $this->db->bind('tanggal',$tanggal);
            $this->db->execute();
            return $this->db->rowcount();
        }

    }
    public function laku_id($data){
        $id = $data['id'];
        $this->db->query("SELECT * FROM LAKU WHERE id= :id");
        $this->db->bind('id',$id);
        return $this->db->sigle();
    }

    public function edit($data){
    
        $qty = $this->lib->truepositif($data['qty']);
        $ceksisa = $this->ceksisabarang($data['nama_barang']);
        if($ceksisa < $qty){
            if(!session_id()){
                session_start();
            }
            Flasher::setflash('Barang','Tidak Cukup','danger');
            header('Location:'.BASEURL.'/laku');
            return FALSE;
        }else{
            //di tambah dulu
            $cekqty = $this->cekqty($this->lib->truepositif($data['id']));
            $sisa = $ceksisa + $cekqty;
            $r1 = $this->ubahsisabarang($data['nama_barang'],$sisa);
            //lalu di kurangi
            $sisa2 = $this->ceksisabarang($data['nama_barang'],$data['nama_barang']) - $qty;
            $r2 = $this->ubahsisabarang($data['nama_barang'],$sisa2);
            //query laku
            $query = "UPDATE $this->table SET `id_barang` = :nama_barang, `qty` = :qty, `user_id` = :user_id, `tanggal` = :tanggal WHERE $this->table.`id` = :id;";
            $this->db->query($query);
            $this->db->bind('id',$data['id']);
            $this->db->bind('nama_barang',$data['nama_barang']);
            $this->db->bind('qty',$qty);
            if(!session_id()){
                session_start();
            }
            $user_id = $_SESSION['user_data'];
            $this->db->bind('user_id',$user_id);
            $tanggal = time();
            $this->db->bind('tanggal',$tanggal);
            $this->db->execute();
            return $this->db->rowcount();
        }
   
    }
    public function delete($data){
        $id = $data['id'];
        $id_barang = $data['id_barang'];
        $sisa = $data['qty'] + $this->ceksisabarang($id_barang);
        $this->ubahsisabarang($id_barang,$sisa);
        $this->db->query("DELETE FROM $this->table WHERE id=:id");
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowcount();
    }
}