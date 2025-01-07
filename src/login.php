<?php 
include('header.php');
session_start();
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_signup WHERE email= '".$email."' AND 
    password = '".$password."' LIMIT 1";
    $row = $db->select($sql);
    //mysqli_num_rows($row);
    if ($row!=false) {
      $row_data = mysqli_fetch_array($row);
       $_SESSION['signup'] = $row_data['customer_name'];
       $_SESSION['id_customer'] = $row_data['id_signup'];
       $_SESSION['email'] = $row_data['email'];
       //header("Location: shoppingcart.php");
       echo "<script>location.href = 'shoppingcart.php';</script>";
    } 
    else {
      //header("Location: login.php?fail=1");
      echo "<script>location.href = 'login.php?fail=1';</script>";
    }
   }
?>

<body class = login-page>
  <div class="login-container">
    <h1>Login</h1>
    <?php 
    if(isset($_GET['fail'])&&$_GET['fail']==1) {
       echo '<p style ="color: red;">Email or Password is incorrect. Try again!</p>';
    }
    ?>
    <form class="login-form"  method="POST" action = "">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="text" id="email" name="email" required placeholder="Email...">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Password...">
      </div>
      <button type="submit" name = "login">Log In</button>
      <button type="submit" onclick = "window.location.href = 'signup.php'" >Sign Up</button>
    </form>
  </div>
</body>
</html>
