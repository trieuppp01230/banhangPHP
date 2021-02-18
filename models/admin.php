<?php
class Admin extends Db
{
	public function getAllProduct($page, $per_page)
	{
		$first_link = ($page - 1) * $per_page;
		$sql = self::$connection->prepare("SELECT * FROM products JOIN manufactures on products.manu_ID = manufactures.manu_ID 
		JOIN protypes ON products.type_ID = protypes.type_ID 
		ORDER BY ID DESC LIMIT $first_link,$per_page ");

		$sql->execute(); 
		$items = array();
		$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
		return $items; 
	}

	public function getAllManufactures()
	{
		$sql = self::$connection->prepare("SELECT * FROM manufactures");
		$sql->execute(); 
		$items = array();
		$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
		return $items; 
	}

	// làm lấy tất cả user
	public function getAllUser()
	{
		$sql = self::$connection->prepare("SELECT * FROM user");
		$sql->execute(); 
		$items = array();
		$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
		return $items; 
	}

	// làm lấy tất cả protype
	public function getAllProtype()
	{
		$sql = self::$connection->prepare("SELECT * FROM protypes");
		$sql->execute(); 
		$items = array();
		$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
		return $items;
	}
	// hàm lấy ID của manu
	public function getManuByProtype($id)
	{
		$sql = "SELECT * FROM manufactures WHERE manu_ID = $id";
		$result = self::$connection->query($sql);
		$arr = array();
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	// hàm thêm sản phẩm
	public function addProduct($name,  $image, $des, $manu_id, $price, $type_id, $feature)
	{
		$sql = " INSERT INTO `products`(`ID`, `Name`, `image`, `description`, `manu_ID`, `price`, `type_ID`, `feature`)
		VALUES (NULL, '$name','$image','$des','$manu_id','$price','$type_id', '$feature')";
		return self::$connection->query($sql);
	}

	public function addManu($name, $image)
	{
		$sql = "INSERT INTO `manufactures`(`manu_ID`, `manu_name`, `manu_img`) VALUES (NULL,'$name','$image')";

		return self::$connection->query($sql);
	}

	public function addProtypes($name, $image)
	{
		$sql = "INSERT INTO `protypes`(`type_ID`, `type_name`, `type_img`) VALUES (NULL,'$name','$image')";

		return self::$connection->query($sql);
	}

	public function addUser($name, $pass)
	{
		$sql = "INSERT INTO `user`(`id`, `username`, `password`) VALUES (NULL,'$name','$pass')";

		return self::$connection->query($sql);
	}

	// hàm phân trang
	public function create_links($base_url, $total_rows, $page, $per_page)
	{
		$total_links = ceil($total_rows / $per_page);
		$link = "";
		for ($j = 1; $j <= $total_links; $j++) {
			if ($j == $page) {
				$link = $link . "<li style='list-style: none; padding: 4px 8px; border: 1px solid; margin: 0px 2px'><a href='" . $base_url . "page=$j'> $j </a></li>";
			} else {
				$link = $link . "<li style='list-style: none; padding: 4px 8px; border: 1px solid; background: #80808061;  margin: 0px 2px'><a href='" . $base_url . "page=$j'> $j </a></li>";
			}
		}
		return $link;
	}
	// hàm đếm
	public function count($tab)
	{
		$sql = "SELECT * FROM $tab";
		$result = self::$connection->query($sql);
		return $result->num_rows;
	}

	// hàm sửa sản phẩm
	public function editProduct($feature, $name, $price, $image, $desc, $manu_id, $type_id, $id)
	{
		if ($image == "") {
			$sql = "UPDATE products SET feature = '$feature', name = '$name', price = '$price', description = '$desc', manu_ID = '$manu_id', type_ID='$type_id' WHERE ID = $id";
		} else {
			$sql = "UPDATE products SET feature = '$feature', name = '$name', price = '$price', image = '$image', description = '$desc', manu_ID = '$manu_id', type_ID = '$type_id' WHERE ID = $id";
		}
		$result = self::$connection->query($sql);
		return $result;
	}

	public function editProtype($name, $image, $id)
	{
		if ($image == "") {
			$sql = "UPDATE `protypes` SET `type_name`='$name' WHERE  type_ID = $id";
		} else {
			$sql = "UPDATE `protypes` SET `type_name`='$name' ,`type_img`='$image' WHERE  type_ID = $id";
		}

		$result = self::$connection->query($sql);
		return $result;
	}

	public function editManufactures($name, $image, $id)
	{
		if ($image == "") {
			$sql = "UPDATE manufactures SET manu_name = '$name' WHERE manu_ID = $id";
		} else {
			$sql = "UPDATE manufactures SET manu_name = '$name', manu_img = '$image' WHERE manu_ID = $id";
		}
		$result = self::$connection->query($sql);
		return $result;
	}

	public function editUser($name, $pass, $id)
	{

		$sql = "UPDATE `user` SET `username`='$name',`password`='$pass' WHERE id = $id";

		$result = self::$connection->query($sql);
		return $result;
	}


	//hàm lấy id product
	public function getProductByID($id)
	{
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = self::$connection->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	public function getProtypeByID($id)
	{
		$sql = "SELECT * FROM protypes WHERE type_ID = $id";
		$result = self::$connection->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	public function getManuById($id)
	{
		$sql = "SELECT * FROM manufactures WHERE manu_ID = $id";
		$result = self::$connection->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}
	public function getUserById($id)
	{
		$sql = "SELECT * FROM User WHERE id = $id";
		$result = self::$connection->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}


	//xoa
	public function deleteProducts($id)
	{
		$sql = 'DELETE FROM products WHERE ID="' . $id . '"';
		return self::$connection->query($sql);
	}
	public function deleteUser($id)
	{
		$sql = 'DELETE FROM user WHERE id="' . $id . '"';
		return self::$connection->query($sql);
	}
	public function deletemanufactures($id)
	{
		$sql = 'DELETE FROM `manufactures` WHERE `manu_ID`="' . $id . '"';
		return self::$connection->query($sql);
	}
	public function deleteProtypes($id)
	{
		$sql = 'DELETE FROM protypes WHERE type_ID="' . $id . '"';
		return self::$connection->query($sql);
	}




	public function countSearch($key)
	{
		$sql = "SELECT * FROM products WHERE name LIKE '%" . $key . "%'";
		$result = self::$connection->query($sql);
		return $result->num_rows;
	}

	public function search($key, $page, $per_page)
	{
		$first_link = ($page - 1) * $per_page;
		$sql = "SELECT * FROM products JOIN manufactures on products.manu_ID = manufactures.manu_ID JOIN protypes ON products.type_ID = protypes.type_ID AND  name LIKE '%" . $key . "%' LIMIT $first_link,$per_page";
		//$sql="SELECT * FROM products, protype, manufactures WHERE products.manu_id = manufactures.manu_id AND manufactures.type_id = protype.type_id AND name LIKE '%".$key."%' LIMIT $first_link,$per_page";
		$result = self::$connection->query($sql);
		$arr = array();
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function login($username, $password) {
		$sql = "select * from user where Username = '$username' and Password = '$password'";
		$result = self::$connection->query($sql);
		$arr = array();
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
}
?>
