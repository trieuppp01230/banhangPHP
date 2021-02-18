<?php
  require "config/database.php";
  require "models/Db.php";
  require "models/products.php";
  require "models/admin.php";
$db = new Admin();

$name = $_POST['type_name'];
$image = $_FILES['fileUpload']['name'];
$target_dir = "../public/images/";
$target_file = $target_dir . basename($_FILES['fileUpload']['name']);

if (isset($_POST['add'])) {
	if (isset($_POST['type_name'])) {
		move_uploaded_file($_FILES["file_tmp"]["tmp_name"], $target_file);
		$db->addProtypes($name, $image );
		header('location: protypes.php');
	}
}
