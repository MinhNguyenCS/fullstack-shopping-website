<?php
include "header.php";
include "slider.php";
include "database.php"
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php
$sql_listorder = "SELECT * FROM tbl_cart,tbl_signup WHERE tbl_cart.id_customer = tbl_signup.id_signup
  ORDER BY tbl_cart.id_cart DESC";
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
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Management</th>
                    

                </tr>
                <?php
                if($sql_listing) {$i=0;
                    while($orderresult = $sql_listing->fetch_assoc()) {$i++;

                    
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $orderresult['code_cart'] ?></td>
                    <td><?php echo $orderresult['customer_name'] ?></td>
                    <td><?php echo $orderresult['address'] ?></td>
                    <td><?php echo $orderresult['email'] ?></td>
                    <td><?php echo $orderresult['phonenumber'] ?></td>
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
                    <td><a href = "checkorder.php?code=<?php echo $orderresult['code_cart'] ?>">Check Order</a></td>
                    
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