<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
$id = $_GET['id'];
$name = $_POST['manu_name'];
$image = $_FILES['fileUpload']['name'];
$target_dir = "../public/images/";
$target_file = $target_dir . basename($_FILES['fileUpload']['name']);

if (isset($_POST['edit'])) {
	if (isset($_POST['manu_name'])) {
		move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
		
		$edit = $db->editManufactures($name,$image, $id);
		header('location: manufactures.php');
	}
}

 ?>