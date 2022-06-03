<?php
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name_db = DB_NAME;

    private $dbh;
    private $smtm;

    public function __construct(){
        // data souce name
        $dns = "mysql:host=$this->host;dbname=$this->name_db;";
        $options = [
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dns, $this->user,$this->pass);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function query($query){
        $this->smtm = $this->dbh->prepare($query);
    }
    public function bind($param,$value,$type = null){
        if(is_null($type)){
            switch ( true ){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->smtm->bindValue($param,$value,$type);
    }

    public function execute(){
        $this->smtm->execute();
    }
    public function resultSet(){
        $this->execute();
        return $this->smtm->fetchAll(PDO::FETCH_OBJ);
    }
    public function sigle(){
        $this->execute();
        return $this->smtm->fetch(PDO::FETCH_OBJ);
    }
    public function rowcount(){
        return $this->smtm->rowCount();
    }
}