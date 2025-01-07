<?php
include "header.php";
include "slider.php";
include "class/category_class.php";
?>

<?php 
$category = new category;
if (!isset($_GET['categoryId']) || $_GET['categoryId']==NULL) {
    echo "<script>window.location = 'listing.php'</script>";
}
else {
    $category_id = $_GET['categoryId'];
    
}
$get_category = $category->get_category($category_id);
    if ($get_category) {
        $result = $get_category ->fetch_assoc();
    }


?>

<?php
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $category_name = $_POST['category_name'];
    $update_category = $category-> update_category($category_name, $category_id);
}
?>

<div class="admin-content-right">
            <div class="right-category">
                <h1>
                    Change Menu
                </h1>
                <form action = "" method = "POST">
                    <input required name = "category_name" type = "text" placeholder="Type in" 
                    value = "<?php echo $result['categoryName'] ?>">
                    <button type = "submit">Change</button>
                </form>

            </div>
        </div>
    </section>
</body>
</html>