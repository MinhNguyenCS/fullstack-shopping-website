<?php
include("header.php");
?>
<div class="container">
        <div class = "shipping-top-cover">
            <div class="cart-top">
                <div class="shipping-top-cart shipping-top-item">
                    <i class="fas fa-shopping-cart "></i>
                </div>
                <div class="shipping-top-shipping shipping-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="shipping-top-payment shipping-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                
            </div>
        </div>
    </div>
<!-----------shipping----------------------->
<section class="shipping">
    <div class="container">
        <div class="shipping-top-cover">
            <div class="cart-top">
                <div class="shipping-top-cart shipping-top-item">
                    <i class="fas fa-shopping-cart "></i>
                </div>
                <div class="shipping-top-shipping shipping-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="shipping-top-payment shipping-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>

            </div>
        </div>
    </div>

    


    <div class="container">
        <?php
        if (isset($_SESSION['signup'])) {
            $id_signup = $_SESSION['id_customer'];
            $sql_get_shipping = $db->select("SELECT * FROM tbl_signup WHERE id_signup = '$id_signup' LIMIT 1");
            $result = $sql_get_shipping->fetch_assoc();
            $name = $result['customer_name'];
            $phone = $result['phonenumber'];
            $address = $result['address'];
            $city = $result['city'];
            $state = $result['state'];
            $zipcode = $result['zipcode'];
            $note = '';
            $email = $result['email'];

        } else {
            $name = '';
            $phone = '';
            $address = '';
            $city = '';
            $state = '';
            $zipcode = '';
            $note = '';
            $email = '';
        }


        ?>
        <div class="shipping-content row">
            <form class="shipping-content-left" action="checkout.php" autocomplete="off" method="POST">
                <p>Shipping Address</p>
                <?php
                if (!isset($_SESSION['signup'])) {
                    ?>
                <div class="shipping-content-left-login row">

                    <p> <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a> (If you already have an
                        Akatsuki account.)</p>

                </div>

                <div class="shipping-content-left-guest row">
                    <p><span style="font-weight: bold;">Guest</span> (If you do not want to save information.) <input
                            checked name="guest" type="radio"></p>
                </div>
                <div class="shipping-content-left-guest row">
                    <p><span style="font-weight: bold;">Sign Up</span> (Sign up an Akatsuki account from your
                        information below.) <input name="signup" type="radio"></p>
                </div>

                <?php
                }
                ?>

                <div class="shipping-left-input row">
                    <div class="shipping-left-input-item">
                        <label for="">Name<span style="color:red">*</span></label>
                        <input type="text" name="name" placeholder="..." value="<?php echo $name ?>">
                    </div>
                    <div class="shipping-left-input-item">
                        <label for="">Phone Number<span style="color:red">*</span></label>
                        <input type="text" name="phone" placeholder="..." value="<?php echo $phone ?>">
                    </div>
                </div>
                <div class="shipping-left-middle row">
                    <div class="shipping-left-input-middle">
                        <label for="">City<span style="color:red">*</span></label>
                        <input type="text" name="city" placeholder="..." value="<?php echo $city ?>">
                    </div>
                    <div class="shipping-left-input-middle">
                        <label for="">State<span style="color:red">*</span></label>
                        <input type="text" name="state" placeholder="..." value="<?php echo $state ?>">
                    </div>
                    <div class="shipping-left-input-middle">
                        <label for="">ZIP code<span style="color:red">*</span></label>
                        <input type="text" name="zipcode" placeholder="..." value="<?php echo $zipcode ?>">
                    </div>
                </div>

                <div class="shipping-left-input row">
                    <div class="shipping-left-input-item">
                        <label for="">Address<span style="color:red">*</span></label>
                        <input type="text" name="address" placeholder="..." value="<?php echo $address ?>">
                    </div>
                    <div class="shipping-left-input-item">
                        <label for="">Email<span style="color:red">*</span></label>
                        <input type="text" name="email" placeholder="..." value="<?php echo $email ?>">
                    </div>
                </div>

                <div class="shipping-left-bottom">
                    <div class="shipping-left-input-item">
                        <label for="">Note (Optional)</label>
                        <input type="text" name="note" placeholder="..." value="<?php echo $note ?>">
                    </div>
                </div>
                <div class="shipping-left-button row">
                    <a href="shoppingcart.php"><span>&#8592;</span>
                        <p>Return to cart</p>
                    </a>
                    <button type="submit" name="shipping">
                        <p style="font-weight: bold;">CONTINUE TO CHECK OUT</p>
                    </button>
                </div>
            </form>
            <div class="shipping-content-right">
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    if (isset($_SESSION['cart'])) {
                        $totalprice = 0;
                        $payprice = 0;
                        $tax = 0;

                        foreach ($_SESSION['cart'] as $cart_item) {
                            $finalprice = $cart_item['quantity'] * $cart_item['price'];
                            $totalprice += $finalprice;
                            $tax = $totalprice * 0.1;
                            $cart_item['cart_id'] = $cart_item['id'] . $cart_item['size'];
                            ?>

                    <tr>
                        <td>
                            <?php echo $cart_item['product_name'] ?>
                        </td>
                        <td>
                            <?php echo $cart_item['size'] ?>
                        </td>
                        <td>
                            <?php echo $cart_item['quantity'] ?>
                        </td>
                        <td>
                            <?php echo $finalprice ?> USD
                        </td>
                    </tr>
                    <?php
                        }
                        $payprice = $totalprice + $tax;
                        ?>

                    <tr>
                        <td style="font-weight: bold;" colspan="3">Subtotal</td>
                        <td style="font-weight: bold;">
                            <?php echo $totalprice ?> USD
                        </td>

                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tax</td>
                        <td style="font-weight: bold;">
                            <?php echo $tax ?> USD
                        </td>

                    </tr>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Total</td>
                        <td style="font-weight: bold;">
                            <?php echo $payprice ?> USD
                        </td>

                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";

?>