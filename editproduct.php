<?php
	require "./config/database.php";
	require "./models/Db.php";
	require "./models/admin.php";
	$db = new Admin();
	$id = $_GET['id'];
	if (isset($_POST['edit']))
	{
		if (isset($_FILES['fileUpload']))
		{
			$image = $_FILES['fileUpload']['name'];
			$file_tmp = $_FILES['fileUpload']['tmp_name'];
		}
		else
		{
			$image = "";
		}
		$name = $_POST['name'];
		// chú ý
		$type_id = $_POST['type_id'];
		$manu_id = $_POST['manu_id'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$feature = $_POST['feature'];
		$edit = $db->editProduct($feature, $name, $price, $image, $description, $manu_id,$type_id, $id);

		if (isset($edit))
		{
			move_uploaded_file($file_tmp,"tempate/images/".$image);
			header('location:products.php');
		}
	}
?>