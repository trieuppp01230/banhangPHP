<?php
//Khai báo sử dụng session
// session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
// header('Content-Type: text/html; charset=UTF-8');
//Kết nối tới database
session_start();
//Xử lý đăng nhập
if (isset($_POST['login']))
{
	require "./config/database.php";
	// include('config.php');gì mà 2 cái kết nối ??
		 $conn = mysqli_connect('localhost', 'root', '', 'mydb_nhom9') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");
	//Lấy dữ liệu nhập vào
		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		
	//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
		if (!$username || !$password) {
			echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}

	// mã hóa pasword
		$password = md5($password);

	//Kiểm tra tên đăng nhập có tồn tại không
		$query = mysqli_query($conn, "SELECT username, password FROM user WHERE username='$username'");

		if (mysqli_num_rows($query) == 0) {
			echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}

	//Lấy mật khẩu trong database ra
		$row = mysqli_fetch_array($query);

	//So sánh 2 mật khẩu có trùng khớp hay không
		if ($password != $row['password']) {
			echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}

	//Lưu tên đăng nhập
		
		// if (mysqli_num_rows($sql) == 0) {
		// 	echo "Bạn không phải là Admin. <a href='javascript: history.go(-1)'>Trở lại</a>";
		// 	exit;
		// }else{
		// 	$_SESSION['username'] = $username;

		// 	echo "Xin chào <b>" . $username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>" ;
		// 	die();
		// }
		
		$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
		while($row1=mysqli_fetch_row($result)){
			// printf  ("username: %s, password: %s, level: %s<br>",$row1[1],$row1[2],$row1[5]);
				echo "Xin chào <b>" . $username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>" ;
				// die();
				$_SESSION['username'] = $username;
				header("Location:dashboard.php");
		}
		
}
?>