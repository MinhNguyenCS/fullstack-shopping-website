<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<?php
$brand = new brand;
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand-> insert_brand($category_id, $brand_name);
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
                    Add Type
                </h1>
                <form action = "" method = "POST">
                    <select name = "category_id" id = "">
                    <option value = "">Select menu</option>
                    <?php
                    $listing = $brand->listing();
                    if($listing) {
                        while($result = $listing->fetch_assoc()) {
 
                    ?>
                    <option value = "<?php echo $result['categoryId'] ?>"><?php echo $result['categoryName'] ?></option>
                    <?php
                    }
                }
                    ?>
                    </select> <br>
                    <input required name = "brand_name" type = "text" placeholder="Type in">

                    <button type = "submit">Add</button>
                </form>

            </div>
        </div>
    </section>
</body>
</html>