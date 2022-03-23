<?php
include('assets/libary/constant.php');

if(array_key_exists('signUpUsers', $_POST)) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pass = $_POST['password'];
  // $c_pass = $_POST['c_password'];
  // if($pass == $c_pass) {

  // }
  $hashed = password_hash($pass, PASSWORD_DEFAULT);

  if(empty($name) || empty($email) || empty($phone) || empty($pass)) { 
    $report = 'All fields are required'; $count = 1;
  }else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
      $ck = $db->query("SELECT id FROM users WHERE email='$email' ")or die(mysqli_error($db));
      if(mysqli_num_rows($ck) == 0) {
        $sq = $db->query("INSERT INTO users(name, email, phone, password) VALUES('$name', '$email', '$phone', '$hashed') ")or die(mysqli_error($db));
        $report = 'Signup up sucessfull, Login !'; $count = 0;
      }else {
        $report = 'This email is already taken!'; $count = 1;
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
  <title>Bookep | Signup</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/logsign.css">
</head>
<body>
  <div class="container">
    <form class="row" autocomplete="off"  method="post">
      <div class="col-12">
        <h3 style="text-align: center;">Sign Up To Bookep</h3><br>
        <?php if(isset($report)) { echo alert($report,$count); }  ?>
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="name" class="form-control">
        </div>
      </div>

      <div class="col-md-6 col-12 mt-2">
        <div class="form-group">
          <label>Phone</label>
          <input type="number" name="phone" class="form-control">
        </div>
      </div>

      <div class="col-md-6 col-12 mt-2">
        <div class="form-group">
          <label>Email</label>
          <input type=""  name="email" class="form-control">
        </div>

        
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" >
        </div>

        <div class="form-group form-check">
          <a class="text-white text-bold" href="login.php" style="float: right;">Login Here</a> 
        </div>

        <button type="submit" name="signUpUsers" class="btn btn-primary mt-2" style="float: right;">Sign Up</button>


      </div>



    </form>
  </div>
</body>
</html>