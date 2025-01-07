<?php
include "header.php";
session_start();
?>
<!-------------------------------Shpping cart-------------->    

<section class = "cart">
    <div class="container">
        <div class = "cart-top-cover">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart "></i>
                </div>
                <div class="cart-top-shipping cart-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class = "cart-concent row">
            <div class="table-left">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                             if (isset($_SESSION['cart'])) {
                                $totalprice = 0;
                                $totalquantity = 0;
                                $tax = 0;
                                
                                foreach($_SESSION['cart'] as $cart_item) {
                                    $finalprice = $cart_item['quantity']*$cart_item['price'];
                                    $totalprice +=$finalprice;
                                    $totalquantity +=$cart_item['quantity'];
                                    $tax = $totalprice*0.1;
                                    $cart_item['cart_id'] = $cart_item['id'].$cart_item['size'];
                        ?>
                    <tr>
                    
                        <td><img src = admin/uploads/<?php echo $cart_item['image'] ?>></td>
                        <td><p><?php echo $cart_item['product_name']  ?></p></td>
                        <td><p><?php echo $cart_item['size']  ?></p></td>
                        <td>
                            <a href = "addproduct.php?plus=<?php echo $cart_item['cart_id']?>"><i class="fa-solid fa-plus"></i></a>
                            <p style = "padding: 0 3px;"><?php echo $cart_item['quantity'] ?></p>
                            <a href = "addproduct.php?minus=<?php echo $cart_item['cart_id']?>"><i class="fa-solid fa-minus"></i></a>
                        </td>
                        <td><p><?php echo $finalprice ?></p></td>
                        <td><span><p><a href = "addproduct.php?delete=<?php echo $cart_item['cart_id']?>">X</a></p></span></td>
                    </tr>
                    
                    <?php
                                }
                             ?>
                    
                </table>
                <td><p style = "float: right; margin-top: 10px;"><a href = "addproduct.php?deleteall=1">Delete All</a></p></td>
            </div>
            <div class="table-right">
                <table>
                <?php
                             
                ?>
                    <tr>
                        <th colspan="2">Summary</th>
                    </tr>
                    <tr>
                        <td>Product Quantity</td>
                        <td><?php echo $totalquantity ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td><p><?php echo $totalprice ?> USD</p></td>
                    </tr>
                    <tr>
                        <td>Estimated Tax</td>
                        <td><p><?php echo $tax  ?> USD</p></td>
                    </tr>
              <?php 
               } else {
       
       ?>

        <tr>
           <td colspan="6"><p>Empty Cart</p></td>
        </tr>
        <?php
                }

       ?>
                    
                </table>
                <div class = "table-right-text">
                    <p style = "color:red">Just a few left. Order soon.</p>
                </div>
                <div class = "table-right-button">
                    <button onclick = "window.location.href ='home.php';">CONTINUE TO SHOPPING</button>
                    <button onclick = "window.location.href ='shipping.php';">CHECK OUT</button>
                </div>
                <div class = "table-right-login">
                    <p>AKATSUKI ACCOUNT
                        <?php
                        if(isset($_SESSION['signup'])) {
                            echo ': '.'<span>'.$_SESSION['signup'].'</span>';
                        }
                         
                        ?>
                    </p>
                    <?php
                         if(!isset($_SESSION['signup'])){

                    ?>
                    <p><a href = "login.php">Login</a> to your account to get point</p>
                    <?php  
                      }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include "footer.php";

?>

