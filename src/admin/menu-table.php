<?php
include "header2.php";
include "slider2.php";
include "class/category_class.php";

$category = new category;
$listing = $category -> listing();
?>

        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Menu List</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                        <a href="menu-add.php" class="btn btn-sm btn-success">Add Menu</a>
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
                                            <th>Menu</th>
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
                    <td><?php echo $result['categoryId'] ?></td>
                    <td><?php echo $result['categoryName'] ?></td>
                    <td><a href = "menu-edit.php?categoryId=<?php echo $result['categoryId'] ?>" class="btn btn-sm btn-primary" >Change</a>
                    <a href ="menu-delete.php?categoryId=<?php echo $result['categoryId'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
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