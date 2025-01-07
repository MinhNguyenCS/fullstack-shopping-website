<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php
$brand = new brand;
$show_brand = $brand -> show_brand();
?>

<div class="admin-content-right">
            <div class="right-listing">
               <h1>Listing</h1>
               <table>
                <tr>
                    <th>Num</th>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Menu</th>
                    <th>Adjustment</th>
                </tr>
                <?php
                if($show_brand) {$i=0;
                    while($result = $show_brand->fetch_assoc()) {$i++;

                    
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['brand_id'] ?></td>
                    <td><?php echo $result['categoryName'] ?></td>
                    <td><?php echo $result['brand_name'] ?></td>
                    <td><a href = "brandedit.php?brand_id=<?php echo $result['brand_id'] ?>">Change/</a><a href ="branddelete.php?brand_id=<?php echo $result['brand_id'] ?>">Delete</a></td>
                </tr>
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