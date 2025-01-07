<?php
include "header2.php";
include "slider2.php";
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

<div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Edit Toggle</h4>
                    </div>
                </div>
                <div class="right-category">
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
</div>   



<?php
include "footer2.php";
?>

