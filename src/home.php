<?php
include "header.php";

if(isset($_GET['logout'])&&$_GET['logout']==1) {
    unset($_SESSION['signup']);
    unset($_SESSION['id_customer']);
   // unset($_SESSION['email']);
    header('Location:home.php');
}
?>
    <!----------------------slide---------------------->
    <section id = "cover">
        <div class = "aspect-ratio-169">
            <img src = "images/main1.jpg">
            <img src = "images/main2.jpg">
            <img src = "images/main3.jpg">
            <img src = "images/main4.jpg">
            <img src = "images/main5.jpg">
        </div>
        <div class = "dot-container">
            <div class = "dot active"></div>
            <div class = "dot"></div>
            <div class = "dot"></div>
            <div class = "dot"></div>
            <div class = "dot"></div>
        </div>
    </section>
    <section class = "new-arrival">
    <div class="new-arrival-title">
            <p>New Arrival</p>
        </div>   
    <div class=" row">
            <?php
            $sql_relate = "SELECT * FROM tbl_product ORDER BY product_id ASC LIMIT 6";
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
    <!-----------------------logo---------------------->
    <section class = "app-container">
        <p>Download Akatsuki App</p>
        <div class = "download">
            <img src = "images/app-store-white.svg">
            <img src = "images/google-play-dark.svg">
            
        </div>
        <p>Get new from Akatsuki</p>
        <input style = "color: white;" type = "text" placeholder = "Type your email...">
    </section>
<?php
include "footer.php";
?>