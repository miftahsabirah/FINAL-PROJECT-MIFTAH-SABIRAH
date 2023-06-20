<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      $_SESSION['user_name'] = $row['name'];
      header('location:user_page.php');
   } else {
      $error[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style2.css">
</head>
<body>
   
<div class="form-container">
   <form action="" method="post" autocomplete="off">
      <h3>Login Now</h3>
      <?php
      if (isset($error)) {
         foreach($error as $errorMsg) {
            echo '<span class="error-msg">'.$errorMsg.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email" >
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
   </form>
</div>

</body>
</html>
