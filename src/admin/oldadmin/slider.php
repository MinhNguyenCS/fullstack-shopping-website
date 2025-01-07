<?php 
  if (isset($_GET['logout'])&&$_GET['logout']==1 ) {
    unset($_SESSION['login']);
    header('Location: login.php');

  }
?>

<section class = "admin-content">
        <div class = "admin-content-left">
            <ul>
                <li><a href = "dashboard.php">Dash Board</a></li>
                <li><a href = "#">Menu</a>
                    <ul>
                        <li><a href = "category.php">Add Menu</a></li>
                        <li><a href = "listing.php">See Menu</a></li>
                    </ul>
                
                </li>
                <li><a href = "#">Product Type</a>
                    <ul>
                        <li><a href = "brandadd.php">Add Type</a></li>
                        <li><a href = "brandlist.php">See Type</a></li>
                    </ul>
                </li>
                <li><a href = "#">Product</a>
                    <ul>
                        <li><a href = "productadd.php">Add Product</a></li>
                        <li><a href = "productList.php">See Product</a></li>
                    </ul>
                </li>
                <li><a href = "listorder.php">Order Management</a>
                    
                </li>
                <li><a href = "category.php?logout=1">Log Out: <?php 
                if(isset($_SESSION['login'])) {
                   echo $_SESSION['login'];
                }
                ?></a>
    
                </li>
                

            </ul>

        </div>
       

   