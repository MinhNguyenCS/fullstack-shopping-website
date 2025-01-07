<?php
include "header.php";
include "slider.php";
include "database.php";
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php
$code = $_GET['code'];
$sql_listorder = "SELECT * FROM tbl_cart_details ,tbl_product WHERE tbl_cart_details.id_product = tbl_product.product_id AND
tbl_cart_details.code_cart = $code ORDER BY tbl_cart_details.id_cart_details DESC";
$db = new Database();
$sql_listing = $db->select($sql_listorder);

?>

<div class="admin-content-right">
            <div class="right-listing">
               <h1>Listing</h1>
               <table>
               <tr>
                    <th>ID</th>
                    <th>Confirmation Number </th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sum</th>
                   
                    

                </tr>
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
                <td colspan = "7">
                        <p>Total: <?php echo $total ?> USD</p>
                
                    </td>
               </table>
            </div>
        </div>
    </section>
</body>
</html>