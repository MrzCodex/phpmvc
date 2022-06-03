<?php
class Db_model{
    private $dbh;
    private $stmt;

    public function __construct(){
        // data souce name
        $dns = "mysql:host=localhost;dbname=phpmvc;";
        try{
            $this->dbh = new PDO($dns, 'root','');
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function getalluser(){
        $this->stmt = $this->dbh->prepare('SELECT * FROM user');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
}