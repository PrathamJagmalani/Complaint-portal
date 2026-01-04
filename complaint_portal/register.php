<?php
session_start();
include("connect.php");

if(isset($_POST['regbtn'])){
    $fn = $_POST['fullname'];
    $em = $_POST['email'];
    $pw = $_POST['password'];

    if(mysqli_query($con,"INSERT INTO users(fullname,email,password) VALUES('$fn','$em','$pw')")){
        $_SESSION['uid'] = mysqli_insert_id($con);
        header("location:complaint.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>

<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
body{
    background:white;
}

/* Navbar */
.navbar-custom{
    background:#4c6ef5;
}
.navbar-brand{
    color:white !important;
    font-size:22px;
    font-weight:600;
}

.page-title{
    text-align:center;
    margin-top:30px;
    font-size:32px;
    font-weight:700;
    color:#333;
}

.login-card{
    border-radius:20px;
    border:1px solid #ddd;
    padding:25px;
}

.btn-custom{
    background:#4c6ef5;
    color:white;
    border-radius:25px;
}
.btn-custom:hover{
    background:#364fc7;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="#">
    <i class="fa fa-user-plus"></i> Complaint Portal
  </a>
</nav>

<!-- TITLE -->
<h1 class="page-title">Student Registration</h1>

<!-- FORM -->
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="login-card shadow">

        <h3 class="text-center mb-4">
          <i class="fa fa-user-plus"></i> Register
        </h3>

        <form method="post">

          <input type="text" name="fullname" class="form-control mb-3"
           placeholder="Full Name" required>

          <input type="email" name="email" class="form-control mb-3"
           placeholder="Email" required>

          <input type="password" name="password" class="form-control mb-3"
           placeholder="Password" required>

          <button class="btn btn-custom btn-block" name="regbtn">
            Create Account
          </button>

          <div class="text-center mt-3">
            Already have an account? <a href="index.php">Login</a>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

</body>
</html>
