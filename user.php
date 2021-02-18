
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
			<div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
			<h1>USER</h1>
		</div>
		<div class="container-fluid">
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"><a href="frmaddUser.php"><i class="icon-plus"></i></a></span>
							<h5>USER</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>

										<th>UserName</th>
										<th>Password</th>
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
										$user = $db->getAllUser();
										foreach ($user as $value) {
											?>
											<td><?php echo $value['username'] ?></td>
											<td><?php echo $value['password'] ?></td>

											<td>
												<a href="frmeditUser.php?id=<?php echo $value['id'] ?>" class="btn btn-success btn-mini">Edit</a>
												<form method="post" action="indexadmin.php">
													<a href="xoaUser.php?id=<?php echo $value['id'] ?>" class="btn btn-danger btn-mini">Delete</a>
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