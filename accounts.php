<?php
class DA
{
    public static $connection;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli('localhost', 'root', '', 'nhom9');
            self::$connection->set_charset('utf8');
        }
        return self::$connection;
    }
    public function query($sql){
        
        $data = mysqli_query(self::$connection, $sql);
        
        return $data;
        
    }
    public function select1($sql){
        
        $data = $this->query($sql);
        
        $rows = [];
        
        while($row = mysqli_fetch_assoc($data)){
            $rows[]  = $row;
        }
        return $rows;          
    }
}
// include 'DA.php';
class accounts extends DA {
    public function  selectuser(){
        $sql = "SELECT * FROM accounts";
    $result = $this->select1($sql);
    return $result;
    }
    
    public function insertUser($data){
        $sql = 'INSERT INTO accounts (`username`,`password`)'
              .'VALUES ("'.$data['username'].'","'.$data['password'].'")';
        $this->query($sql);
    }
}
?>