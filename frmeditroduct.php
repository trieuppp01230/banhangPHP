<?php
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
$db = new Admin();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getProbyID = $db->getProductByID($id);
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
        <div id="breadcrumb"> <a href="indexadmin.php" title="Go to Home" class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h1>Edit Product</h1>
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
                        <form action="editproduct.php?id=<?php if (isset($_GET['id'])) { echo $id ;}?>" method="post" class="form-horizontal"
                            enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product name" name="name"
                                        aria-required="true" required="required"
                                        value=" <?php if(isset($_GET['Name'])) { echo $getProbyID['Name'] ;} ?>" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Choose a product type :</label>
                                <div class="controls">

                                    <select name="type_id" id="type_id">
                                        <?php
											// chú í cái id
												$getProtypebyTypeID = $db->getProtypeByID($id);

											?>
                                        <option> Protypes:  <?php 
                                            if($getProbyID['type_ID'] == 1) {
                                                echo 'Giày cao gót';
                                            } else if ($getProbyID['type_ID'] == 2) {
                                                echo 'Giaỳ thể thao';
                                            } else if ($getProbyID['type_ID'] == 3) {
                                                echo 'Giaỳ trẻ em';
                                            } else if ($getProbyID['type_ID'] == 4) {
                                                echo 'Giaỳ lười';
                                            } else if ($getProbyID['type_ID'] == 5) {
                                                echo 'Giaỳ boot';
                                            } 
                                        
                                        ?>
                                        <?php
												$getProtype = $db->getAllProtype();
												//var_dump($getProtype);

												foreach ($getProtype as $row) {
													?> <option value="<?php echo $row['type_ID'] ?>">
                                        <?php echo $row['type_name'] ?></option>
                                        <?php } ?>

                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Choose a manufacture :</label>
                                <div class="controls">
								<select name="manu_id" id="manu_id">
                                        <?php
											// chú í cái id
												$getManuById = $db->getManuById($id);

											?>
                                        <option value="<?php echo $getManuById['manu_ID'] ?>">Manufactures:  <?php 
                                            if($getProbyID['manu_ID'] == 1) {
                                                echo 'Nike';
                                            } else if ($getProbyID['manu_ID'] == 2) {
                                                echo 'Adidas';
                                            } else if ($getProbyID['manu_ID'] == 3) {
                                                echo "Biti's Hunte";
                                            } else if ($getProbyID['manu_ID'] == 4) {
                                                echo 'New Balance';
                                            } else if ($getProbyID['manu_ID'] == 5) {
                                                echo 'FILA';
                                            } 
                                        
                                        ?> <?php
												$getAllManufactures = $db->getAllManufactures();
												//var_dump($getProtype);

												foreach ($getAllManufactures as $row) {
													?> <option value="<?php echo $row['manu_ID'] ?>">
                                        <?php echo $row['manu_name'] ?></option>
                                        <?php } ?>

                                    </select> *

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose an image :</label>
                                    <div class="controls">
                                        <input type="file" name="fileUpload" id="fileUpload">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea class="span11" placeholder="Description" name="description"
                                            aria-required="true" required="required">
											<?php echo $getProbyID['description']  ?></textarea>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Price :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" placeholder="price" name="price"
                                                aria-required="true" required="required" value="
											 <?php echo $getProbyID['price']  ?>" /> *
                                        </div>

                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Fearure :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" placeholder="fearure" name="feature"
                                                aria-required="true" required="required" value="
											 <?php echo $getProbyID['feature']  ?>" /> *
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