<?php
session_start();
include("connect.php");

if(!isset($_SESSION['uid'])){
    header("location:index.php");
    exit;
}

$uid = $_SESSION['uid'];
$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT fullname FROM users WHERE id='$uid'"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>

<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

body{
    background:#f8f9fa;
    font-family:Arial;
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
.nav-link{
    color:white !important;
    font-weight:500;
}
.nav-link:hover{
    color:#dbe4ff !important;
}

/* Card Boxes */
.dashboard-card{
    border-radius:15px;
    padding:25px;
    text-align:center;
    transition:0.3s;
}
.dashboard-card:hover{
    transform:scale(1.05);
}

/* Footer */
.footer{
    margin-top:40px;
    text-align:center;
    color:#666;
    padding:10px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand">
      <i class="fa fa-user-graduate"></i> Student Dashboard
  </a>

  <div class="ml-auto">
    <a href="logout.php" class="btn btn-light btn-sm">
        <i class="fa fa-sign-out-alt"></i> Logout
    </a>
  </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container mt-4">

    <h2 class="text-center mb-4">
        Welcome, <span class="text-primary"><?= $user['fullname'] ?></span> 👋
    </h2>

    <div class="row">

        <div class="col-md-4">
            <div class="shadow dashboard-card bg-white">
                <i class="fa fa-paper-plane fa-3x text-primary"></i>
                <h4 class="mt-3">Submit Complaint</h4>
                <p>Report any issue you are facing.</p>
                <a href="complaint.php" class="btn btn-primary">Submit</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="shadow dashboard-card bg-white">
                <i class="fa fa-list-check fa-3x text-success"></i>
                <h4 class="mt-3">View Status</h4>
                <p>Track the progress of your complaints.</p>
                <a href="status.php" class="btn btn-success">View</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="shadow dashboard-card bg-white">
                <i class="fa fa-image fa-3x text-warning"></i>
                <h4 class="mt-3">Submitted Evidence</h4>
                <p>View uploaded images & proof.</p>
                <a href="status.php" class="btn btn-warning">Check</a>
            </div>
        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <p>© <?= date("Y") ?> Complaint Portal | All Rights Reserved</p>
</div>

</body>
</html>
