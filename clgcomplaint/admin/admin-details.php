<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","admin_reg_db");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

// Handle actions (Activate/Deactivate/Delete)
if(isset($_GET['action']) && isset($_GET['id'])){
    $id = intval($_GET['id']);
    if($_GET['action'] == 'activate'){
        mysqli_query($conn, "UPDATE admins SET is_active=1 WHERE id=$id");
    } elseif($_GET['action'] == 'deactivate'){
        mysqli_query($conn, "UPDATE admins SET is_active=0 WHERE id=$id");
    } elseif($_GET['action'] == 'delete'){
        mysqli_query($conn, "DELETE FROM admins WHERE id=$id");
    }
    header("Location: admin-details.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM admins ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Details</title>
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
<h2 class="mb-4">Admin Accounts</h2>
<a href="dashboard.php" class="btn btn-secondary mb-3">⬅ Back to Dashboard</a>
<table class="table table-bordered table-striped">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>Username</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
<th>Status</th>
<th>Created At</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['full_name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['role']."</td>";
        echo "<td>".($row['is_active'] ? 'Active' : 'Inactive')."</td>";
        echo "<td>".$row['created_at']."</td>";
        echo "<td>";
        if($row['is_active']){
            echo "<a href='admin-details.php?action=deactivate&id=".$row['id']."' class='btn btn-sm btn-warning mr-1'>Deactivate</a>";
        } else {
            echo "<a href='admin-details.php?action=activate&id=".$row['id']."' class='btn btn-sm btn-success mr-1'>Activate</a>";
        }
        echo "<a href='admin-details.php?action=delete&id=".$row['id']."' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?')\">Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
}else{
    echo "<tr><td colspan='9' class='text-center'>No admins found</td></tr>";
}
?>
</tbody>
</table>
</div>
</div>
</body>
</html>