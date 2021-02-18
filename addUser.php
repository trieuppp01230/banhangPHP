<?php
  require "config/database.php";
  require "models/Db.php";
  require "models/admin.php";
$db = new Admin();

$name = $_POST['name'];
$pass = $_POST['pass'];


if (isset($_POST['add'])) {

		$db->addUser($name, $pass );
		header('location: user.php');
	
}
