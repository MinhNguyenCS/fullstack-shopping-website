<?php 
include "header.php";
if (isset($_POST['signup'])) {
   $customerName = $_POST['customerName'];
   $email = $_POST['email'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zipcode = $_POST['zipcode'];
   $customerAddress = $_POST['customerAddress'];
   $phoneNumber = $_POST['phoneNumber'];
   $password = md5($_POST['password']);
   $sql_signup = "INSERT INTO tbl_signup (customer_name,email,address,city,state,zipcode,password,phonenumber)
                        VALUES ('$customerName','$email','$customerAddress','$city','$state','$zipcode','$password','$phoneNumber') ";                

   $sql_signup_result = $db->insert($sql_signup);
   if($sql_signup_result) {
      echo '<p style = "color: red">Sucessfully Sign Up</p>';
      $_SESSION['signup'] = $customerName;
      $_SESSION['id_customer'] = mysqli_insert_id($db->link);
      $_SESSION['email'] = $email;
      header('Location: shoppingcart.php');
   } else {
    echo '<p style = "color: red">Unsucessfully Sign Up</p>';
   }

}
?>

<section class = "shipping">
    <div class="container">
    <form action = "" method = "POST">
        <div class="shipping-content row">
     
            <div class="shipping-signup">
                <p style = "font-size: 20px;" >Sign Up for Akatsuki Account</p>
                <br/>
                
                <div class = "shipping-left-input row">
                    <div class="shipping-left-input-item">
                        <label for = "">Name:<span style = "color:red">*</span></label>
                        <input type = "text" name = "customerName">
                    </div>
                    <div class="shipping-left-input-item">
                        <label for = "">Email:<span style = "color:red">*</span></label>
                        <input type = "text" name = "email">
                    </div>
                </div>
                <div class = "shipping-left-middle row">
                    <div class="shipping-left-input-middle">
                        <label for = "">City<span style = "color:red">*</span></label>
                        <input type = "text" name = "city">
                    </div>
                    <div class="shipping-left-input-middle">
                        <label for = "">State<span style = "color:red">*</span></label>
                        <input type = "text" name  = "state">
                    </div>
                    <div class="shipping-left-input-middle">
                        <label for = "">ZIP code:<span style = "color:red">*</span></label>
                        <input type = "text" name = "zipcode">
                    </div>
                </div>
                <div class = "shipping-left-bottom">
                    <div class="shipping-left-input-item">
                        <label for = "">Address<span style = "color:red">*</span></label>
                        <input type = "text" name = "customerAddress">
                    </div>
                    <div class="shipping-left-input-item">
                        <label for = "">Phone Number:<span style = "color:red">*</span></label>
                        <input type = "text" name = "phoneNumber">
                    </div>
                    <div class="shipping-left-input-item">
                        <label for = "">Password:<span style = "color:red">*</span></label>
                        <input type = "text" name = "password">
                    </div>
                </div>
                <div class="shipping-left-button row">
                    <button type = "submit" name = "signup"><p style = "font-weight: bold;">SIGN UP</p></button>
                </div>
                
            </div>
           
        </div>
        </form>
    </div>
</section>