<?php
include "header2.php";
include "slider2.php";
include "class/category_class.php";
?>

<?php 
$category = new category;
if (!isset($_GET['categoryId']) || $_GET['categoryId']==NULL) {
    echo "<script>window.location = 'menu-table.php'</script>";
}
else {
    $category_id = $_GET['categoryId'];
    
}
$delete_category = $category->delete_category($category_id);
?>

<?php
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $category_name = $_POST['category_name'];
    $update_category = $category-> update_category($category_name, $category_id);
}
?>
