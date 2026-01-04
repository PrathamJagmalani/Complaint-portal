<?php
session_start();
include("connect.php");

if(isset($_POST['loginbtn'])){
    $em = $_POST['email'];
    $pw = $_POST['password'];

    $qry = "SELECT * FROM users WHERE email='$em' AND password='$pw'";
    $res = mysqli_query($con,$qry);

    if(mysqli_num_rows($res)>0){
        $data = mysqli_fetch_assoc($res);
        $_SESSION['uid'] = $data['id'];
        header("location:dashboard.php");
        exit;
    } else {
        $error = "Invalid Email or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Login - Complaint Portal</title>

<!-- Bootstrap -->
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Icons -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

body{
    background:white;
}

/* Navbar top */
.navbar-custom{
    background:#4c6ef5;
}
.navbar-brand{
    color:white !important;
    font-size:22px;
    font-weight:600;
}

/* Page header */
.page-title{
    text-align:center;
    margin-top:30px;
    font-size:32px;
    font-weight:700;
    color:#333;
}

/* Cards */
.info-card{
    border-radius:15px;
    padding:20px;
    transition:0.3s;
}
.info-card:hover{
    transform:scale(1.05);
}

/* Login Form Card */
.login-card{
    border-radius:20px;
    border:1px solid #ddd;
    padding:25px;
}

/* Button */
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
    <i class="fa fa-comment-dots"></i> Complaint Portal
  </a>
</nav>

<!-- MAIN TITLE -->
<h1 class="page-title">Student Complaint Management System</h1>

<!-- INFO CARDS -->
<div class="container mt-4">
  <div class="row">

    <div class="col-md-4">
      <div class="shadow info-card bg-light">
        <h5><i class="fa fa-bullhorn text-primary"></i> Report Issues Easily</h5>
        <p>Submit your complaints quickly and securely.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="shadow info-card bg-light">
        <h5><i class="fa fa-clock text-primary"></i> Fast Resolution</h5>
        <p>Admin takes immediate action on your issues.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="shadow info-card bg-light">
        <h5><i class="fa fa-check-circle text-primary"></i> Track Status</h5>
        <p>Check real-time progress of your complaints.</p>
      </div>
    </div>

  </div>
</div>

<!-- LOGIN FORM -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="login-card shadow">

        <h3 class="text-center mb-4">
          <i class="fa fa-user-circle"></i> Student Login
        </h3>

        <?php 
        if(isset($error)){ 
            echo "<div class='alert alert-danger'>$error</div>"; 
        } 
        ?>

        <form method="post">

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <button class="btn btn-custom btn-block" name="loginbtn">
            <i class="fa fa-sign-in-alt"></i> Login
          </button>

          <div class="text-center mt-3">
            New user? <a href="register.php">Register</a>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

</body>
</html>
