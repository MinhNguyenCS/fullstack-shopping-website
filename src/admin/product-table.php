<?php
include "header2.php";
include "slider2.php";
include "class/product_class.php";

$product = new product;
$listing = $product -> show_product();
?>

        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Product List</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                        <a href="product-add.php" class="btn btn-sm btn-success">Add Product</a>
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
                                           <th>Num</th>
                                           <th>ID</th>
                    <th>Name</th> 
                    <th>CategoryId</th>
                    <th>ToggleId</th>
                    <th>ProductPrice</th>
                    <th>PriceSale</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Adjustment</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
                if($listing) {$i=0;
                    while($result = $listing->fetch_assoc()) {$i++;

                    
                ?>
                 <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['product_id'] ?></td>
                    <td><?php echo $result['product_name'] ?></td>
                    <td><?php echo $result['category_id'] ?></td>
                    <td><?php echo $result['brand_id'] ?></td>
                    <td><?php echo $result['product_price'] ?></td>
                    <td><?php echo $result['price_sale'] ?></td>
                    <td><?php echo $result['product_desc'] ?></td>
                    <td><img src = "uploads\<?php echo $result['product_img'] ?>" width = 150px></td>
                    <td><a href ="product-delete.php?product_id=<?php echo $result['product_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
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