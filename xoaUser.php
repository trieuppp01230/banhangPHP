<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
if (isset($_GET['id'])) {
	if ($db->deleteUser($_GET['id'])) {
		echo "Xoa thanh cong";
		header('location: user.php');
	} else {
		echo "Xoa khong thanh cong !";
	}
}
?>