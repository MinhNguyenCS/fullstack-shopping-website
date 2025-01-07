<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<?php
$brand = new brand;
$brand_id = $_GET['brand_id'];
$get_brand = $brand->get_brand($brand_id);
if ($get_brand) {
     $result2 = $get_brand ->fetch_assoc();
}


if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand-> update_brand($category_id, $brand_name,$brand_id);
}
?>
<style>
    select {
        margin-top: 25px;
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin-content-right">
            <div class="right-category">
                <h1>
                    Change Type
                </h1>
                <form action = "" method = "POST">
                    <select name = "category_id" id = "">
                    <option value = "">Select menu</option>
                    <?php
                    $listing = $brand->listing();
                    if($listing) {
                        while($result = $listing->fetch_assoc()) {
 
                    ?>
                    <option <?php if($result2['category_id']== $result['categoryId']) {
                        echo "SELECTED";
                    } ?> value = "<?php echo $result['categoryId'] ?>"><?php echo $result['categoryName'] ?></option>
                    <?php
                    }
                }
                    ?>
                    </select> <br>
                    <input required name = "brand_name" type = "text" placeholder="Type in" 
                    value = "<?php echo $result2['brand_name'] ?>">

                    <button type = "submit">Change</button>
                </form>

            </div>
        </div>
    </section>
</body>
</html>