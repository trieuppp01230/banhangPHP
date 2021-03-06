<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getProtypeByID = $db->getProtypeByID($id);
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
			<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Edit Protypes</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Protype Detail</h5>
						</div>
						<div class="widget-content nopadding">

							<!-- BEGIN USER FORM -->
							<form action="editprotype.php?id= <?php if(isset($_GET['id'])) { echo $id ;} ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label">Protype Name :</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="Protype name" name="type_name" Fname="name" aria-required="true" required="required" value=" <?php if (isset($getProtypeByID['type_name'])) { echo $getProtypeByID['type_name'] ;} ?>" /> *
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Choose an image :</label>
									<div class="controls">
										<input type="file" name="fileUpload" id="fileUpload">
									</div>
								</div>



								<div class="form-actions">
									<button type="submit" class="btn btn-success" name="edit">Update</button>
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