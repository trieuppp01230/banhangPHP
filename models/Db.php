<?php
class Db
{
    public static $connection = NULL;
    /**
     * @return connection object
     */
    public function __construct()
    {
        if (!self::$connection) {
            // self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            self::$connection = new mysqli('localhost', 'root', '', 'mydb_nhom9');
            self::$connection->set_charset('utf8');
        }
        return self::$connection;
    }
    public function __destruct()
    {
        //self::$connection->close();
    }
    /**
     * @param statement object $sql
     * @return ARRAY list of items
     */
    public function select($sql)
    {
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
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
