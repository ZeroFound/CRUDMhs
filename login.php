<?php 
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <title>Login</title>
</head>
<body>
<div class="login-box">
  <h2>Login<i class="fa fa-sign-in" aria-hidden="true"></i></h2>
  <form method="post" action="proses.php">
    <div class="user-box">
      <input type="text" name="user" required="">
      <label><i class="fa fa-user"></i>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass" required="">
      <label><i class="fa fa-key"></i>Password</label>
    </div>
    <input type="submit" value="login" class="btn btn-outline-success">
  </form>
</div>
</body>
</html>