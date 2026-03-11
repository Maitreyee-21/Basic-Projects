<?php
if ($_POST) {
    $conn = mysqli_connect("localhost", "root", "", "grievance_db");
    
    $complaint_id = 'CMP' . date('Ymd') . rand(100,999);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $incident_date = $_POST['incident_date'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    $sql = "INSERT INTO complaints (complaint_id, full_name, reg_no, department, email, category, incident_date, description) 
            VALUES ('$complaint_id', '$full_name', '$reg_no', '$department', '$email', '$category', '$incident_date', '$description')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<!DOCTYPE html>
        <html><head><title>Success</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
        <style>body{font-family:Poppins;padding:50px;background:#f8f9fa;}</style></head>
        <body class='text-center'>
            <i class='fas fa-check-circle' style='font-size:5rem;color:#10b981;'></i>
            <h2>Complaint Submitted!</h2>
            <p><strong>Complaint ID: $complaint_id</strong></p>
            <p>Save this ID to track status.</p>
            <a href='index.php' class='btn btn-primary btn-lg'>Back to Home</a>
        </body></html>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    exit;
}
?>
