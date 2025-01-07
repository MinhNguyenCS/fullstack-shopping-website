<?php
include "header2.php";
include "slider2.php";
include "database.php";

$sql_listorder = "SELECT * FROM tbl_cart,tbl_shipping WHERE tbl_cart.id_shipping = tbl_shipping.id_shipping
  ORDER BY tbl_cart.id_cart DESC";
$db = new Database();
$sql_listing = $db->select($sql_listorder);
?>

        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Order List</h4>
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
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Management</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
                if($sql_listing) {$i=0;
                    while($orderresult = $sql_listing->fetch_assoc()) {$i++;

                    
                ?>
                 <tr>
                 <td><?php echo $i ?></td>
                    <td><?php echo $orderresult['code_cart'] ?></td>
                    <td><?php echo $orderresult['name'] ?></td>
                    <td><?php echo $orderresult['address'] ?>, <?php echo $orderresult['city']?>
                                                             , <?php echo $orderresult['state'] ?> </td>
                    <td><?php echo $orderresult['email'] ?></td>
                    <td><?php echo $orderresult['phone'] ?></td>
                    <td>
                        <?php
                        if ($orderresult['cart_status']==1) {
                             echo '<a href = "process.php?cart_status=0&code='.$orderresult['code_cart'].'">New Order</a>';
                        } else {
                            echo 'Processed';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $orderresult['cart_date']
                        ?>
                    </td>
                    <td><a href = "order-check.php?code=<?php echo $orderresult['code_cart'] ?>">Check Order</a></td>
                </tr>
                <?php
                     }  
                }
                ?>
    
                                        
                                    </tbody>
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