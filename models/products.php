<?php
class Products extends Db
{
    // phương thức lấy lên sản phẩm
    public function getAllProducts()
    {
        $sql = self::$connection->prepare(" SELECT * FROM `products`,`manufactures` WHERE `products`.`manu_ID` = `manufactures`.`manu_ID`   ");
        return $this->select($sql);
    }

    public function getListProductsNew() {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY create_at DESC LIMIT 8");
        return $this->select($sql);
    }

    public function getListProductsFeature ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1 LIMIT 8");
        return $this->select($sql);
    }

    public function getType()
    {
        $sql = self::$connection->prepare(" SELECT * FROM `protypes`");
        return $this->select($sql);
    }

    public function getProductByType($type_ID)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_ID`= `protypes`.`type_ID`AND `protypes`.`type_ID` = ?");
   
        $sql->bind_param("i", $type_ID);
      
        return $this->select($sql);
    }

    public function getProductByType2($type_ID, $page, $per_page)
    {
        $first_link = ($page - 1) * $per_page;

        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_ID`= `protypes`.`type_ID`AND `protypes`.`type_ID` = ? LIMIT $first_link,$per_page");
   
        $sql->bind_param("i", $type_ID);
      
        return $this->select($sql);
    }

    public function getManu()
    {
        $sql = self::$connection->prepare(" SELECT * FROM `manufactures`");
        return $this->select($sql);
    }

    public function getProductByManuFactures($manu_ID)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE `products`.`manu_ID`= `manufactures`.`manu_ID`AND `manufactures`.`manu_id` = ?");
   
        $sql->bind_param("i", $manu_ID);
      
        return $this->select($sql);
    }

    public function getProductByManuFactures2($manu_ID, $page, $per_page)
    {
        $first_link = ($page - 1) * $per_page;

        $sql = self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE `products`.`manu_ID`= `manufactures`.`manu_ID`AND `manufactures`.`manu_id` = ? LIMIT $first_link,$per_page");
   
        $sql->bind_param("i", $manu_ID);
      
        return $this->select($sql);
    }

    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`manufactures`,`protypes` WHERE `products`.`manu_ID` = `manufactures`.`manu_ID` AND `products`.`type_ID` = `protypes`.`type_ID` AND ID = ?");
        $sql->bind_param("i", $id);
        return $this->select($sql);
    }

    public function getDetail($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`WHERE ID = ?");
        $sql->bind_param("i", $id);
        return $this->select($sql);
    }

    function findUser($user) {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE Username = ?");
        $sql->bind_param("i", $user);
        return $this->select($sql);
    }

    //tim kiem
    public function search($key)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures`,`protypes` WHERE
             `products`.`manu_ID`= `manufactures`.`manu_ID` AND `products`.`type_ID`= `protypes`.`type_ID` AND `name`LIKE '%$key%'");
        return $this->select($sql);
    }

    public function searchByPrice($Max, $Min) {
        $slq = self::$connection->prepare("SELECT * FROM `products` WHERE `price` <= $Max and `price` >= $Min");
        return $this->select($sql);
    }

    public function listProductSearch($key, $page, $per_page)
    {
        $first_link = ($page - 1) * $per_page;

        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures`,`protypes` WHERE
             `products`.`manu_ID`= `manufactures`.`manu_ID` AND `products`.`type_ID`= `protypes`.`type_ID` AND `name`LIKE '%$key%' LIMIT $first_link,$per_page");
        return $this->select($sql);
    }

    //phan trang
    public function listProduct($page, $per_page)
    {
        $first_link = ($page - 1) * $per_page;
        $sql = self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE 
            `products`.`manu_id` = `manufactures`.`manu_id` LIMIT $first_link,$per_page");
        return $this->select($sql);
    }

    public function phanTrang($base_url, $total_row, $page, $per_page)
    {
        $total_link = ceil($total_row / $per_page);
        $link = "";
        for ($i = 1; $i <= $total_link; $i++) {
            $link = $link . "<li><a href='$base_url?page=$i'>$i</a></li>";
        }
        return $link;
    }
    
    public function search1($key, $page, $per_page)
    {
        $first_link = ($page - 1) * $per_page;
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures`,`protypes` WHERE
             `products`.`manu_ID`= `manufactures`.`manu_ID` AND `products`.`type_ID`= `protypes`.`type_ID` AND
              `name`LIKE '%" . $key . "%' LIMIT $first_link,$per_page");
        return $this->select($sql);
    }

    public function phanTrang1($base_url, $total_row, $page, $per_page)
    {
        $total_link = ceil($total_row / $per_page);
        $link = "";
        for ($i = 1; $i <= $total_link; $i++) {
            $link = $link . "<li><a href='$base_url&page=$i'>$i</a></li>";
        }
        return $link;
    }

    public function getProductByCart()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE  id IN (".implode(",", array_keys($_SESSION["cart"])).")");
        $sql->execute(); 
        
        $items = array();

        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; 
    }

    public function insertOrder($name, $phone, $address, $note, $total) {
        $sql = self::$connection->prepare("INSERT INTO `order` (`name`, `phone`, `address`, `note`, `total`) VALUES ('$name', '$phone', '$address', '$note', '$total');");
        return $sql->execute(); 
        
    }
}

