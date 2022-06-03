<?php
class Barang_model{
    private $db;
    private $lib;
    private $table = "barang";
    public function __construct(){
        $this->db = new Database();
        $this->lib = new Lib();
    }
    public function data_barang_all(){
       $query = "SELECT barang.id,nama_barang,keterangan,harga_modal,harga_jual,stock,sisa,tanggal,nama,gambar FROM barang INNER JOIN user ON barang.user_id=user.id";
        $this->db->query($query);
       return $this->db->resultset();
    }
    public function add($data){
        if(!session_id()){
            session_start();
        }
        $query = "INSERT INTO $this->table VALUES(NULL,:nama_barang,:keterangan,:harga_modal,:harga_jual,:stock,:sisa,:tanggal,:user_id,:gambar)";
        $this->db->query($query);
        $this->db->bind('nama_barang',$data['nama_barang']);
        $this->db->bind('keterangan',$data['keterangan']);
        $this->db->bind('harga_modal',$data['harga_modal']);
        $this->db->bind('harga_jual',$data['harga_jual']);
        $this->db->bind('stock',$data['stock']);
        $this->db->bind('sisa',$data['sisa']);
        $this->db->bind('tanggal',time());
        $this->db->bind('user_id',$_SESSION['user_data']);
        if($_FILES['gambar']['error'] == 4){
            $gambar ="No Image";
        }else{
            $gambar = $this->lib->upload();
        }
        $this->db->bind('gambar',$gambar);
        $this->db->execute();
        return $this->db->rowcount();
    }
    public function data_barang_id(){
        $id = $_POST['id'];
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id',$id);
        return $this->db->sigle();
    }
    public function edit($data){
        if(!session_id()){
            session_start();
        }
        $query = "UPDATE $this->table SET nama_barang=:nama_barang,keterangan=:keterangan,harga_modal=:harga_modal, harga_jual=:harga_jual,stock=:stock,sisa=:sisa,tanggal=:tanggal,user_id=:user_id,gambar=:gambar WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_barang',$data['nama_barang']);
        $this->db->bind('keterangan',$data['keterangan']);
        $this->db->bind('harga_modal',$data['harga_modal']);
        $this->db->bind('harga_jual',$data['harga_jual']);
        $this->db->bind('stock',$data['stock']);
        $this->db->bind('sisa',$data['sisa']);
        $this->db->bind('tanggal',time());
        $this->db->bind('user_id',$_SESSION['user_data']);
        if($_FILES['gambar']['error'] === 4){
            $gambar = $data['gambar_lama'];
        }else{
            $id = $data['id'];
            $this->lib->deletefile($this->table,$id,'gambar');
            $gambar = $this->lib->upload();
        }
        $this->db->bind('gambar',$gambar);
        $this->db->execute();
        return $this->db->rowcount();
    }
    public function delete($data){
        $id = $data['id'];
        $this->lib->deletefile($this->table,$id,'gambar');
        $this->db->query("DELETE FROM $this->table WHERE id=:id ");
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowcount();
    }
}