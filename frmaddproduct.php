
<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
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
		<div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
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
						<form action="addproduct.php" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">Name :</label>
								<div class="controls">
									<input type="text" class="span11" placeholder="Product name" name="name" aria-required="true" required="required"/> *
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Choose a product type :</label>
								<div class="controls">
									<select name="type_id" id="type_id">
										<?php
											$getProtype = $db->getAllProtype();
											var_dump($getProtype);
											foreach ($getProtype as $row) {
										?>
										<option value="<?php echo $row['type_ID'] ?>"> <?php echo $row['type_name'] ?></option>
										<?php } ?>
										
									</select> *
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Choose a manufacture :</label>
								<div class="controls">
									<select name="manu_id" id="manu_id">
									<?php
											$getManufactures = $db->getAllManufactures();
											var_dump($getManufactures);
											foreach ($getManufactures as $row) {
										?>
										<option value="<?php echo $row['manu_ID'] ?>"> <?php echo $row['manu_name'] ?></option>
										<?php } ?>
												
									</select> *

								</div>
								<div class="control-group">
									<label class="control-label">Choose an image :</label>
									<div class="controls">
										<input type="file" name="fileUpload" id="fileUpload" aria-required="true" required="required">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"  >Description</label>
									<div class="controls">
										<textarea class="span11" placeholder="Description" name = "description" aria-required="true" required="required"></textarea>
									</div>
									<div class="control-group">
										<label class="control-label">Price :</label>
										<div class="controls">
											<input type="text" class="span11" placeholder="price" name = "price" aria-required="true" required="required" /> *
										</div>

									</div>

									<div class="control-group">
										<label class="control-label">Feature :</label>
										<div class="controls">
											<input type="text" class="span11" placeholder="feature" name = "feature" aria-required="true" required="required" /> *
										</div>
										<!-- <div class="controls">
											<select name="feature" id="feature">
												<option selected="selected" value="1">Feature</option>
												<option value="0">Not feature</option>	
											</select> *
										</div> -->
									</div>

									<div class="form-actions">
										<button type="submit" name="add" class="btn btn-success">Add</button>
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
