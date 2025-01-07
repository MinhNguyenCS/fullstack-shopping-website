<?php
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>location.href = 'login.php';</script>";
    //header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Akatsuki Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel = "stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src = "ckeditor/ckeditor.js"></script>
    <script src = "ckeditor/ckfinder.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="./css/custom.css">
</head>
<?php 
  if (isset($_GET['logout'])&&$_GET['logout']==1 ) {
    unset($_SESSION['login']);
    echo "<script>location.href = 'login.php';</script>";
    //header('Location: login.php');

  }
?>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> 
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                
                <header>
       <img src = "uploads/logo.png" class = "pic">
            
        <h1 class = "page-name">Akatsuki Management</h1>

        <ul class="nav navbar-top-links navbar-right pull-right" style = " position: absolute;
  right: 0px;">
                    <li>
                        <div class="dropdown">
                            <a class="profile-pic dropdown-toggle" data-toggle="dropdown" href="#"> 
                                <img src="plugins/images/users/avatar.jpg" alt="user-img" width="36" class="img-circle" />
                                <b class="hidden-xs"><?php 
                if(isset($_SESSION['login'])) {
                   echo $_SESSION['login'];
                }
                ?></b> 
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.html">Information</a></li>
                                <li class="divider"></li>
                                
                                <li><a href = "indexx.php?logout=1">Log Out</a>
    
                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
        
    </header>
                
                
            </div>
        </nav>