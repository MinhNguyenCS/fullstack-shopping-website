<?php
include "header.php";

?>
<!------------------------------------------------category----------------------------------------------------->
    <section class = "category">
        <div class = "container-fluid">
            <div class = "category-top row-show">
                <?php
                 $sql_pro = "SELECT * FROM tbl_category,tbl_brand WHERE tbl_category.categoryId = tbl_brand.category_id AND
                 tbl_brand.brand_id = '$_GET[id]' ";
                 $pro_id = $_GET['id'];
                 $query_pro = $db->select($sql_pro);
                 $row_title = $query_pro->fetch_assoc();
                ?>
        
                <p>Home</p> <span>&#10230;</span> <p><?php echo $row_title['categoryName'] ?></p><span>&#10230;</span> <p><?php echo $row_title['brand_name'] ?></p>
            </div>
        </div>
        <div class = "container-fluid">
            <div class = "row">
                <div class = "category-left">
                    <ul>
                        <?php
                        $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
                        $listing = $db->select($query);
                         while($result = $listing->fetch_assoc()) {
                            $menu_id = $result['categoryId'];
                            
                        ?>
                        <li class = "category-left-li"><a href = "#"><?php echo $result['categoryName']?></a>
                            <ul>
                            <?php
                                $query2 = "SELECT * FROM tbl_brand where category_id = '$menu_id' ORDER BY brand_id DESC";
                                $listing2 = $db->select($query2);
                                while($result2 = $listing2->fetch_assoc()){
                            ?>
                                <li><a href = "category.php?id=<?php echo $result2['brand_id'] ?>"><?php echo $result2['brand_name']?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                    
                    </li>
                        <?php }  ?>
                        
                    </ul>

                </div>
                
                <?php
                if(isset($_GET['page'])) {
                   $page_num=$_GET['page'];
                } else {
                    $page_num=1;

                }
                if($page_num==1 || $page_num == '') {
                    $begin = 0;
                } else {
                    $begin = ($page_num*8)-8;
                }
                $sql_pro = "SELECT * FROM tbl_product,tbl_brand WHERE tbl_product.brand_id = tbl_brand.brand_id AND
                tbl_product.brand_id = '$_GET[id]' ORDER BY tbl_product.product_id DESC LIMIT $begin,8";
                $query_pro = $db->select($sql_pro);
                ?>

                <div class = "category-right row">
                    <div class = "category-right-top">
                        <p>New Arrivals</p>
                    </div>
                    <div class = "category-right-top">
                        <button><span>Filter</span><i class="fas fa-sort-down"></i></button>
                    </div>
                    <div class = "category-right-top">
                        <select name="" id="">
                            <option value = "">Best Match</option>
                            <option value = "">Price: Low to High</option>
                            <option value = "">Price: High to Low</option>
                        </select>
                    </div>
                    <div class = "row" style = "margin-top: 30px;">
                       
                            
                        <?php
                        while ($row_pro = $query_pro->fetch_assoc()) {
                        ?>

<div class = "col-md-3">
                        <a class = "category-right-content-item" href ="product.php?id=<?php echo $row_pro['product_id'] ?>">
                            <img src = "admin/uploads/<?php echo $row_pro['product_img'] ?>" class = "img img-responsive" alt = "">
                            <h1 class = "product-name-size"><?php echo $row_pro['product_name'] ?></h1>
                            <p><?php echo $row_pro['price_sale'] ?> USD</p>
                            
                        </a>
                        </div>
                        <?php
                        }
                        ?>
                        
                        

                    </div>
                    <div style = "clear: both;">
                    <?php
                        $sql_page = $db->select("SELECT * FROM tbl_product WHERE brand_id = '$_GET[id]' ");
                        $row_count = mysqli_num_rows($sql_page);
                        $page = ceil($row_count/8);

                        ?>
                        <p>Pages:</p>
                    <ul class = "list_page">
                        <?php
                        for($i=1;$i<=$page;$i++) {
                        ?>
                        
                        <li <?php if($i==$page_num) {echo 'style="background:red;"';} else { echo '';} ?>><a href = "category.php?id=<?php echo $pro_id?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <?php
include "footer.php";
?>