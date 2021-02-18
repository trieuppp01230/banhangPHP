<?php
session_start();
require "./config/database.php";
require "./models/Db.php";
require "./models/admin.php";
require "models/products.php";
if (!isset($_SESSION['username'])) {
	header('Location:login.php');
}
$db = new Admin();
$products = new Products;

if(isset( $_GET['key'])) {
    $key = $_GET['key'];
    $getPro = $products->search($key);
    
    $base_url = $_SERVER['PHP_SELF'] . "?key=$key";
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $per_page = 6;

    $allproduct = $products->listProductSearch($key, $page, $per_page);
    $total_row = count($getPro);
    $phantrang = $products->phantrang1($base_url, $total_row, $page, $per_page);
} else {
    $total_rows = $db->count('products');
    $per_page = 5;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $allproduct = $db->getAllProduct($page, $per_page);

   
}
?>
<?php
	include 'headeradmin.php';
?>

<style>
.pagination li {
    list-style: none;
    border: 1px solid #000;
    padding: 5px 10px;
    text-align: right;
}
</style>


<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h1>Manage Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="frmaddproduct.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Protypes</th>
                                    <th>Manufactures</th>
                                    <th>Description</th>
                                    <th>Feature</th>
                                    <th>Price (VND)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
									
									foreach ($allproduct as $row) {

										?>
                                <tr class="">
                                    <td style="width: 150px; height: 150px"><img
                                            src="template/images/<?php echo $row['image'] ?>"></td>
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['type_name'] ?></td>
                                    <td><?php echo $row['manu_name'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['feature'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td>
                                        <a href="frmeditroduct.php?id=<?php echo $row['ID'] ?>"
                                            class="btn btn-success btn-mini">Edit</a>
                                        <form method="post" action="indexadmin.php">
                                            <a href="xoa.php?id=<?php echo $row['ID'] ?>"
                                                class="btn btn-danger btn-mini">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php
                            if(isset( $_GET['key']))  {?>
                                <div class="phantrang" style="text-align: center">
                                    <ul class="pagination">
                                        <?php echo $phantrang; ?>
                                    </ul>
                                </div>
                            <?php } else {?> 
                                <div class="phantrang">
                                    <ul class="pagination" style="float: right">
                                        <?php $base_url = $_SERVER['PHP_SELF'] . "?";
                                        echo $db->create_links($base_url, $total_rows, $page, $per_page); ?>
                                    </ul>
                                </div>
                            <?php } ?>
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