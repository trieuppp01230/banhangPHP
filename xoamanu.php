<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
if (isset($_GET['id'])) {
	if ($db->deletemanufactures($_GET['id'])) {
		echo "Xoa thanh cong";
		 header('location: manufactures.php');
	} else {
        echo "Xoa khong thanh cong !";
       
	}
}
?>