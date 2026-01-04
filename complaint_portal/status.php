<?php
session_start();
include("connect.php");
$uid = $_SESSION['uid'];
$res = mysqli_query($con,"SELECT * FROM complaints WHERE user_id='$uid'");
?>
<!DOCTYPE html>
<html>
<head>
<title>Status</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<h3>Complaint Status</h3>
<table class="table table-bordered">
<tr><th>Category</th><th>Message</th><th>Status</th><th>Reply</th></tr>
<?php while($r=mysqli_fetch_assoc($res)){ ?>
<tr>
<td><?= $r['category'] ?></td>
<td><?= $r['message'] ?></td>
<td><?= $r['status'] ?></td>
<td><?= $r['reply'] ?></td>

<?php if($r['image'] != ""){ ?>

    <!-- Thumbnail -->
    <img src="uploads/<?= $r['image'] ?>" 
         width="120" 
         class="img-thumbnail"
         style="cursor:pointer"
         data-toggle="modal" 
         data-target="#imgModal<?= $r['id'] ?>">

    <!-- Modal -->
    <div class="modal fade" id="imgModal<?= $r['id'] ?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark">
          <div class="modal-body p-0">

            <img src="uploads/<?= $r['image'] ?>" 
                 class="img-fluid w-100">

          </div>
        </div>
      </div>
    </div>

<?php } else { ?>
    <span class="text-muted">No Image</span>
<?php } ?>



</tr>
<?php } ?>
</table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
