<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="home.css">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img class="image" src="th1.png" alt="Logo">
    </div>
</nav>

<div class="container" style="margin-top: 5%;">
  <h2 align="center">Form Login</h2>
  <form method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" placeholder="Enter username" name="uname" required>
      <div class="valid-feedback"></div>
      <div class="invalid-feedback"></div>
    </div>
    
    <div class="form-group">
      <label for="psw">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="psw" required>
      <div class="valid-feedback"></div>
      <div class="invalid-feedback"></div>
    </div>
    
    <div class="form-buttons" style="text-align: center; margin-top: 20px;">
      <button type="submit" class="btn btn-primary" name="login">Submit</button>
      <button type="reset" class="btn btn-warning" name="batal" style="margin-left: 10px;">Batal</button>
    </div>
  </form>
</div>

</body>
</html>