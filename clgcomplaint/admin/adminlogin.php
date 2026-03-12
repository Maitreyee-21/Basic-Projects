<?php 
include 'db_connect.php';
session_start();
$message = '';
$admin_conn = mysqli_connect("localhost","root","","admin_reg_db");

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($admin_conn, $_POST['username']);
    $password = md5($_POST['password']);

    $result = mysqli_query($admin_conn, "SELECT * FROM admins WHERE username='$username' AND password='$password'");

    if ($result && mysqli_num_rows($result) > 0) {

        $_SESSION['admin'] = $username;

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();

    } else {

        $message = '<div class="alert alert-danger mt-3">
        <i class="fas fa-exclamation-circle mr-2"></i>❌ Invalid credentials!
        </div>';

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - College Complaint Portal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body { font-family: "Poppins", sans-serif; background: linear-gradient(135deg, #204975, #0f9ad6); min-height: 100vh; margin: 0; display: flex; align-items: center; justify-content: center; }
    .auth-wrapper { width: 100%; max-width: 450px; background: #fff; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,0.25); padding: 40px 35px 30px; text-align: center; }
    .auth-icon { font-size: 52px; color: #0f9ad6; margin-bottom: 10px; }
    .auth-title { font-weight: 600; font-size: 28px; margin-bottom: 4px; color: #1f2933; }
    .auth-subtitle { font-size: 14px; color: #6b7280; margin-bottom: 25px; }
    .form-group label { font-weight: 500; font-size: 14px; color: #374151; }
    .input-group-text { background-color: #f3f4f6; border-right: 0; }
    .form-control { border-left: 0; box-shadow: none !important; }
    .btn-primary { background: linear-gradient(90deg,#0f9ad6,#16a34a); border: none; border-radius: 999px; font-weight: 600; }
    .btn-primary:hover { opacity: 0.95; }
    .back-link, .switch-link { font-size: 14px; color: #4b5563; display: inline-block; margin-top: 15px; }
    .back-link i { margin-right: 4px; }
  </style>
</head>
<body>
<div class="auth-wrapper">
  <div class="auth-icon"><i class="fas fa-user-shield"></i></div>
  <h2 class="auth-title">Admin Login</h2>
  <p class="auth-subtitle">College Complaint Portal</p>
  <?php echo $message; ?>

  <form action="adminlogin.php" method="post">
    <div class="form-group text-left">
      <label for="username"><i class="fas fa-user mr-1"></i> Username</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
      </div>
    </div>
    <div class="form-group text-left">
      <label for="password"><i class="fas fa-lock mr-1"></i> Password</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mt-3"><i class="fas fa-sign-in-alt mr-1"></i> Login</button>
  </form>
  <a href="../index.php" class="back-link d-block"><i class="fas fa-arrow-left"></i> Back to Home</a>
  <a href="adminreg.php" class="switch-link d-block">New admin? Create account</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
