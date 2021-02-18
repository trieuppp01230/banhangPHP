<?php 
    include 'header.php';
    require "config/database.php";
    require "models/Db.php";
    require "models/products.php";

    $products = new Products;
  
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $per_page = 6;
    
    if (isset($_GET['type_ID'])) {
        $type_ID = $_GET['type_ID'];
        if ($type_ID) {
            $getPro = $products->getProductByType($type_ID);

            $base_url = $_SERVER['PHP_SELF'] . "?type_ID=$type_ID";

            $getProduct = $products->getProductByType2($type_ID, $page, $per_page);
            $total_row = count($getPro);
            $phantrang = $products->phantrang1($base_url, $total_row, $page, $per_page);
        } 
    } 
    
    else if (isset($_GET['manu_ID'])) {
        $manu_ID = $_GET['manu_ID'];
        if ($manu_ID) {
            $getPro = $products->getProductByManuFactures($manu_ID);

            $base_url = $_SERVER['PHP_SELF'] . "?manu_ID=$manu_ID";

            $getProduct = $products->getProductByManuFactures2($manu_ID, $page, $per_page);
            $total_row = count($getPro);
            $phantrang = $products->phantrang1($base_url, $total_row, $page, $per_page);
        }
    } 
    else if(isset( $_GET['key'])) {
        $key = $_GET['key'];
        $getPro = $products->search($key);
        
        $base_url = $_SERVER['PHP_SELF'] . "?key=$key";
       

        $getProduct = $products->listProductSearch($key, $page, $per_page);
        $total_row = count($getPro);
        $phantrang = $products->phantrang1($base_url, $total_row, $page, $per_page);
    } 
    
    else {
        $getProducts = $products->getAllProducts();

        $total_row = count($getProducts);
        $base_url = $_SERVER['PHP_SELF'];
        $getProduct = $products->listProduct($page, $per_page);
        $phantrang = $products->phantrang($base_url, $total_row, $page, $per_page);
    }

   

    $getTypes = $products->getType();
    $getManu = $products->getManu();
?>
<main class="ps-main">
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-product__columns">
                <h4 style="text-align:center; margin-bottom: 25px">
                    <?php if(!empty($getProduct) && isset($key)) {
                echo "Kết quả tìm kiếm của ".$key;
            } else {
                if(isset($key)) {
                echo "Không có kết quả tìm kiếm";
                }
            }?>
                </h4>

                <?php foreach($getProduct as $allPro) { ?>

                <div class="ps-product__column">
                    <div class="ps-shoe mb-30">
                        <div class="ps-shoe__thumbnail">

                            <?php if ( $allPro['new'] == 1) { ?>
                            <div class="ps-badge"><span>New</span></div>
                            <?php $num = $allPro['disc']; if ( $num > 0) { ?>
                            <div class="ps-badge ps-badge--sale ps-badge--2nd"><span><?php echo $num ?>%</span></div>
                            <?php } ?>
                            <?php } ?>

                            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                style="height: 450px; object-fit:cover"
                                src="template/images/<?php echo $allPro["image"] ?>" alt=""><a class="ps-shoe__overlay"
                                href="product-detail.php?id=<?php echo $allPro['ID'] ?>">
                            </a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__variants">
                                <div class="ps-shoe__variant normal"><img src="template/images/<?php echo $allPro["image"] ?>" alt=""><img
                                        src="template/images/img-related/<?php echo $allPro["image1"] ?>" alt=""><img src="template/images/img-related/<?php echo $allPro["image2"] ?>" alt=""><img
                                        src="template/images/img-related/<?php echo $allPro["image3"] ?>" alt=""></div>
                                <select class="ps-rating ps-shoe__rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                            </div>
                            <div class="ps-shoe__detail"><div class="ps-shoe__name" style="max-width: 270px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap"
                                            ><?php echo $allPro['Name'] ?></div>
                                        <p class="ps-shoe__categories" style="margin-top: 5px"><a href="#">Men shoes</a>,<a href="#">
                                                Nike</a></p><span class="ps-shoe__price" style="top: 22px!important">
                                                <?php echo number_format($allPro["price"] , 0,",",".") ?> VNĐ</span>
                                    </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>
            <div class="phantrang" style="text-align: center">
                <ul class="pagination">
                    <?php echo $phantrang; ?>
                </ul>
            </div>
        </div>


        <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">

                        <?php foreach($getTypes as $type) { ?>
                        <li class="<?php if (isset($_GET['type_ID'])) { if($type_ID == $type['type_ID'] ) { echo "current";}} ?>"><a
                                href="product-listing.php?type_ID=<?php echo $type['type_ID']; ?>"><?php echo $type["type_name"] ?></a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </aside>
           
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Sky Brand</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">

                        <?php foreach($getManu as $manu) { ?>
                        <li class="<?php if (isset($_GET['manu_ID'])) { if($manu_ID == $manu['manu_ID'] ) { echo "current";}} ?>"><a
                                href="product-listing.php?manu_ID=<?php echo $manu['manu_ID']; ?>"><?php echo $manu["manu_name"] ?></a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </aside>
          
            <aside class="ps-widget--sidebar ps-widget--filter">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <form action="product-listing.php?action=filter" method="POST">
                    <!-- <div class="ps-widget__content">
                        <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50"
                            data-unit="$"></div>
                        <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span
                                class="ac-slider__value ac-slider__max"></span></p>
                              
                            <button class="ac-slider__filter ps-btn">Filter</button>
                    </div> -->
                </form>
             <?php

             ?>
                
            </aside>
         
        </div>
    </div>


    <?php
        include 'footer.php';
    ?>