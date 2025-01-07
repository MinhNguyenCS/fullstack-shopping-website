<?php
   session_start();
   include "admin\database.php";
    $db =new Database();
   if (isset($_POST['addtocart'])) {
      $id = $_GET['idproduct'];
      $increase = $_POST['product-quantity'];
      $size = $_POST['chooseSize'];
      $quantity = 1;
      $cart_id = $id.$size;
      
      $sql = "SELECT * FROM tbl_product WHERE product_id = ' ".$id." ' LIMIT 1 ";
      $query = $db->select($sql);
      $row = $query->fetch_assoc();
      if ($row) {
          $new_product = array(array('product_name'=>$row['product_name'],'id'=>$id, 'quantity'=>$increase,
          'price'=>$row['product_price'],'image'=>$row['product_img'],'size'=>$size, 'cart_id' => $cart_id));
          if (isset($_SESSION['cart'])) {
             $found = false;
             foreach($_SESSION['cart'] as $cart_item) {
                if($cart_item['id'] == $id && $cart_item['size'] == $size) {
                   $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$cart_item['quantity']+$increase,
                'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $cart_id);
                $found = true;
                } else {
                    $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'],'quantity'=>$cart_item['quantity'],
                'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'],  'cart_id' => $cart_id);
                }
             }
             if ($found == false) {
                $_SESSION['cart']=array_merge($product,$new_product);
             } else {
                $_SESSION['cart']=$product;
             }
          } else {
            $_SESSION['cart'] = $new_product;
          }
          
      }
      header('Location:shoppingcart.php');
   }

   //Delete each product
   if(isset($_SESSION['cart'])&&isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    foreach($_SESSION['cart'] as $cart_item ){
        $cart_item['card_id']=$cart_item['id'].$cart_item['size'];
      if ($cart_item['card_id'] != $id) {
          $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$cart_item['quantity'],
              'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $cart_id);
      }
      $_SESSION['cart'] = $product;
      header('Location:shoppingcart.php');
      }
    }


   //Delete all products
   if(isset($_GET['deleteall'])&&$_GET['deleteall']==1) {
        unset($_SESSION['cart']);
        header('Location:shoppingcart.php');
   }

   //Plus product
   if(isset($_GET['plus'])) {
     $id = $_GET['plus'];
     foreach($_SESSION['cart'] as $cart_item) {
        $check_id = $cart_item['id'].$cart_item['size'];
        if ($check_id != $id) {
            $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$cart_item['quantity'],
            'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $check_id);
            $_SESSION['cart'] = $product;
        } else {
            $plusproduct = $cart_item['quantity']+1;
            $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$plusproduct,
                'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $id); 
            $_SESSION['cart'] = $product;
        }
        
     }
     header('Location:shoppingcart.php');
   }

   //Minus product
   if(isset($_GET['minus'])) {
    $id = $_GET['minus'];
    foreach($_SESSION['cart'] as $cart_item) {
        $check_id = $cart_item['id'].$cart_item['size'];
       if ($check_id != $id) {
           $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$cart_item['quantity'],
           'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $check_id);
           $_SESSION['cart'] = $product;
       } else {
           $plusproduct = $cart_item['quantity']-1;
           if ($cart_item['quantity']>1) {
               $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$plusproduct,
               'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $id);
           } else {
               $product[]=array('product_name'=>$cart_item['product_name'], 'id'=>$cart_item['id'], 'quantity'=>$cart_item['quantity'],
           'price'=>$cart_item['price'], 'image'=>$cart_item['image'], 'size'=>$cart_item['size'], 'cart_id' => $check_id);
           }
           $_SESSION['cart'] = $product;
       }
       
    }
    header('Location:shoppingcart.php');
  }
   
?>