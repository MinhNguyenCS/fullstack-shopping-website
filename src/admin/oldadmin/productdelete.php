<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php 
$product = new product;
if (!isset($_GET['product_id']) || $_GET['product_id']==NULL) {
    echo "<script>window.location = 'productList.php'</script>";
}
else {
    $product_id = $_GET['product_id'];
    
}
$delete_product = $product->delete_product($product_id);
   


?>

<?php
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $product_name = $_POST['product_name'];
    $update_product = $product-> update_product($product_name, $product_id);
}
?>
