<?php
session_start();
include('assets/libary/constant.php');

if(isset($_GET['report'])) {
  $report = $_GET['report']; $count = $_GET['c'] ?? 0;
}


if(array_key_exists('loginUser', $_POST)) {

  $email = $_POST['email'];
  $pass = $_POST['password'];

  if(empty($email) || empty($pass)) { 
    $report = 'All fileds are required'; $count = 1;
  }else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {

      $sql = $db->query("SELECT id,email,password FROM users WHERE email='$email' ");
      if(mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_array($sql);
        if(password_verify($pass, $row['password'])) {
          $_SESSION['user_id'] = $row['id'];
          header('location: dashboard.php');
        }else {
          $report = 'Incorrect password, try again!'; $count = 1;
        }

      }else {
        $report = 'This Email does not exist'; $count = 1;
      }
      


    }else {
      $report = 'Pls enter a valid email address!'; $count = 1;
    }
  }

}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookep | Login</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/logsign.css">
</head>
<body>
  <?php if(isset($report)) { echo alert($report,$count); }  ?>
  <div class="container">
    <form method="post">
      <h3 style="text-align: center;">Login To Your Bookep Account</h3><br>
    <div class="form-group">
      <label>Email address</label>
      <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group mt-2">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Remeber Me</label>
      <a class="text-white text-bold" href="signup.php" style="float: right;">Register Here</a> 
    </div>

    <button type="submit" class="btn btn-primary mt-2" name="loginUser" style="float: right;">Login</button>
  </form>
  </div>
</body>
</html>