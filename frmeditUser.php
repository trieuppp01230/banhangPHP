<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$getUserById = $db->getUserById($id);
}

?>

<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location:login.php');
}
	include 'headeradmin.php';
?>

	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="indexadmin.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Add New Product</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Product Detail</h5>
						</div>
						<div class="widget-content nopadding">

							<!-- BEGIN USER FORM -->
							<form action="editUser.php?id=<?php if (isset($_GET['id'])) { echo $id ;} ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label">Name :</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="User name" name="name" value=" <?php if(isset( $getUserById['username'])) { echo $getUserById['username']; } ?>" aria-required="true" required="required" /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Pass</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="Pass" name="pass" value=" <?php if(isset($getUserById['password'])) { echo $getUserById['password'];} ?>" aria-required="true" required="required" /> *
									</div>
								</div>

								<div class="form-actions">
									<button type="submit" name="edit" class="btn btn-success">Update</button>
								</div>
						</div>

						</form>
						<!-- END USER FORM -->


					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- END CONTENT -->

	<?php
	include 'footeradmin.php';
?>