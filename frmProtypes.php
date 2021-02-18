
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
			<h1>Add New Protype</h1>
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
							<form action="addprotype.php" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label">Protype Name :</label>
									<div class="controls">
										<input type="text" class="span11" placeholder="Protype name" name="type_name" /> *
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
	<?php
	include 'footeradmin.php';
?>