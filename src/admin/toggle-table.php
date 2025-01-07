<?php
include "header2.php";
include "slider2.php";
include "class/brand_class.php";

$brand = new brand;
$show_brand = $brand -> show_brand();
?>

        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Toggle List</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                        <a href="toggle-add.php" class="btn btn-sm btn-success">Add Toggle</a>
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
                    <th>Category Name</th>
                    <th>Toggle Name</th>
                    <th>Adjustment</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
               if($show_brand) {$i=0;
                while($result = $show_brand->fetch_assoc()) {$i++;

                    
                ?>
                 <tr>
                 <td><?php echo $i ?></td>
                    <td><?php echo $result['brand_id'] ?></td>
                    <td><?php echo $result['categoryName'] ?></td>
                    <td><?php echo $result['brand_name'] ?></td>
                    <td><a href = "toggle-edit.php?brand_id=<?php echo $result['brand_id'] ?>" class="btn btn-sm btn-primary">Change</a>
                    <a href ="toggle-delete.php?brand_id=<?php echo $result['brand_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
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