<?php

header('Content-Type: text/html; charset=utf-8');
// // Kết nối cơ sở dữ liệu
 $conn = mysqli_connect('localhost', 'root', '', 'mydb_nhom9') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");
// include('config.php');
include "./config/database.php";
// Dùng isset để kiểm tra Form
if (isset($_POST['dangky']))
{

	$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
	$password = isset($_POST['password']) ? md5($_POST['password']) : '';
	$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
	$phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
	// $level = isset($_POST['lever']) ? (int)$_POST['lever'] : '';
	
// Kiểm tra username hoặc email có bị trùng hay không
	$sql = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
	$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
	if (mysqli_num_rows($result) > 0)
	{

// Sử dụng javascript để thông báo
		echo '<script language="javascript">alert("Bị trùng tên, email hoặc chưa nhập tên!"); window.location="register.php";</script>';

// Dừng chương trình
		die ();
	}
	else {
		$sql = "INSERT INTO user (username, password, email, phone) VALUES ('$username','$password','$email','$phone')";

		if (mysqli_query($conn, $sql)){
			// echo "Tên đăng nhập: ".$_POST['username']."<br/>";
			// echo "Mật khẩu: " .$_POST['password']."<br/>";
			// echo "Email đăng nhập: ".$_POST['email']."<br/>";
			// echo "Số điện thoại: ".$_POST['phone']."<br/>";
			// echo "Cấp: ".$_POST['lever']."<br/>";
			echo 'Đăng ký thành công!';
		}
		else {
			echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';	
		}
	}
}
?>