<?php
include("database.php");

class User{
     public $username;
    public $password;
    public $id;
    public $first_name;
    public  $last_name;


    public static function find_all_users(){
        
        return self::find_quary("SELECT * FROM users");
         
    }
    public static function find_user_by_id($id_user){
        $result_set  = self::find_quary("SELECT * FROM users WHERE id= $id_user LIMIT 1");
        return !empty($result_set) ? array_shift($result_set) : false;;
    }
    public static function find_quary($sql){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while($row = mysqli_fetch_array($result_set)){
            $object_array[] = self::instontiation($row);


        }

        return  $object_array;
    }
    public static function instontiation($the_record){
        $the_object =  new self;
        foreach($the_record as $the_attribu => $value){
            if($the_object->has_the_attribu($the_attribu)){
                $the_object->$the_attribu = $value;

            } 

        }
        return  $the_object;


    }
    private function has_the_attribu($the_attribu){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribu,$object_properties);

    } 
    

}
?>
