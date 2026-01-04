<?php
include("../connect.php");

$id = $_GET['id'];
$status = $_POST['status'];
$reply = $_POST['reply'];

$qry = "UPDATE complaints 
        SET status='$status', reply='$reply' 
        WHERE id='$id'";

mysqli_query($con,$qry);
header("location:view_complaints.php");
?>
