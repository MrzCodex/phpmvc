<?php 
class Setting_model{
    private $db;


    public function __construct(){
        $this->db = new Database();
    }
    public function getnameapp(){
        $this->db->query('SELECT * FROM setting WHERE id=1');
        return $this->db->sigle()->name_app;
    }
    public function changenameapp($data){
        $name_app = $data['name_app'];
        $this->db->query("UPDATE setting SET name_app =:name_app WHERE id = 1");
        $this->db->bind('name_app',$name_app);
        $this->db->execute();
        return $this->db->rowcount();
    }

}