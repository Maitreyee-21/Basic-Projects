<?php
include 'student_db.php';

if ($_POST) {
    $id = 'UND'.date('Ymd').rand(100,999);

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $academic_year = mysqli_real_escape_string($conn, $_POST['academic_year']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $decl1 = isset($_POST['declaration1']) ? 1 : 0;
    $decl2 = isset($_POST['declaration2']) ? 1 : 0;
    $decl3 = isset($_POST['declaration3']) ? 1 : 0;

    $sql = "INSERT INTO undertakings 
        (undertaking_id, full_name, reg_no, department, academic_year, email, mobile, declaration1, declaration2, declaration3)
        VALUES 
        ('$id', '$full_name', '$reg_no', '$department', '$academic_year', '$email', '$mobile', $decl1, $decl2, $decl3)";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Undertaking Submitted! ID: $id</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: ".mysqli_error($conn)."</div>";
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Undertaking Form - Student Grievance Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
      min-height: 100vh;
      padding: 20px 0;
    }
    .form-container {
      max-width: 800px;
      margin: 0 auto;
      background: rgba(255,255,255,0.95);
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.2);
      overflow: hidden;
    }
    .form-header {
      background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      color: white;
      padding: 30px;
      text-align: center;
    }
    .form-header i {
      font-size: 3rem;
      margin-bottom: 15px;
    }
    .form-body {
      padding: 40px;
    }
    .form-section {
      background: #f8f9fa;
      padding: 25px;
      border-radius: 15px;
      margin-bottom: 25px;
      border-left: 5px solid #3b82f6;
    }
    .form-label {
      font-weight: 600;
      color: #1e3a8a;
      margin-bottom: 10px;
    }
    .checkbox-group {
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
    }
    .checkbox-group input[type="checkbox"] {
      margin-right: 12px;
      margin-top: 3px;
      transform: scale(1.2);
    }
    .btn-submit {
      background: linear-gradient(135deg, #10b981, #059669);
      border: none;
      border-radius: 50px;
      font-weight: 600;
      padding: 15px 40px;
      font-size: 1.1rem;
      box-shadow: 0 10px 25px rgba(16,185,129,0.3);
    }
    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(16,185,129,0.4);
    }
    .back-btn {
      background: linear-gradient(135deg, #6b7280, #4b5563);
      border: none;
      border-radius: 50px;
      color: white;
      padding: 12px 30px;
      text-decoration: none;
      font-weight: 500;
      margin-right: 15px;
    }
    .back-btn:hover {
      color: white;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <!-- Header -->
    <div class="form-header">
      <i class="fas fa-file-signature"></i>
      <h1>Student Undertaking Form</h1>
      <p class="mb-0">I hereby declare that the information provided is true to the best of my knowledge</p>
    </div>

    <!-- Form -->
    <div class="form-body">
      <form action="undertaking.php" method="post">  <!-- Self-submit -->

        <!-- Personal Details -->
        <div class="form-section">
          <h4><i class="fas fa-user text-primary mr-2"></i>Personal Details</h4>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-user mr-1"></i>Full Name *</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-id-card mr-1"></i>Registration No. *</label>
              <input type="text" name="reg_no" class="form-control" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-building mr-1"></i>Department *</label>
              <input type="text" name="department" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-calendar mr-1"></i>Academic Year *</label>
              <select name="academic_year" class="form-control" required>
                <option value="">Select Year</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Contact Details -->
        <div class="form-section">
          <h4><i class="fas fa-phone text-success mr-2"></i>Contact Details</h4>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-envelope mr-1"></i>Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-mobile-alt mr-1"></i>Mobile No.</label>
              <input type="tel" name="mobile" class="form-control">
            </div>
          </div>
        </div>

        <!-- Undertaking Declarations -->
        <div class="form-section">
          <h4><i class="fas fa-check-circle text-warning mr-2"></i>Undertakings (Mandatory)</h4>
          
          <div class="checkbox-group">
            <input type="checkbox" name="declaration1" id="decl1" required>
            <label for="decl1" class="form-label mb-0">
              I declare that the information provided above is true and correct to the best of my knowledge.
            </label>
          </div>

          <div class="checkbox-group">
            <input type="checkbox" name="declaration2" id="decl2" required>
            <label for="decl2" class="form-label mb-0">
              I understand that false information may lead to disciplinary action.
            </label>
          </div>

          <div class="checkbox-group">
            <input type="checkbox" name="declaration3" id="decl3" required>
            <label for="decl3" class="form-label mb-0">
              I agree to abide by the college rules and regulations.
            </label>
          </div>
        </div>

        <!-- Submit Section -->
        <div class="text-center">
          <a href="index.php" class="back-btn">
            <i class="fas fa-arrow-left mr-1"></i>Back to Home
          </a>
          <button type="submit" class="btn-submit">
            <i class="fas fa-file-signature mr-2"></i>Submit Undertaking
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
