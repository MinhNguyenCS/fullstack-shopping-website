<?php
include "header.php";
?>

<?php
    if (isset($_POST['shipping'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $note = $_POST['note'];
        $email = $_POST['email'];
        $sql_shipping = "INSERT INTO tbl_shipping(name, phone, address, city, state, zipcode, note, email)
             VALUES('$name','$phone','$address','$city','$state','$zipcode','$note','$email')";
        $sql_shipping_result = $db->insert($sql_shipping);
        $_SESSION['id_shipping'] = $db->insert_id();
        if ($sql_shipping_result) {
            echo '<script>alert("Update Successfully")</script>';
        }
    }
    ?>

<!--------------------------------------payment------------------------------>
<section class="payment">
    <div class="container">
        <div class="payment-top-cover">
            <div class="cart-top">
                <div class="payment-top-cart payment-top-item">
                    <i class="fas fa-shopping-cart "></i>
                </div>
                <div class="payment-top-shipping payment-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="payment-top-payment payment-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="payment-content row" >
            <div class="payment-left">
                <div class="payment-left-method">
                    <p>
                        PAYMENT METHOD

                    </p>
                    
                    <div id = "paypal-button"></div>

                    
                </div>
            </div>


            <div class="shipping-content-right">
                <div class="payment-right-button">
                    <input type="text" placeholder="Promotion Code">
                    <button><i class="fas fa-check"></i>
                    </button>
                </div>
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
                        <input type = "hidden" id = "payprice" value = "<?php echo $payprice ?>">
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