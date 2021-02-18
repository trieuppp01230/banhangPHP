<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
$id = $_GET['id'];
$name = $_POST['name'];
$pass = $_POST['pass'];

if (isset($_POST['edit'])) {
	if (isset($_POST['name'])) {
		
		
		$edit = $db-> editUser( $name, $pass ,$id);
		header('location: user.php');
	}
}

 ?>