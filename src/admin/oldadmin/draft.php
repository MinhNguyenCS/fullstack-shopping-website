

  


         <!--
        <div class="logo">
            <img onclick = "window.location.href = 'home.php'" src = "images/logo.png" class = "pic">

        </div>
        <nav class= "navbar navbar-expand-sm navbar-light bg-dark  ">
        <button type = "button" data-bs-toggle = "collapse" data-bs-target = "#navbarNav" class="navbar-toggler"
        aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <?php
        include "admin\database.php";
        session_start();
        $db;
        $db =new Database();
        $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
        $listing = $db->select($query);
        while($result = $listing->fetch_assoc()) {
        $menu_id = $result['categoryId'];
       
        ?>
        
        <div class="menu collapse navbar-collapse" id = "navbarNav">
            <ul class = "navbar-nav" role="navigation">
            <li class= "nav-item"><a href = "" class = "nav-link"><?php echo $result['categoryName']?></a>
            <ul class = "sub-menu">
                <?php
                $query2 = "SELECT * FROM tbl_brand where category_id = '$menu_id' ORDER BY brand_id DESC";
                $listing2 = $db->select($query2);
                while($result2 = $listing2->fetch_assoc()){
                ?>
                 <li><a href = "category.php?id=<?php echo $result2['brand_id'] ?>"><?php echo $result2['brand_name']?></a></li>
                 
            
            <?php
            }
            ?>
            </ul>
        </li>
        </ul>
            <?php
            }
            ?>       


        </div>
        </nav>
        <form action = "search.php?keysearch=search" method = "POST">
        <div class = "others">
            <li><input placeholder="Search" type = "text" name = "keysearch"> <button type = "submit" name = "search"><i class="fas fa-search"></i></button></li>
            <?php
            if (isset($_SESSION['signup'])) {
            ?>
            <li> <a href = "home.php?logout=1" class="fas fa-sign-out-alt"></a></li>
            <?php
            } else {
            ?>
            <li> <a href = "login.php" class="fas fa-user"></a></li>
            <?php
            }
            ?>
            <li><a href = "shoppingcart.php" class="fas fa-shopping-cart"></a></li>
            <li><a  class="fas fa-headphones"></a></li> 
        </div>
        </form>
        -->

