<?php
include "header.php";
?>
    <!-------------------------------------------product-->
    <section class = "product">
        <div class = "container">
            <div class = "product-top row-show">
                <?php
                 $sql_pro = "SELECT * FROM tbl_category,tbl_brand,tbl_product WHERE tbl_category.categoryId = tbl_brand.category_id 
                 AND tbl_product.brand_id = tbl_brand.brand_id
                 AND tbl_product.product_id = '$_GET[id]' ";
                 $pro_id = $_GET['id'];
                 $query_pro = $db->select($sql_pro);
                 $row_title = $query_pro->fetch_assoc();
                ?>
        
                <p>Home</p> <span>&#10230;</span> <p><?php echo $row_title['categoryName'] ?></p><span>&#10230;</span> <p><?php echo $row_title['brand_name'] ?></p><span>&#10230;</span> <p><?php echo $row_title['product_name'] ?></p>

            </div>

            <?php
                $brand_id = 0;
                $sql_pro = "SELECT * FROM tbl_product,tbl_brand WHERE tbl_product.brand_id = tbl_brand.brand_id AND
                tbl_product.product_id = '$_GET[id]' LIMIT 1";
                $query_pro = $db->select($sql_pro);
                ?>
            <div class = "product-content row">
                <div class="product-content-left row">
                    <?php
                    while ($product_detail = $query_pro->fetch_assoc()) { 
                        $brand_id = $product_detail["brand_id"];
                    ?>
                    <div class="product-content-left-main-img">
                        <img src = "admin/uploads/<?php echo $product_detail['product_img']  ?>" alt = "">
                    </div>

                    

                    <div class="product-content-left-side-img">
                    <?php
                    $sql_side = "SELECT * FROM tbl_product, tbl_product_side_img WHERE tbl_product.product_id = tbl_product_side_img.product_id
                    AND tbl_product_side_img.product_id = '$_GET[id]'";
                    $side_img = $db->select($sql_side);
                    while ($img = $side_img->fetch_assoc()) {
                    ?>
                       <div class = "row-md-3">
                          <img  src = "admin/uploads/<?php echo $img['product_side_img'] ?>" alt = "">
                       </div>
                        
                        
                    <?php
                    }
                     ?>


                    </div>

                </div>
                
                <div class="product-content-right">
                <form method = "POST" action = "addproduct.php?idproduct=<?php echo $product_detail['product_id'] ?>">
                    <div class="product-content-right-name">
                        <h1><?php echo $product_detail['product_name'] ?></h1>
                    </div>
                    <div class="product-content-right-price">
                        <p><?php echo $product_detail['product_price'] ?> USD</p>
                    </div>
                   
                    <div class="product-content-right-size">
                        <p style ="font-weight: bold;">Size:</p>
                        <div class="size">
                            <input id="sizeS" checked name = "chooseSize"type="radio" class="visually-hidden" value = "S">
                            <label for="sizeS" tabindex="-1" class="chooseS size_box">S</label>
                            <input id="sizeM" name = "chooseSize" type="radio" class="visually-hidden" value = "M">
                            <label for="sizeM" tabindex="-1" class="chooseS size_box">M</label>
                            <input id="sizeL" name = "chooseSize" type="radio" class="visually-hidden" value = "L">
                            <label for="sizeL" tabindex="-1" class="chooseS size_box">L</label>
                            <input id="sizeXL" name = "chooseSize" type="radio" class="visually-hidden" value = "XL">
                            <label for="sizeXL" tabindex="-1" class="chooseS size_box">XL</label>
                            <input id="sizeXXL" name = "chooseSize" type="radio" class="visually-hidden" value = "XXL">
                            <label for="sizeXXL" tabindex="-1" class="chooseS size_box">XXL</label>
                        </div>
                    </div>
                    

                   
                    <div class="quantity">
                        <p style ="font-weight: bold;"> Quantity:</p>
                        <input name = "product-quantity" type = "number" min = "1" value = "1">
                    </div>
                

                    <p style = "color: red;">Please Select Size</p>
                    <div class="product-content-right-button">
                        <button name = "addtocart"><i class="fas fa-shopping-cart"></i>ADD TO CART</i></button>
                        <button><p>FIND AT STORES</p></button>
                    </div>
                </form>
                    <?php
                    }
                    ?>
                    <div class="product-content-right-icon">
                        <div class="product-content-right-icon-item">
                            <i class="fas fa-phone-alt"></i><p>Hotline</p>
                        </div>
                        <div class="product-content-right-icon-item">
                            <i class="fas fa-comments"></i><p>Chat</p>
                        </div>
                        <div class="product-content-right-icon-item">
                            <i class="far fa-envelope"></i><p>Mail</p>
                        </div>
                    </div>
                    <div class="product-content-right-QR">
                        <img src = "images/qr.jpg">
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            &#8744;

                        </div>
                        <div class="product-content-right-bottom-table">
                            <div class="product-content-right-bottom-title row">
                                <div class="product-content-right-bottom-title-item detail">
                                    <p>Product Details</p>

                                </div>
                                <div class="product-content-right-bottom-title-item shipping">
                                    <p>Shipping and Returns</p>
                                </div>
                                <div class="product-content-right-bottom-title-item">
                                    <p><a href = "https://shopfans.com/clothes/size.html">Size Check</a></p>
                                </div>
                            </div>
                            <div class="product-table">
                                <div class="product-table-detail">
                                    <?php
                                    $sql_detail = "SELECT * FROM tbl_product WHERE product_id = '$_GET[id]' LIMIT 1";
                                    $query_detail = $db->select($sql_detail);
                                    while ($product_detail = $query_detail->fetch_assoc()) { 
                                          echo $product_detail['product_desc'];
                                    }
                                    ?>
                                </div>
                                <div class="product-table-shipping">
                                    We accept returns on non-sale items that are in original packaging, unused, and unwashed within 30 days of receipt. Please follow our returns/exchanges process below. If items do not meet our requirements for return, they will be shipped back to you in lieu of a refund. Shipping and handling charges are non-refundable (exceptions may apply). <br>

Returns & Exchanges Process: If item(s) fit within our returns guidelines found in the FAQ. Please select the "request returns or exchanges" link at the bottom of the site to start the process. Please allow 7-10 business days for the credit to appear on your account after your return is processed.
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class = "product-relate ">
        <div class="product-relate-title">
            <p>YOU MIGHT ALSO LIKE</p>
        </div>
        <div class=" row">
            <?php
            $sql_relate = "SELECT * FROM tbl_product WHERE product_id != '$_GET[id]' AND brand_id = $brand_id LIMIT 6";
            $query_relate = $db->select($sql_relate);
            while ($product_relate = $query_relate->fetch_assoc()) { 
                  
            ?>
            <div class = "col-md-2" >

            
            <a class="product-relate-item" href = "product.php?id=<?php echo $product_relate['product_id'] ?>">
                
                <img src = "admin/uploads/<?php echo $product_relate['product_img']?>" alt = "">
                <h1><?php echo $product_relate['product_name'] ?></h1>
                <p><?php echo $product_relate['product_price'] ?></p>
            </a>
            </div>
            <?php
            }
            ?>
        
        </div>
    </section>

    <?php
include "footer.php";
?>