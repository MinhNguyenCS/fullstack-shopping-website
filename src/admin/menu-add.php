<?php
include "header2.php";
include "slider2.php";
include "class/category_class.php";
?>

<?php
$category = new category;
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $category_name = $_POST['category_name'];
    $insert_category = $category-> insert_category($category_name);
}
?>

<div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Add Menu</h4>
                    </div>
                </div>
                
                <form action = "" method = "POST">
                    <input required name = "category_name" type = "text" placeholder="Type in">
                    <button type = "submit">Add</button>
                </form>

            </div>
</div>   
</div>  
<?php
include "footer2.php";
?>


