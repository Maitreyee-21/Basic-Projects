<?php
$status_message = '';

if (isset($_POST['track'])) {
    $complaint_id = $_POST['complaint_id'];

    // Connect to grievance_db
    $student_conn = mysqli_connect("localhost", "root", "", "grievance_db");
    if (!$student_conn) {
        $status_message = '<div class="alert alert-danger">Database connection failed!</div>';
    } else {
        $complaint_id = mysqli_real_escape_string($student_conn, $complaint_id);
        $query = mysqli_query($student_conn, "SELECT status FROM complaints WHERE complaint_id='$complaint_id'");
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $status_message = '<div class="alert alert-info">
                <strong>Status:</strong> ' . ucfirst($row['status']) . '
            </div>';
        } else {
            $status_message = '<div class="alert alert-warning">No complaint found with ID ' . htmlspecialchars($complaint_id) . '.</div>';
        }
        mysqli_close($student_conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Track Complaint - College Complaint Portal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
body { background: linear-gradient(135deg,#204975,#0f9ad6); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
.track-wrapper { background: #fff; padding: 40px 35px; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,0.25); width: 100%; max-width: 450px; text-align: center; }
.track-wrapper h2 { font-weight: 600; margin-bottom: 20px; color: #1f2933; }
.btn-primary { background: linear-gradient(90deg,#0f9ad6,#16a34a); border: none; border-radius: 50px; font-weight: 600; }
.btn-primary:hover { opacity: 0.95; }
</style>
</head>
<body>

<div class="track-wrapper">
    <h2><i class="fas fa-search mr-2"></i>Track Complaint</h2>
    <form method="post" action="">
        <div class="form-group text-left">
            <label for="complaint_id">Complaint ID</label>
            <input type="text" name="complaint_id" id="complaint_id" class="form-control" placeholder="Enter Complaint ID" required>
        </div>
        <button type="submit" name="track" class="btn btn-primary btn-block"><i class="fas fa-search mr-1"></i> Check Status</button>
    </form>

    <div class="mt-3">
        <?php echo $status_message; ?>
    </div>

    <a href="index.php" class="d-block mt-3 text-secondary"><i class="fas fa-arrow-left mr-1"></i> Back to Home</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>