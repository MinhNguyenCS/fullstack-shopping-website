<?php 
include('header.php');
require('../mail/sendmail.php');
require('admin/carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('America/Phoenix');
if (isset($_SESSION['id_customer'])) {
    $id_customer = $_SESSION['id_customer'];
} else {
    $id_customer = '';
}
$id_shipping = $_SESSION['id_shipping'];
$code_order = rand(0,9999);
$insert_cart = "INSERT INTO tbl_cart(id_customer,code_cart,cart_status,cart_date, id_shipping)
 VALUES ('".$id_customer."','".$code_order."',1,'".$now."','".$id_shipping."')";
$cart_query = $db->insert($insert_cart);
if($cart_query) {
   foreach($_SESSION['cart'] as $key => $value) {
       $id_product = $value['id'];
       $quantity = $value['quantity'];
       $size = $value['size'];
       $insert_order_details = "INSERT INTO tbl_cart_details(id_product, code_cart, quantity_buy, product_size) VALUES ('".$id_product."','".$code_order."','".$quantity."','".$size."')";
       $insert_order_result = $db->insert($insert_order_details);
   }
   $mail = new Mailer();
   $title = "Order Confirmation From Akatsuki!";
   $content = "
   <div>
   <p>Tnank you for shopping with us. Your order ".$code_order." is confirmed.</p>
   
   </div>";
   $mailcustomer = $_SESSION['email'];
   $mail->orderMail($title,$content,$mailcustomer);
}
unset($_SESSION['cart']);
header('Location: thanks.php');

?>
