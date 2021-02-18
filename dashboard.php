<?php
session_start();
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();

if (!isset($_SESSION['username'])) {
	header('Location:login.php');
}
?>
<?php
	include 'headeradmin.php';
?>

	<!-- BEGIN CONTENT -->
	<!-- <div id="content" style="text-align: center">
		<h1>Xin chào cô!</h1>
		<h3>^^ Cô nhớ cho nhóm em cao điểm tý nha cô ơi ^^</h3>
	</div> -->
	<!-- END CONTENT -->
	<?php
	include 'footeradmin.php';
?>