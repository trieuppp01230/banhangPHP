
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
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current">
                    <i class="icon-home"></i> Home</a></div>
            <h1>Protypes</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon">
                                <a href="frmProtypes.php"><i class="icon-plus"></i></a></span>
                            <h5>Protypes</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Type_Id</th>
                                        <th>Type_Name</th>
                                        <th>Type_Image</th>
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
									$protype = $db -> getAllProtype();
									foreach ($protype as $value) {
								 ?>
                                        <td style="text-align: center"><?php echo $value['type_ID'] ?></td>
                                        <td style="text-align: center"><?php echo $value['type_name'] ?></td>
                                        <td style="text-align: center"><img
                                                src='template/images/<?php echo $value['type_img'] ?>'
                                                style="width:100px"></td>
                                        <td style="text-align: center">
                                            <a href="frmEditProtypes.php?id=<?php echo $value['type_ID'] ?>"
                                                class="btn btn-success btn-mini">Edit</a>
                                            <form method="post" action="indexadminadmin.php">
                                                <a href="xoaType.php?id=<?php echo $value['type_ID'] ?>"
                                                    class="btn btn-danger btn-mini">Delete</a>
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