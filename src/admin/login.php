<?php 
session_start();
include('database.php');
$db =new Database();
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username= '".$username."' AND 
    password = '".$password."' LIMIT 1";
    $row = $db->select($sql);
    if ($row!=false) {
       $_SESSION['login'] = $username;
       echo "<script>location.href = 'indexx.php';</script>";
       //header("Location: category.php");
    } else {
      echo '<p style ="color: red;">Email or Password is incorrect. Try again!</p>';
  
    }

}
?>
<style>
<?php include 'style.css'; ?>
</style>
<header>
       <img src = "uploads/logo.png" class = "pic">    
        <h1 class = "page-name">Akatsuki Admin</h1>
</header>

<body class = login-page>
  <div class="login-container">
    <h1>Login</h1>
    <form class="login-form"  method="POST" action = "">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" name = "login">Log In</button>
    </form>
  </div>
</body>
</html>
