<?php
include "header2.php";
include "slider2.php";
include "database.php";

$code = $_GET['code'];
$sql_listorder = "SELECT * FROM tbl_cart_details ,tbl_product WHERE tbl_cart_details.id_product = tbl_product.product_id AND
tbl_cart_details.code_cart = $code ORDER BY tbl_cart_details.id_cart_details DESC";
$db = new Database();
$sql_listing = $db->select($sql_listorder);
?>

        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Order</h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row" >
                    <div class="col-sm-12" >
                        <div class="white-box" style = "background-color: black;">
                            <div class="table-responsive">
                                <table class="table" id="example"  >
                                    <thead >
                                        <tr>
                                        <th>ID</th>
                    <th>Confirmation Number </th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sum</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
                $total = 0;
                $sum = 0;
                if($sql_listing) {$i=0;
                    while($orderresult = $sql_listing->fetch_assoc()) {$i++;
                        $sum=$orderresult['price_sale'] * $orderresult['quantity_buy'];
                        $total += $sum;

                    
                ?>
                 <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $orderresult['code_cart'] ?></td>
                    <td><?php echo $orderresult['product_name'] ?></td>
                    <td><?php echo $orderresult['product_size'] ?></td>
                    <td><?php echo $orderresult['quantity_buy'] ?></td>
                    <td><?php echo $orderresult['price_sale'] ?> USD</td>
                    <td><?php echo $sum  ?> USD</td>
                </tr>
                <?php
                     }  
                }
                ?>
                 
                                        
                                    </tbody>
                                    <td colspan = "7">
                        <p>Total: <?php echo $total ?> USD</p>
                
                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <?php
include "footer2.php";
?>