<?php
session_start();
if(!isset($_SESSION['admin'])) header("location:admin_login.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
body{
    background:white;
}

.navbar-custom{
    background:#d6336c;
}
.navbar-brand{
    color:white !important;
    font-size:22px;
}

.card-box{
    border-radius:15px;
    padding:25px;
    text-align:center;
    transition:0.3s;
}
.card-box:hover{
    transform:scale(1.05);
}
</style>
</head>

<body>

<nav class="navbar navbar-custom">
 <a class="navbar-brand">Admin Dashboard</a>
</nav>

<div class="container mt-5">

 <div class="row">

   <div class="col-md-4">
     <div class="card-box shadow bg-light">
       <h4>View Complaints</h4>
       <a href="view_complaints.php" class="btn btn-primary mt-2">Open</a>
     </div>
   </div>

   <div class="col-md-4">
     <div class="card-box shadow bg-light">
       <h4>Logout</h4>
       <a href="admin_logout.php" class="btn btn-danger mt-2">Logout</a>
     </div>
   </div>

 </div>

</div>

</body>
</html>
