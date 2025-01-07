<?php 
include('header.php');

if(isset($_POST['changepassword'])) {
    $email = $_POST['email'];
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $sql = "SELECT * FROM tbl_signup WHERE email= '".$email."' AND 
    password = '".$old_password."' LIMIT 1";
    $row = $db->select($sql);
    if ($row!=false) {
        $sql_update = "UPDATE tbl_signup SET password = '".$new_password."'  ";
        $update_pass = $db->update($sql_update);
        echo '<p style ="color: green;">Password has been changed successully</p>';
    } else {
      echo '<p style ="color: red;">Email or Password is incorrect. Try again!</p>';
  
    }

}
?>


<body class = login-page>
  <div class="login-container">
    <h1>Change Password</h1>
    <form class="login-form"  method="POST" action = "">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="text"  name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Old Password</label>
        <input type="text"  name="old_password" required>
      </div>
      <div class="form-group">
        <label for="password">New Password</label>
        <input type="text"  name="new_password" required>
      </div>
      <button type="submit" name = "changepassword">Change Password</button>
    </form>
  </div>
</body>
</html>
