<?php
  require "config/database.php";
  require "models/Db.php";
  require "models/products.php";
  require "models/admin.php";
$db = new Admin();

$name = $_POST['name'];
$price = $_POST['price'];
$des = $_POST['description'];
$feature = $_POST['feature'];
$image = $_FILES['fileUpload']['name'];
$target_dir = "../template/images/";
$target_file = $target_dir . basename($_FILES['fileUpload']['name']);

if (isset($_POST['add'])) {
	var_dump($_POST['add']);
	if (isset($_POST['name'])) {
		move_uploaded_file($_FILES["file_tmp"]["tmp_name"], $target_file);
		$db->addProduct($name, $image, $des, $_POST['manu_id'], $price, $_POST['type_id'], $_POST['feature']);
		header('location: products.php');
	}
}
