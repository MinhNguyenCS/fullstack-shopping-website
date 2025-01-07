<?php
include "header.php";
include "slider.php";
include "class/category_class.php";
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php
$category = new category;
$listing = $category -> listing();
?>

<div class="admin-content-right">
            <div class="right-listing">
               <h1>Listing</h1>
               <table>
                <tr>
                    <th>Num</th>
                    <th>ID</th>
                    <th>Menu</th>
                    <th>Adjustment</th>
                </tr>
                <?php
                if($listing) {$i=0;
                    while($result = $listing->fetch_assoc()) {$i++;

                    
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['categoryId'] ?></td>
                    <td><?php echo $result['categoryName'] ?></td>
                    <td><a href = "categoryedit.php?categoryId=<?php echo $result['categoryId'] ?>">Change/</a><a href ="categorydelete.php?categoryId=<?php echo $result['categoryId'] ?>">Delete</a></td>
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