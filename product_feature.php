<?php 
    $getListProductsFeature = $products->getListProductsFeature();
?>

<div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="BEST SALE">- Features Products</h3>
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
                    foreach($getListProductsFeature as $value) { ?>

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
                                    <div class="ps-shoe__variant normal"><img src="template/images/<?php echo $value["image"] ?>" alt=""><img
                                        src="template/images/img-related/<?php echo $value["image1"] ?>" alt=""><img src="template/images/img-related/<?php echo $value["image2"] ?>" alt=""><img
                                        src="template/images/img-related/<?php echo $value["image3"] ?>" alt=""></div>
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