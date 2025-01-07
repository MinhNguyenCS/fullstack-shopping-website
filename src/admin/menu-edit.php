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

<div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Edit Menu</h4>
                    </div>
                </div>
                <form action = "" method = "POST">
                       <input required name = "category_name" type = "text" placeholder="Type in" 
                       value = "<?php echo $result['categoryName'] ?>">
                      <button type = "submit">Change</button>
                    </form>
            </div>
</div>   



<?php
include "footer2.php";
?>

