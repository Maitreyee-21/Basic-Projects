<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","grievance_db");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

// Handle actions (Approve / Reject)
if(isset($_GET['action']) && isset($_GET['id'])){
    $id = intval($_GET['id']);
    if($_GET['action'] == 'approve'){
        mysqli_query($conn, "UPDATE undertakings SET status='approved' WHERE id=$id");
    } elseif($_GET['action'] == 'reject'){
        mysqli_query($conn, "UPDATE undertakings SET status='rejected' WHERE id=$id");
    }
    header("Location: undertakings.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM undertakings ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Undertaking Details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
body{background: linear-gradient(135deg,#204975,#0f9ad6); min-height:100vh; padding:30px;}
.container-box{background:white; padding:25px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,0.2);}
h2{color:#204975; font-weight:bold;}
.table td{vertical-align:middle;}
</style>
</head>
<body>
<div class="container">
<div class="container-box">
<h2 class="mb-4">All Undertakings</h2>
<a href="dashboard.php" class="btn btn-secondary mb-3">⬅ Back to Dashboard</a>

<table class="table table-bordered table-striped">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Reg No</th>
<th>Department</th>
<th>Details</th>
<th>Status</th>
<th>Submitted At</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['full_name']."</td>";
        echo "<td>".$row['reg_no']."</td>";
        echo "<td>".$row['department']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['submitted_at']."</td>";
        echo "<td>";
        if($row['status'] == 'pending'){
            echo "<a href='undertakings.php?action=approve&id=".$row['id']."' class='btn btn-sm btn-success mr-1'>Approve</a>";
            echo "<a href='undertakings.php?action=reject&id=".$row['id']."' class='btn btn-sm btn-danger'>Reject</a>";
        } else {
            echo "-";
        }
        echo "</td>";
        echo "</tr>";
    }
}else{
    echo "<tr><td colspan='8' class='text-center'>No undertakings found</td></tr>";
}
?>
</tbody>
</table>
</div>
</div>
</body>
</html>