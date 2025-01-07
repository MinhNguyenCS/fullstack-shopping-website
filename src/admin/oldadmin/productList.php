<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php
$product = new product;
$listing = $product -> show_product();
?>

<div class="admin-content-right">
            <div class="right-listing">
               <h1>Listing</h1>
               <table>
               <tr>
                    <th>Num</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>CategoryId</th>
                    <th>BrandId</th>
                    <th>ProductPrice</th>
                    <th>PriceSale</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Adjustment</th>

                </tr>
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
                    <td><a href ="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Delete</a></td>
                <?php
                     }  
                }
                ?>
               </table>
            </div>
        </div>
    </section>
</body>
</html>