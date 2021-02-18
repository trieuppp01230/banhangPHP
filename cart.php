<?php
session_start();
ob_start();
    include 'header.php';
    require "models/Db.php";
    require "models/products.php";

    $products = new Products;
    $id = isset($_GET['ID']) ? $_GET['ID'] : '';
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    $error = false;
    $success = false;
    if (isset($_GET['action'])) {

        function update_cart($add = false) {
            foreach($_POST["quantity"] as $id => $quantity){
                if ($quantity == 0) {
                    unset( $_SESSION["cart"][$id]);
                } else {
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
              
            }
        }
      
        switch($_GET['action']) {
            case 'add':
                update_cart(true);
                header("Location: ./cart.php");
            break;

            case 'delete':
                if (isset($_GET["ID"])) {
                    unset( $_SESSION["cart"][$_GET["ID"]]);
                }
                header("Location: ./cart.php");
            break;

            case 'submit':
                if (isset($_POST["update_click"])) {
                    update_cart();
                    header("Location: ./cart.php");
                } else if (isset($_POST['order_click'])) {
                    if (empty($_POST['name'])) {
                        $error = "Bạn chưa nhập tên người nhận";
                    } else if (empty($_POST['phone'])) {
                        $error = "Bạn chưa nhập số điện thoại người nhận";
                    } else if (empty($_POST['address'])) {
                        $error = "Bạn chưa nhập địa chỉ người nhận";
                    } else if (empty($_POST['quantity'])) {
                        $error = "Giỏ hàng rỗng";
                    }

                    if ($error === false && !empty($_POST['quantity'])) {
                        $productByCart = $products->getProductByCart();
                        $total = 0; 
                        foreach($productByCart as $value) { 
                            $total += $value["price"] * $_POST['quantity'][$value['ID']];
                        }
                        
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $note = $_POST['note'];
                        $total = $total;
                        $newCustomer = $products->insertOrder($name, $phone, $address, $note, $total);
                        $success = "Đặt hàng thành công";
                        unset($_SESSION["cart"]);
                    } 
                } else if (isset($_POST['delete_all'])) {
                    unset($_SESSION["cart"]);
                }
            break;
        }
    }

    if (!empty($_SESSION['cart'])) {
        $productByCart = $products->getProductByCart();
    }
?>
<main class="ps-main">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <?php if (!empty($error)) { ?>
            <h3>
                <?php echo $error; ?><a href="javascript:history.back()">. Quay lại!</a>
            </h3>
            <?php } else if (!empty($success)) { ?>
            <h3>
                <?php echo $success; ?><a href="index.php">. Tiếp tục mua hàng</a>
            </h3>
            <?php } else { ?>
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
             foreach($productByCart as $value) { 
                 
                 ?>
                            <tr>
                                <td><a class="ps-product__preview" href="product-detail.php"><img class="mr-15"
                                            style="width: 200px" src="template/images/<?php echo $value["image"] ?>"
                                            alt=""><?php echo $value["Name"] ?></a>
                                </td>
                                <td><?php echo number_format($value["price"] , 0,",",".") ?> VNĐ</td>
                                <td>
                                    <div class="form-group--number">
                                        <input class="form-control" type="text"
                                            value="<?php echo $_SESSION["cart"][$value["ID"]] ?>"
                                            name="quantity[<?php echo $value["ID"] ?>]">
                                       
                                    </div>
                                </td>
                                <td><?php echo number_format($value["price"] *  $_SESSION["cart"][$value["ID"]], 0,",",".")  ?>
                                    VNĐ</td>
                                <td>
                                    <a class="ps-remove" href="cart.php?action=delete&id=<?php echo $value['ID']?>"></a>
                                </td>
                            </tr>
                            <?php
                        $total +=  $value["price"] *  $_SESSION["cart"][$value["ID"]] ; 

         } 
         }?>

                        </tbody>
                    </table>

                    <?php  if (!empty($productByCart)) {?>
                    <input style="color: #000; border-radius: 5px" type="submit" name="update_click" value="Cập nhật">
                    <?php } ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Name" require>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" name="phone" class="form-control" placeholder="phone" require>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="address" class="form-control" placeholder="Address" require>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="note" id="message" class="form-control" rows="3"
                                placeholder="Your Message Here"></textarea>
                        </div>
                    </div>


                    <div class="ps-cart__actions">
                        <div class="ps-cart__promotion">
                            <div class="form-group">
                                <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                    <input class="form-control" type="text" placeholder="Promo Code">
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="ps-btn ps-btn--gray" href="index.php"> Continue Shopping</a>
                            </div>
                        </div>
                        <?php  if (!empty($productByCart)) { ?>
                        <div class="ps-cart__total" style="margin-top: -32px">
                            <h3>Total Price: <span style="margin-left: 10px">
                                    <?php echo number_format($total, 0,",",".") ?> VNĐ</span></h3>
                            <input type="submit" name="order_click" class="ps-btn" style="height: auto!important"
                                value="Đặt hàng">
                        </div>
                        <?php } ?>
                    </div>

                </form>


            </div>
            <?php } ?>



        </div>
    </div>


    <?php
        include 'footer.php';
    ?>