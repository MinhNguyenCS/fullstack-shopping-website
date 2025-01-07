<?php
include "header2.php";
include "slider2.php";
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

<div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Add Toggle</h4>
                    </div>
                </div>
                
                <div class="right-category">
                <form action = "" method = "POST">
                    <select name = "category_id" id = "">
                    <option value = "">Select Category</option>
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
</div>   
</div>  
<?php
include "footer2.php";
?>


