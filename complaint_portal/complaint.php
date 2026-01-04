<?php
session_start();
include("connect.php");

if(!isset($_SESSION['uid'])){
    header("location:index.php");
    exit;
}

$success = ""; // message variable

if(isset($_POST['submit'])){
    $uid = $_SESSION['uid'];

    // escape dangerous characters
    $cat = mysqli_real_escape_string($con, $_POST['category']);
    $msg = mysqli_real_escape_string($con, $_POST['message']);

    $image_name = "";

    if(!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . $_FILES['image']['name']; 
        $target = "uploads/" . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $qry = "INSERT INTO complaints(user_id,category,message,image)
            VALUES('$uid','$cat','$msg','$image_name')";

    mysqli_query($con,$qry);

    $_SESSION['success'] = "Thank you for your feedback! We will resolve the issue as soon as possible.";
    header("location: complaint.php");
    exit;
}


    

?>




<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    Submit Complaint
                </div>

                <div class="card-body">

                    <?php if(isset($_SESSION['success'])){ ?>
<div class="alert alert-success text-center">
    <i class="fa fa-check-circle"></i>
    <?= $_SESSION['success'] ?>
</div>
<?php unset($_SESSION['success']); } ?>


                   
 


<?php if($success != ""){ ?>
<div class="alert alert-success text-center">
    <i class="fa fa-check-circle"></i>
    <?= $success ?>
</div>
<?php } ?>




                    <form method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option value="">Select</option>
                                <option>Academic</option>
                                <option>Infrastructure</option>
                                <option>Administration</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Complaint</label>
                            <textarea name="message"
                                      class="form-control"
                                      rows="4"
                                      required></textarea>
                        </div>

                        <div class="form-group">
    <label>Upload Image (optional)</label>
    <input type="file" name="image" class="form-control">
</div>


                        <button type="submit" name="submit"
                                class="btn btn-primary">
                            Submit
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
