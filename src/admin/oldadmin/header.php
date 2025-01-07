<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
}
?>



<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel = "stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src = "ckeditor/ckeditor.js"></script>
    <script src = "ckeditor/ckfinder.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
</head>
<body>
    <header>
       
         
       <img src = "uploads/logo.png" class = "pic">
            
        <h1 class = "page-name">Akatsuki Admin</h1>

        
    </header>
    
    
      
   
    