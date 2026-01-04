<?php
session_start();
include("../connect.php");

if(isset($_POST['login'])){
    $u=$_POST['username'];
    $p=$_POST['password'];

    $res=mysqli_query($con,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($res)>0){
        $_SESSION['admin']=$u;
        header("location:admin_dashboard.php");
    } else {
        $err = "Invalid Admin Credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

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
    background:#d6336c; /* Admin Pink */
}
.navbar-brand{
    color:white !important;
    font-size:22px;
    font-weight:600;
}

/* Title */
.page-title{
    text-align:center;
    margin-top:30px;
    font-size:32px;
    font-weight:700;
    color:#333;
}

/* Card */
.login-card{
    border-radius:20px;
    border:1px solid #ddd;
    padding:25px;
}

/* Button */
.btn-custom{
    background:#d6336c;
    color:white;
    border-radius:25px;
}
.btn-custom:hover{
    background:#ad2253;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-custom">
  <a class="navbar-brand"><i class="fa fa-user-shield"></i> Admin Panel</a>
</nav>

<h1 class="page-title">Admin Login</h1>

<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="login-card shadow">

        <h3 class="text-center mb-4"><i class="fa fa-user-shield"></i> Admin Login</h3>

        <?php if(isset($err)) echo "<div class='alert alert-danger'>$err</div>"; ?>

        <form method="post">
          <input type="text" name="username" class="form-control mb-3"
           placeholder="Admin Username" required>

          <input type="password" name="password" class="form-control mb-3"
           placeholder="Password" required>

          <button class="btn btn-custom btn-block" name="login">Login</button>
        </form>

      </div>

    </div>
  </div>
</div>

</body>
</html>
