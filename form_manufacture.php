<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location:login.php');
}
	include 'headeradmin.php';
	
?>
<div id="header">
		<h1><a href="dashboard.php">Dashboard</a></h1>
	</div>

	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
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
							<form action="addManu.php" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label">Manufacture Name :</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="Manufacture name" name="manu_name" /> *
									</div>
								</div>


								<div class="control-group">
									<label class="control-label">Choose an image :</label>
									<div class="controls">
										<input type="file" name="fileUpload" id="fileUpload" aria-required="true" required="required">
									</div>
								</div>


								<div class="form-actions">
									<button type="submit" class="btn btn-success" name="add">Add</button>
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
	<!--Footer-part-->
	<?php
	include 'footeradmin.php';
?>
