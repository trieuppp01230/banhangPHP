<?php

require "./config/database.php";
require "./models/Db.php";
require "./models/products.php";


$products = new Products;
$key1 = $_GET['key'];
$product1 = $products->search($key1);
$getType = $products->getType();
$getAllProducts = $products->getAllProducts();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$per_page = 3;

$base_url = $_SERVER['PHP_SELF'] . "?key=$key1";

$listproduct2 = $products->search1($key1, $page, $per_page);
$total_row = count($listproduct2);
$phantrang = $products->phantrang($base_url, $total_row, $page, $per_page);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Detail</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .img-css {
            width: 300px;
            height: 300px;
        }
    </style>
</head>

<body>
    <header>
        <!--cart-->
        <div class="container">
            <div class="cart">
                <div class="row">

                    <div class="col-md-8">
                        <a href="">Login/Logout</a>
                    </div>
                    <div class="col-md-4">

                        <p>$0.00 (0 items)<i class="fas fa-shopping-cart"></i></p>
                    </div>

                </div>
            </div>
        </div>
        <!--end cart-->
        <!--navbar-->
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light bg-pink">
                <div class="logo"><img class="img-fluid" src="public/images/logo.png" alt=""></div>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                        <li class="nav-item active">
                            <a id="home" class="nav-link" href="index1.php">Home
                                <span class="sr-only">(current)</span></a>
                        </li>



                    </ul>

                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <?php foreach ($getType as $values) { ?>
                            <li class="nav-item active">
                                <a id="" class="nav-link" href="result1.php?type_ID=<?php echo $values['type_ID'] ?>">
                                    <?php echo $values['type_name'] ?><span class="sr-only">(current)</span></a>
                            </li>


                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!--end navbar-->
        <!--banner-->
        <div class="banner">
            <h1>Free Online Shopping</h1>

        </div>
        <!--end banner-->
    </header>

    <!--end header-->
    <!--content-->
    <div class="content">
        <h1>Kết Quả Cho Từ Khóa " <?php echo $key1 ?> "</h1>
        <div class="container">
            <div class="row">
                <?php foreach ($listproduct2 as $key => $values) { ?>
                    <div class="col-md-3">
                        <div class="item">
                            <div class="product"><img class="img-fluid" src="public/images/<?php echo $values['image']; ?>" alt=""></div>
                            <p><strong><?php echo $values['Name'] ?></strong> <span class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span><br></span>
                            </p>
                            <div class="row cost">
                                <div class="col-md-4">
                                    <p><strong><?php echo $values['price']; ?></strong></p>
                                </div>
                                <div class="col-md-8">
                                    <a href="detail.php?id=<?php echo $values['ID'] ?>">Xem</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>