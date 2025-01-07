<?php
include "header.php";
?>
    <section class = "category">
        <div class = "container">
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
                if(isset($_POST['keysearch'])) {
                   $keysearch = $_POST['keysearch'];
                } else {
                    $keysearch = '';
                }
                $sql_pro = "SELECT * FROM tbl_product WHERE
                product_name LIKE '%".$keysearch."' ";
                $query_pro = $db->select($sql_pro);
                ?>

                <div class = "category-right row">
                    <div class = "category-right-top">
                        <p style = "text-transform: capitalize;" >Search for: <?php echo $keysearch ?></p>
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
                    <div class = "maincontent">
                        <ul class = "product_list">
                        <?php
                        while ($row_pro = $query_pro->fetch_assoc()) {
                        ?>

                        <li>
                        <a class = "category-right-content-item" href ="product.php?id=<?php echo $row_pro['product_id'] ?>">
                            <img src = "admin/uploads/<?php echo $row_pro['product_img'] ?>" alt = "">
                            <h1><?php echo $row_pro['product_name'] ?></h1>
                            <p><?php echo $row_pro['price_sale'] ?> USD</p>
                            
                        </a>
                        </li>
                        <?php
                        }
                        ?>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </section>




    <!----------------------footer---------------------------------------------------------------->

    <div class = "footer-top">
        <li><a href = ""><img src = ""></li>
        <li><a href = "">About</a></li>
        <li><a href = "">Contact</a></li>
        <li>
            <a href = "" class="fab fa-facebook-square"></a>
            <a href = "" class="fab fa-youtube"></a>
        </li>
    </div>
    <p class = "infor">
        This is a personal project
    </p>

    <script src="js/script.js"></script>
</body>

</html>