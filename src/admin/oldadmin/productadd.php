<?php
include "header.php";
include "slider.php";
include "class/product_class.php"
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php 
$product = new product;
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    //var_dump($_POST,$_FILES);
  
    $insert_product = $product-> insert_product($_POST, $_FILES);
}
?>



<div class="admin-content-right">
<div class="product-add">
                <h1>
                    Add Product
                </h1>
                <form action = "" method = "POST" enctype="multipart/form-data">
                    <label for = "">Type in product name<span style = "color: red;">*</span></label>
                    <input name = "product_name" required type = "text" >
                    <label for = "">Select Category<span style = "color: red;">*</span></label>
                    <select name = "category_id" id = "">
                    <option value = "#">--Select--</option>
                        <?php
                        $show_category = $product->listing();
                        if($show_category) {
                           while($result = $show_category->fetch_assoc()) {
                              
                        ?>
                        <option value = "<?php echo $result['categoryId'] ?>"><?php echo $result['categoryName'] ?></option>
                        <?php
                           }}
                        ?>
                    </select>
                    <label for = "">Select Type<span style = "color: red;">*</span></label>

                    <select name = "brand_id" id = "">
                        <option value = "#">--Select--</option>
                        <?php
                        $show_brand = $product->show_brand();
                        if($show_brand) {
                           while($result = $show_brand->fetch_assoc()) {
                              
                        ?>
                        <option value = "<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                        <?php
                           }}
                        ?>
                    </select>
                    <label for = "">Product Price<span style = "color: red;">*</span></label>
                    <input name = "product_price" required type = "text" placeholder="$$$">
                    <label for = "">Sale Price<span style = "color: red;">*</span></label>
                    <input name = "sale_price"required type = "text" placeholder="$$$">
                    <label for = "">Product Desciption<span style = "color: red;">*</span></label>
                    <textarea required name = "product_desc" id ="editor1" rows = "10" ></textarea>
                    <label for = "">Product Image<span style = "color: red;">*</span></label>
                    <input name = "product_img" required type = "file">
                    <label for = "">Side Images<span style = "color: red;">*</span></label>
                    <input name = "side_img[]"required multiple type = "file">
                    <button type = "submit">Add</button>
                </form>

            </div>
        </div>
    </section>
</body>

<script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                //CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );
</script>

</html>