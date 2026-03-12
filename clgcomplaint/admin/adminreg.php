<?php 
include 'db_connect.php';
$message = '';

if (isset($_POST['submit'])) {
    $full_name = mysqli_real_escape_string($admin_conn, $_POST['name']);
    $email = mysqli_real_escape_string($admin_conn, $_POST['email']);
    $username = mysqli_real_escape_string($admin_conn, $_POST['username']);
    $password = md5($_POST['password']);
    
    // FIXED: Check if query succeeded FIRST
    $check_query = "SELECT * FROM admins WHERE username='$username'";
    $check = mysqli_query($admin_conn, $check_query);
    
    if ($check === false) {
        $message = '<div class="alert alert-danger mt-3"><i class="fas fa-exclamation-circle mr-2"></i>❌ Database error: ' . mysqli_error($admin_conn) . '</div>';
    } elseif (mysqli_num_rows($check) == 0) {
        $insert_query = "INSERT INTO admins(username,password,full_name,email) VALUES('$username','$password','$full_name','$email')";
        $insert = mysqli_query($admin_conn, $insert_query);
        if ($insert) {
            $message = '<div class="alert alert-success mt-3"><i class="fas fa-check-circle mr-2"></i>✅ Admin Registered Successfully! <a href="adminlogin.php" class="alert-link">Login Now</a></div>';
        } else {
            $message = '<div class="alert alert-danger mt-3"><i class="fas fa-exclamation-circle mr-2"></i>❌ Registration failed: ' . mysqli_error($admin_conn) . '</div>';
        }
    } else {
        $message = '<div class="alert alert-danger mt-3"><i class="fas fa-exclamation-circle mr-2"></i>❌ Username already exists!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Register - College Complaint Portal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body { font-family: "Poppins", sans-serif; background: linear-gradient(135deg, #204975, #0f9ad6); min-height: 100vh; margin: 0; display: flex; align-items: center; justify-content: center; }
    .auth-wrapper { width: 100%; max-width: 500px; background: #fff; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,0.25); padding: 35px 35px 28px; text-align: center; }
    .auth-icon { font-size: 52px; color: #10b981; margin-bottom: 10px; }
    .auth-title { font-weight: 600; font-size: 26px; margin-bottom: 4px; color: #1f2933; }
    .auth-subtitle { font-size: 14px; color: #6b7280; margin-bottom: 20px; }
    .form-group label { font-weight: 500; font-size: 14px; color: #374151; }
    .input-group-text { background-color: #f3f4f6; border-right: 0; }
    .form-control { border-left: 0; box-shadow: none !important; }
    .btn-success { background: linear-gradient(90deg,#10b981,#059669); border: none; border-radius: 999px; font-weight: 600; }
    .btn-success:hover { opacity: 0.95; }
    .back-link, .switch-link { font-size: 14px; color: #4b5563; display: inline-block; margin-top: 12px; }
  </style>
</head>
<body>
<div class="auth-wrapper">
  <div class="auth-icon"><i class="fas fa-user-plus"></i></div>
  <h2 class="auth-title">Admin Registration</h2>
  <p class="auth-subtitle">Create a new admin account</p>
  <?php echo $message; ?>

  <form action="adminreg.php" method="post">
    <div class="form-group text-left">
      <label for="name"><i class="fas fa-id-card mr-1"></i> Full Name</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" required>
      </div>
    </div>
    <div class="form-group text-left">
      <label for="email"><i class="fas fa-envelope mr-1"></i> Email</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
      </div>
    </div>
    <div class="form-group text-left">
      <label for="username"><i class="fas fa-user mr-1"></i> Username</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
        <input type="text" name="username" id="username" class="form-control" placeholder="Choose a username" required>
      </div>
    </div>
    <div class="form-group text-left">
      <label for="password"><i class="fas fa-lock mr-1"></i> Password</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
        <input type="password" name="password" id="password" class="form-control" placeholder="Create password" required>
      </div>
    </div>
    <div class="form-group text-left">
      <label for="confirm_password"><i class="fas fa-lock mr-1"></i> Confirm Password</label>
      <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re‑enter password" required>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-block mt-2"><i class="fas fa-user-check mr-1"></i> Register</button>
  </form>
  <a href="../index.php" class="back-link d-block"><i class="fas fa-arrow-left"></i> Back to Home</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.querySelector('form').addEventListener('submit', function(e) {
    var pass = document.getElementById('password').value;
    var confirm = document.getElementById('confirm_password').value;
    if(pass !== confirm) {
        e.preventDefault();
        alert('Passwords do not match!');
    }
});
</script>
</body>
</html>
