<?php
include("../connect.php");
$qry = "SELECT complaints.*, users.fullname 
        FROM complaints 
        JOIN users ON complaints.user_id = users.id";
$res = mysqli_query($con,$qry);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Complaints</title>

<link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
<h3 class="text-center mb-4">Complaints List</h3>

<table class="table table-bordered table-striped">
<tr>
    <th>Student</th>
    <th>Category</th>
    <th>Complaint</th>
    <th>Image</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($res)){ ?>
<tr>
    <td><?= $row['fullname'] ?></td>
    <td><?= $row['category'] ?></td>
    <td><?= $row['message'] ?></td>

    <!-- IMAGE COLUMN (Correct + Modal Popup) -->
    <td>
        <?php if($row['image'] != ""){ ?>

            <!-- Thumbnail -->
            <img src="../uploads/<?= $row['image'] ?>"
                 width="120"
                 class="img-thumbnail"
                 style="cursor:pointer"
                 data-toggle="modal"
                 data-target="#adminImgModal<?= $row['id'] ?>">

            <!-- Modal -->
            <div class="modal fade" id="adminImgModal<?= $row['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-dark">
                        <div class="modal-body p-0">
                            <img src="../uploads/<?= $row['image'] ?>" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <span class="text-muted">No Image</span>
        <?php } ?>
    </td>

    <!-- STATUS COLUMN -->
    <td><?= $row['status'] ?></td>

    <!-- ACTION COLUMN -->
    <td>
        <form method="post" action="update_status.php?id=<?= $row['id'] ?>">
            <select name="status" class="form-control mb-2">
                <option <?= $row['status']=="Pending"?"selected":"" ?>>Pending</option>
                <option <?= $row['status']=="In Progress"?"selected":"" ?>>In Progress</option>
                <option <?= $row['status']=="Resolved"?"selected":"" ?>>Resolved</option>
            </select>

            <textarea name="reply" class="form-control mb-2"
                      placeholder="Reply"><?= $row['reply'] ?></textarea>

            <button class="btn btn-success btn-sm">Update</button>
        </form>
    </td>
</tr>
<?php } ?>




</table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
