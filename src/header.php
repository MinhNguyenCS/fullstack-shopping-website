<!DOCTYPE html>
<html>
<head>

    <title>Akatsuki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel = "stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body style = "background-color: #18191a;">
    <header>
      
        <nav class="fixed-top navbar-custom navbar navbar-expand-lg" >
  <div class="container-fluid">
        <div class="logo">
            <img onclick = "window.location.href = 'home.php'" src = "images/logo.png" class = "pic">

        </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    

        <li class= "nav-item dropdown"><a href = "#" class = "nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $result['categoryName']?></a>
       
        <ul class = "dropdown-menu">
                <?php
                $query2 = "SELECT * FROM tbl_brand where category_id = '$menu_id' ORDER BY brand_id DESC";
                $listing2 = $db->select($query2);
                while($result2 = $listing2->fetch_assoc()){
                ?>
                 <li><a class = "dropdown-item" href = "category.php?id=<?php echo $result2['brand_id'] ?>"><?php echo $result2['brand_name']?></a></li>
            <?php
            }
            ?>
            </ul>
        </li>
        <?php
            }
        ?>     
        </ul>
      <form class = "d-flex" action = "search.php?keysearch=search" method = "POST">
        <div class = "others">
            <li><input placeholder="Search" type = "text" name = "keysearch"> <button type = "submit" name = "search"><i class="fas fa-search "></i></button></li>
            </div>
        </form>
        <div class = "others ">
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
    </div>
  </div>
</nav>

    </header>