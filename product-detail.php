    <?php
    include 'header.php';
    require "config/database.php";
    require "models/Db.php";
    require "models/products.php";

    $products = new Products;

    $id = $_GET['id'];
    $getProductById = $products->getProductById($id);

?>

    <main class="ps-main">
        <div class="test">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                    </div>
                </div>
            </div>
        </div>
        <?php foreach($getProductById as $proId) {
            $typeID=$proId['type_ID']; 
            $getProductByType = $products->getProductByType($typeID); ?>
            
        <div class="ps-product--detail pt-60">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-lg-offset-1">
                        <div class="ps-product__thumbnail">
                            <div class="ps-product__preview">
                                <div class="ps-product__variants">
                                    <div class="item"><img src="template/images/<?php echo $proId["image"] ?>" alt="">
                                    </div>
                                    <div class="item"><img
                                            src="template/images/img-related/<?php echo $proId["image1"] ?>" alt="">
                                    </div>
                                    <div class="item"><img
                                            src="template/images/img-related/<?php echo $proId["image2"] ?>" alt="">
                                    </div>
                                    <div class="item"><img
                                            src="template/images/img-related/<?php echo $proId["image3"] ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product__image">
                                <div class="item"><img class="" style="width: 550px!important; max-height: 500px"
                                        src="template/images/<?php echo $proId["image"] ?>" alt=""></div>
                                <div class="item"><img class="" style="width: 550px!important; max-height: 500px"
                                        src="template/images/img-related/<?php echo $proId["image1"] ?>" alt=""></div>
                                <div class="item"><img class="" style="width: 550px!important; max-height: 500px"
                                        src="template/images/img-related/<?php echo $proId["image2"] ?>" alt=""></div>
                                <div class="item"><img class="" style="width: 550px!important; max-height: 500px"
                                        src="template/images/img-related/<?php echo $proId["image3"] ?>" alt=""></div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <div class="ps-product__rating">
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select><a href="#">(Read all 8 reviews)</a>
                            </div>
                            <h1 style="text-align: left"><?php echo $proId["Name"] ?></h1>
                            <p class="ps-product__category"><a href="#"> Men shoes</a>,<a href="#"> Nike</a>,<a
                                    href="#"> Jordan</a></p>
                            <h3 class="ps-product__price"> <?php echo number_format($proId["price"] , 0,",",".") ?> VNĐ</del></h3>
                            <div class="ps-product__block ps-product__quickview">
                                <h4>QUICK REVIEW</h4>
                                <p><?php echo $proId["description"] ?></p>
                            </div>
                          
                            <form action="cart.php?action=add" method="POST">
                                <div class="ps-product__block ps-product__size">
                                    <h4>SỐ LƯỢNG: <div class="form-group">
                                            <input class="form-control" type="text" value="1" name="quantity[<?php echo $proId["ID"] ?>]">
                                        </div>
                                    </h4>

                                </div>
                                <div class="ps-product__shopping">
                                    <button class="ps-btn mb-10">
                                        Add to cart<i class="ps-icon-next"></i>
                                    </button>
                                  
                                    <div class="ps-product__actions"><a class="mr-10" href="whishlist.php"><i
                                        class="ps-icon-heart"></i></a><a href="compare.php"><i
                                        class="ps-icon-share"></i></a>
                                    </div>
                                </div>
                            </form>
                           
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
    $getListProductsFeature = $products->getListProductsFeature();
?>

<div class="ps-section ps-section--top-sales ps-owl-root">
    <div class="ps-container">
        <div class="ps-section__header">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="RELATED">- Related Products</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i
                                class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i
                                class="ps-icon-arrow-left"></i></a></div>
                </div>
            </div>
        </div>
        <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1"
                data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000"
                data-owl-mousedrag="on">

                <?php 
                    foreach($getProductByType as $value) { ?>

                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                            
                                <?php if ( $value['new'] == 1) { ?>
                                    <div class="ps-badge"><span>New</span></div>
                                    <?php $num = $value['disc']; if ( $num > 0) { ?>
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd"><span><?php echo $num ?>%</span></div> 
                                    <?php } ?>
                                <?php } ?>  

                                <a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i></a><img style="height: 450px; object-fit:cover" class="pro-image"
                                            src="template/images/<?php echo $value["image"] ?>" alt=""><a
                                    class="ps-shoe__overlay" href="product-detail.php?id=<?php echo $value['ID'] ?>">
                                </a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img style="height: 55px" src="template/images/<?php echo $value["image"] ?>" alt="">
                                    </div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><div class="ps-shoe__name" style="max-width: 260px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap"
                                            ><?php echo $value['Name'] ?></div>
                                        <p class="ps-shoe__categories" style="margin-top: 5px"><a href="#">Men shoes</a>,<a href="#">
                                                Nike</a></p><span class="ps-shoe__price" style="top: 22px!important">
                                                <?php echo number_format($value["price"] , 0,",",".") ?> VNĐ</span>
                                    </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>


        <?php } ?>

        <?php
        include 'footer.php';
      ?>