<?php 
	require "./config/database.php";
	require "./models/Db.php";
	require "./models/admin.php";
	$db = new Admin();
	if(isset($_GET['id'])){
	if($db->deleteProducts($_GET['id'])){
		echo "Xoa thanh cong";
		header('location: products.php');
	}else{
		echo "Xoa khong thanh cong !";
	}
	}
?>