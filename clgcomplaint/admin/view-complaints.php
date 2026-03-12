<?php
session_start();
include 'db_connect.php';

// Redirect if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

// Admin name
$admin_name = $_SESSION['admin'];

// Connect to grievance database
$student_conn = mysqli_connect("localhost", "root", "", "grievance_db");

// Handle action buttons
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];

    if ($action == "in_progress" || $action == "resolved") {
        mysqli_query($student_conn, "UPDATE complaints SET status='$action' WHERE id=$id");
        header("Location: view-complaints.php"); // redirect to refresh
        exit;
    }
}

// Fetch complaints
$complaints = [];
if ($student_conn) {
    $result = mysqli_query($student_conn, "SELECT * FROM complaints ORDER BY submitted_at DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        $complaints[] = $row;
    }
    mysqli_close($student_conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Complaints - Admin Panel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
body { background: #f0f2f5; font-family: 'Poppins', sans-serif; padding: 20px; }
.table-container { background: #fff; padding: 25px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); }
h2 { margin-bottom: 20px; color: #1e3a8a; }
.status-badge { font-weight: 600; padding: 5px 10px; border-radius: 12px; color: #fff; }
.pending { background: #f59e0b; }
.in_progress { background: #3b82f6; }
.resolved { background: #10b981; }
</style>
</head>
<body>
<div class="container table-container">
    <h2><i class="fas fa-list"></i> All Complaints</h2>
    <a href="dashboard.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Complaint ID</th>
                    <th>Full Name</th>
                    <th>Reg No</th>
                    <th>Department</th>
                    <th>Category</th>
                    <th>Incident Date</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Attachment / Recording</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($complaints)): ?>
                    <?php foreach($complaints as $index => $comp): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($comp['complaint_id']) ?></td>
                            <td><?= htmlspecialchars($comp['full_name']) ?></td>
                            <td><?= htmlspecialchars($comp['reg_no']) ?></td>
                            <td><?= htmlspecialchars($comp['department']) ?></td>
                            <td><?= htmlspecialchars($comp['category']) ?></td>
                            <td><?= htmlspecialchars($comp['incident_date']) ?></td>
                            <td>
                                <span class="status-badge <?= $comp['status'] ?>"><?= ucfirst(str_replace('_',' ',$comp['status'])) ?></span>
                            </td>
                            <td><?= nl2br(htmlspecialchars($comp['description'])) ?></td>
                            <!-- Attachment / Recording Column -->
                            <td>
                                <?php
                                if(!empty($comp['attachment'])){
                                    echo '<a href="uploads/'.htmlspecialchars($comp['attachment']).'" target="_blank">View File</a>';
                                } else {
                                    echo '---';
                                }
                                ?>
                            </td>
                            <td><?= $comp['submitted_at'] ?></td>
                            <td>
                                <?php
                                if($comp['status'] == 'pending') {
                                    echo '<a href="?action=in_progress&id='.$comp['id'].'" class="btn btn-sm btn-primary mb-1">In Progress</a> ';
                                    echo '<a href="?action=resolved&id='.$comp['id'].'" class="btn btn-sm btn-success mb-1">Resolve</a>';
                                } elseif($comp['status'] == 'in_progress') {
                                    echo '---';
                                } else {
                                    echo '<span class="text-success">Completed</span>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12" class="text-center">No complaints found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>