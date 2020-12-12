<?php 
require("confige.php");

class Database{

    public  $connection;

    function __construct(){
        $this->open_db_connection();

    }

    public function open_db_connection(){
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->connection->connect_errno){
            die("Database connection failed" . $this->connection->error());
        }

    }
    public function query($sql){
        $result = $this->connection->query($sql);
        $this->confirme_query($result);
        return  $result;
        
        
    }
    private function confirme_query($result){
        if(!$result){
            die("Query is failed!!");
        }

    }
    public function escap_string($String){
        $escap_string =  $this->connection->real_escap_string($String);
        return  $escap_string;

        
    }
    public function the_insert_id(){
        return $this->connection->insert_id();

    }

    

}
$database = new Database();

?>