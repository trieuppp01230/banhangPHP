<?php
session_start();
  include 'header.php';
  require "models/Db.php";
  require "models/products.php";
  $products = new Products;
  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
if (isset($_GET['action'])) {
    function update_cart($add = false) {
        foreach ($_POST['quantity'] as $id => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION["cart"][$id]);
            } else {
                if ($add) {
                    $_SESSION["cart"][$id] += $quantity;
                } else {
                    $_SESSION["cart"][$id] = $quantity;
                }
            }
        }
    }

    switch ($_GET['action']) {
        case "add":
            update_cart(true);
            header('Location: ./cart.php');
        break;

        case "delete":
            if (isset($_GET["id"])){
                unset($_SESSION["cart"][$_GET['id']]);
            }
            header('Location: ./cart.php');
        break;

        case "submit":
            if (isset($_POST['update_click'])) {
                update_cart();
            } else if (isset($_POST['order_click'])) {
                if (!empty($_POST["quantity"])) {
                    $productByCart = $product->getProductByCart();
                    $total = 0; 
                    foreach($productByCart as $value) { 
                        $total += $value["price"] * $_POST['quantity'][$value['id']];
                    }
                } else {
                    echo "Giỏ hàng rỗng";
                }
            } else if (isset($_POST['delete_all'])) {
                unset($_SESSION["cart"]);
            }
        break;
    }
}

if (!empty($_SESSION["cart"])) {
    $productByCart = $products->getProductByCart();
}
?>
<main class="ps-main">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <form action="cart.php?action=submit" method="POST">

                    <table class="table ps-cart__table">
                        <thead>
                            <tr>
                                <th>All Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            if (!empty($productByCart)) {
                            $total = 0;
                            foreach($productByCart as $value) { ?>
                            <tr>
                                <td><a class="ps-product__preview" href="product-detail.php"><img class="mr-15" style="width: 200px"
                                            src="template/images/<?php echo $value["image"] ?>" alt="">
                                        <?php echo $value["Name"] ?></a>
                                </td>
                                <td><?php echo number_format($value["price"], 0,",",".") ?> VNĐ</td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                        <input class="form-control" type="text" value="<?php echo $_SESSION["cart"][$value["ID"]] ?>" name="quantity[<?php echo $value["ID"] ?>]">
                                        <button class="plus"><span>+</span></button>
                                    </div>
                                </td>
                                <td><?php echo number_format($value["price"] *  $_SESSION["cart"][$value["ID"]], 0,",",".")  ?> VNĐ</td>
                                <td>
                                    <a class="ps-remove"  href="cart.php?action=delete&id=<?php echo $value['ID']?>"></a>
                                </td>
                            </tr>
                            <?php
                              $total +=  $value["price"] *  $_SESSION["cart"][$value["ID"]] ; 
                         } } ?>

                        </tbody>
                    </table>
                    <?php if (!empty($productByCart)) {?>
                    <input style="color: #000; border-radius: 5px" type="submit" name="update_click" value="Cập nhật">
                    <?php } ?>
                </form>

                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                <input class="form-control" type="text" placeholder="Promo Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="ps-btn ps-btn--gray" href="index.php">Continue Shopping</a>
                        </div>
                    </div>
                    <?php if (!empty($productByCart)) {?>
                    <div class="ps-cart__total" style="padding: 0 15px">
                        <h3 style="margin-top: 3px">Total Price: <span> <?php echo number_format($total, 0,",",".") ?> VNĐ</span></h3><a class="ps-btn" href="checkout.php">Process to
                            checkout<i class="ps-icon-next"></i></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <?php
        include 'footer.php';
    ?>