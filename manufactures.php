
<?php
session_start();
	include 'headeradmin.php';

	if (!isset($_SESSION['username'])) {
		header('Location:login.php');
	}
?>

	<!-- BEGIN CONTENT -->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>Manufactures</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"><a href="form_manufacture.php"><i class="icon-plus"></i></a></span>
							<h5>Manufactures</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Manu_Id</th>
										<th>Manu_Name</th>
										<th>Manu_image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="">
										<?php
										require "./config/database.php";
										require "./models/Db.php";
										require "./models/admin.php";
										$db = new Admin();
										$manufactures = $db->getAllManufactures();
										foreach ($manufactures as $value) {
											?>
											<td style="text-align: center"><?php echo $value['manu_ID'] ?></td>
											<td  style="text-align: center"><?php echo $value['manu_name'] ?></td>
											<td  style="text-align: center"><img src='template/images/<?php echo $value['manu_img'] ?>' style="width:100px"></td>
											<td  style="text-align: center">
												<a href="frmedit_manu.php?id=<?php echo $value['manu_ID'] ?>" class="btn btn-success btn-mini">Edit</a>
												<form method="post" action="indexadminadmin.php">
													<a href="xoamanu.php?id=<?php echo $value['manu_ID'] ?>" class="btn btn-danger btn-mini">Delete</a>
												</form>
											</td>
									</tr>
								<?php } ?>

								</tbody>
							</table>
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