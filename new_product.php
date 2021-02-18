<?php
    $getListProductsNew = $products->getListProductsNew();
?>

<div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="newest">- top newest products</h3>
            
        </div>
        <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30"
                data-radio="100%">
                <div class="ps-masonry">
                    <div class="grid-sizer"></div>

                    <?php foreach($getListProductsNew as $value) { ?>

                    <div class="grid-item">
                        <div class="grid-item__content-wrapper">
                            <div class="ps-shoe mb-30">
                                <div class="ps-shoe__thumbnail">

                                    <?php if ( $value['new'] == 1) { ?>
                                    <div class="ps-badge"><span>New</span></div>
                                    <?php $num = $value['disc']; if ( $num > 0) { ?>
                                    <div class="ps-badge ps-badge--sale ps-badge--2nd"><span><?php echo $num ?>%</span>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>

                                    <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img
                                        style="height: 450px; object-fit:cover" class="pro-image"
                                        src="template/images/<?php echo $value['image'] ?>" alt=""><a
                                        class="ps-shoe__overlay" href="product-detail.php?id=<?php echo $value['ID'] ?>"></a>
                                </div>
                                <div class="ps-shoe__content">
                                    <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="template/images/<?php echo $value["image"] ?>" alt=""><img
                                        src="template/images/img-related/<?php echo $value["image1"] ?>" alt=""><img src="template/images/img-related/<?php echo $value["image2"] ?>" alt=""><img
                                        src="template/images/img-related/<?php echo $value["image3"] ?>" alt=""></div>
                                        <select class="ps-rating ps-shoe__rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
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
                    </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>