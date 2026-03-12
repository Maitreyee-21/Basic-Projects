<?php
session_start();
include 'db_connect.php';

// Redirect if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

// Get admin username from session
$admin_name = $_SESSION['admin'];

// Connect to grievance database
$student_conn = mysqli_connect("localhost", "root", "", "grievance_db");

$total = $pending = $progress = $resolved = 0;

if ($student_conn) {

    $result = mysqli_query($student_conn, "SELECT COUNT(*) as count FROM complaints");
    $total = mysqli_fetch_assoc($result)['count'];

    $result = mysqli_query($student_conn, "SELECT COUNT(*) as count FROM complaints WHERE status='pending' OR status IS NULL");
    $pending = mysqli_fetch_assoc($result)['count'];

    $result = mysqli_query($student_conn, "SELECT COUNT(*) as count FROM complaints WHERE status='in_progress'");
    $progress = mysqli_fetch_assoc($result)['count'];

    $result = mysqli_query($student_conn, "SELECT COUNT(*) as count FROM complaints WHERE status='resolved'");
    $resolved = mysqli_fetch_assoc($result)['count'];

    mysqli_close($student_conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - College Complaint Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg,#204975,#0f9ad6); min-height:100vh; padding:20px; color:white; }
        .card { border:none; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.2); }
        .card h2 { font-size:2.5rem; font-weight:bold; }
        .welcome { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); border-radius:15px; padding:25px; margin-bottom:30px; color:white; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="welcome text-center">
        <h1><i class="fas fa-user-shield mr-3"></i>Welcome, <?php echo $admin_name; ?>!</h1>
        <p class="mb-0">College Complaint Portal Dashboard</p>
        <a href="logout.php" class="btn btn-light btn-sm mt-2"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 mb-4">
            <div class="card text-center p-4 bg-primary text-white">
                <i class="fas fa-file-alt fa-3x mb-3"></i>
                <h2><?php echo $total; ?></h2>
                <p class="mb-0"><strong>Total Complaints</strong></p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center p-4 bg-warning text-dark">
                <i class="fas fa-clock fa-3x mb-3"></i>
                <h2><?php echo $pending; ?></h2>
                <p class="mb-0"><strong>Pending</strong></p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center p-4 bg-info text-white">
                <i class="fas fa-spinner fa-spin fa-3x mb-3"></i>
                <h2><?php echo $progress; ?></h2>
                <p class="mb-0"><strong>In Progress</strong></p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center p-4 bg-success text-white">
                <i class="fas fa-check-circle fa-3x mb-3"></i>
                <h2><?php echo $resolved; ?></h2>
                <p class="mb-0"><strong>Resolved</strong></p>
            </div>
        </div>
    </div>

    <div class="row mb-4">
    <div class="col-md-3 mb-3">
        <a href="../index.php" class="btn btn-light btn-lg btn-block p-4 text-center text-dark">
            <i class="fas fa-home fa-2x mb-2 d-block"></i>View Public Dashboard
        </a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="view-complaints.php" class="btn btn-primary btn-lg btn-block p-4 text-center">
            <i class="fas fa-list fa-2x mb-2 d-block"></i>View All Complaints
        </a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="admin-details.php" class="btn btn-secondary btn-lg btn-block p-4 text-center">
            <i class="fas fa-users fa-2x mb-2 d-block"></i>Manage Admins
        </a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="undertakings.php" class="btn btn-success btn-lg btn-block p-4 text-center">
            <i class="fas fa-file-contract fa-2x mb-2 d-block"></i>Undertaking Details
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>