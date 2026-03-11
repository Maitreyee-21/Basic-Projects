<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Grievance Portal</title>

  <!-- Font & Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
    }

    /* Main navbar - Gradient blue */
    .navbar {
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
      padding: 0.75rem 1rem;
      box-shadow: 0 4px 20px rgba(30, 58, 138, 0.3);
    }
    
    .navbar-brand {
      padding: 0;
      margin-right: 1rem;
    }
    
    .logo-circle {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      overflow: hidden;
      border: 2px solid #fff;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .logo-circle img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .navbar-light .navbar-nav .nav-link,
    .navbar-light .navbar-nav .nav-link i {
      color: #fff !important;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:hover i {
      color: #fbbf24 !important;
      text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    /* Marquee bar - Golden gradient */
    .marquee-bar {
      background: linear-gradient(135deg, #fbd1a2 0%, #fbb13c 50%, #ffca3a 100%);
      color: #1a1a1a;
      padding: 0.8rem 0;
      font-weight: 600;
      font-size: 1.1rem;
      width: 100%;
      margin: 0;
      box-shadow: 0 4px 15px rgba(251, 177, 60, 0.3);
    }

    marquee {
      width: 100%;
      margin: 0;
      padding: 0;
    }

    /* Hero section with responsive m2.png (relative path) */
    .hero {
      min-height: calc(100vh - 160px);
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.4)), 
                  url("img/m2.png") 
                  center/cover no-repeat;
      display: flex;
      align-items: center;
      position: relative;
    }
    
    .hero-box {
      margin-left: 5%;
      max-width: 550px;
      color: #ffffff;
      padding: 2.5rem 2rem;
      background: rgba(0,0,0,0.4);
      border-radius: 25px;
      border: 1px solid rgba(255,255,255,0.2);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }
    
    .hero-box h1 {
      font-size: 2.8rem;
      margin: 0 0 0.75rem;
      font-weight: 700;
      line-height: 1.2;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
    }
    
    .hero-box p {
      margin: 0 0 2rem;
      font-size: 1.2rem;
      font-weight: 300;
      line-height: 1.6;
    }
    
    .hero-box .btn {
      padding: 14px 35px;
      font-size: 1.05rem;
      border-radius: 50px;
      font-weight: 600;
      margin-right: 15px;
      margin-bottom: 15px;
      transition: all 0.4s ease;
      border: none;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    
    .hero-box .btn-outline-light {
      border: 2px solid #fff;
      background: transparent;
    }
    
    .hero-box .btn:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.4);
    }

    /* Features Section */
    .features-section {
      padding: 90px 0;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .section-title {
      font-size: 2.8rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 1rem;
    }
    
    .section-subtitle {
      font-size: 1.25rem;
      color: #6c757d;
      font-weight: 400;
      max-width: 600px;
      margin: 0 auto;
    }
    
    .feature-card {
      background: white;
      padding: 45px 35px;
      border-radius: 25px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.08);
      height: 100%;
      transition: all 0.4s ease;
      border: none;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #fbb13c, #ffca3a);
    }
    
    .feature-card:hover {
      transform: translateY(-20px);
      box-shadow: 0 30px 60px rgba(0,0,0,0.15);
    }
    
    .feature-icon {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      background: linear-gradient(135deg, #fbb13c, #ffca3a);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 30px;
      font-size: 2.2rem;
      box-shadow: 0 10px 30px rgba(251, 177, 60, 0.4);
    }
    
    .feature-card h3 {
      font-size: 1.5rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 20px;
    }
    
    .feature-card p {
      color: #6c757d;
      line-height: 1.7;
      font-size: 1.05rem;
    }

    /* Stats Section - Static demo */
    .stats-section {
      padding: 90px 0;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }
    
    .stats-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 100%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
      background-size: 50px 50px;
      animation: float 20s infinite linear;
    }
    
    @keyframes float {
      0% { transform: translateY(0px) rotate(0deg); }
      100% { transform: translateY(-20px) rotate(360deg); }
    }
    
    .stat-box {
      text-align: center;
      padding: 40px 25px;
      background: rgba(255,255,255,0.15);
      border-radius: 25px;
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255,255,255,0.2);
      transition: all 0.4s ease;
      position: relative;
      z-index: 2;
    }
    
    .stat-box:hover {
      transform: translateY(-15px) scale(1.05);
      background: rgba(255,255,255,0.25);
      box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    }
    
    .stat-box h2 {
      font-size: 3rem;
      font-weight: 800;
      margin: 0 0 15px;
      color: #fff;
      text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    }
    
    .stat-box p {
      font-size: 1.2rem;
      margin: 0;
      opacity: 0.95;
      font-weight: 500;
    }

    /* CTA Section */
    .cta-section {
      padding: 90px 0;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    /* Footer */
    .footer {
      background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #1a1a2e 100%);
      color: white;
      padding: 70px 0 30px;
    }
    
    .footer h5 {
      margin-bottom: 25px;
      font-weight: 700;
      color: #fbbf24;
    }
    
    .footer ul {
      list-style: none;
      padding: 0;
    }
    
    .footer ul li {
      margin-bottom: 12px;
    }
    
    .footer a {
      color: rgba(255,255,255,0.85);
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
    }
    
    .footer a:hover {
      color: #fbbf24;
      transform: translateX(5px);
    }

    /* Responsive Design */
    @media(max-width: 1200px) {
      .hero { background-attachment: scroll; }
    }
    
    @media(max-width: 992px) {
      .section-title { font-size: 2.4rem; }
      .hero-box { margin: 0 auto; text-align: center; max-width: 90%; }
    }
    
    @media(max-width: 768px) {
      .hero { 
        min-height: 70vh; 
        padding: 50px 0;
        background-attachment: scroll !important;
      }
      .hero-box { 
        padding: 2rem 1.5rem !important;
        margin: 0 15px;
      }
      .hero-box h1 { font-size: 2.2rem; }
      .hero-box .btn { 
        display: block; 
        margin: 15px auto; 
        max-width: 300px;
      }
      .marquee-bar { 
        font-size: 1rem; 
        padding: 0.9rem 0; 
      }
      .section-title { font-size: 2.2rem; }
    }
    
    @media(max-width: 480px) {
      .hero-box h1 { font-size: 1.9rem; }
      .hero-box p { font-size: 1.1rem; }
      .feature-card, .stat-box { padding: 30px 20px; }
      .marquee-bar { font-size: 0.95rem; padding: 1rem 0; }
      .stat-box h2 { font-size: 2.2rem; }
    }

    /* Smooth scrolling */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body>

<!-- MAIN NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <a class="navbar-brand" href="#">
    <div class="logo-circle">
      <!-- logo from img folder -->
      <img src="img/m1.png" alt="Logo">
    </div>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="mainNavbar">
    <ul class="navbar-nav mx-auto justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-house"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#footer"><i class="bi bi-info-circle"></i> About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="formsDropdown" data-toggle="dropdown">
          <i class="bi bi-ui-checks-grid"></i> Forms
        </a>
        <div class="dropdown-menu dropdown-menu-right" style="background: rgba(255,255,255,0.98); box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
          <a class="dropdown-item" href="undertaking.php"><i class="bi bi-file-earmark-text"></i> Undertaking</a>
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="infoDropdown" data-toggle="dropdown">
          <i class="bi bi-info-circle"></i> Information
        </a>
       <div class="dropdown-menu dropdown-menu-right" style="background: rgba(255,255,255,0.98); box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
  <a class="dropdown-item" href="img/poster1.jpg" target="_blank"><i class="bi bi-file-earmark-image"></i> Anti-Ragging Poster</a>
  <a class="dropdown-item" href="img/poster2.jpg" target="_blank"><i class="bi bi-file-earmark-image"></i> Complaint Redressal Mechanism</a>
</div>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/adminlogin.php"><i class="bi bi-person-shield"></i> Admin Login</a>
      </li>
    </ul>
  </div>
</nav>

<!-- MARQUEE BAR -->
<div class="marquee-bar">
  <marquee behavior="scroll" direction="left">
    <b>Your Voice Matters — Submit Your Complaint, because Every Concern Deserves Attention.</b>
  </marquee>
</div>

<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-box">
    <h1>Speak Up. Be Heard.</h1>
    <p>Your complaints and feedback matter. Help make the college a better place for everyone.</p>
    
    <div>
      <a href="submit-complaint.php" class="btn btn-light btn-lg">
        <i class="fas fa-file-alt mr-2"></i> File a Complaint
      </a>
      <a href="#stats-section" class="btn btn-outline-light btn-lg">
        <i class="fas fa-search mr-2"></i> Track Status
      </a>
    </div>
  </div>
</section>

<!-- FEATURES SECTION -->
<section class="features-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-12 text-center">
        <h2 class="section-title">Raise a Concern!</h2>
        <p class="section-subtitle">A safe, transparent, and efficient way to voice your concerns</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="feature-card h-100">
          <div class="feature-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3>Safe & Confidential</h3>
          <p>Submit complaints anonymously if you prefer. Your privacy and safety are top priorities.</p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="feature-card h-100">
          <div class="feature-icon">
            <i class="fas fa-clock"></i>
          </div>
          <h3>24/7 Accessibility</h3>
          <p>File complaints anytime, anywhere. The portal is available round the clock for convenience.</p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="feature-card h-100">
          <div class="feature-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <h3>Track Progress</h3>
          <p>Monitor complaint status in real-time and receive updates from the administration.</p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="feature-card h-100">
          <div class="feature-icon">
            <i class="fas fa-bolt"></i>
          </div>
          <h3>Quick Response</h3>
          <p>A dedicated team ensures prompt action on all complaints with regular follow-ups.</p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="feature-card h-100">
          <div class="feature-icon">
            <i class="fas fa-users"></i>
          </div>
          <h3>Multiple Categories</h3>
          <p>Report academic, infrastructure, harassment, and other issues through categorized forms.</p>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="feature-card h-100">
          <div class="feature-icon">
            <i class="fas fa-check-circle"></i>
          </div>
          <h3>Verified Actions</h3>
          <p>Each complaint is reviewed and actions are taken with complete transparency.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LIVE Stats Section - ERROR-PROOF -->
<section class="stats-section" id="stats-section">
  <div class="container">
    <div class="row">
      <?php
      $total = $pending = $progress = $resolved = 0;
      
      $conn = @mysqli_connect("localhost", "root", "", "grievance_db"); // @ hides errors
      
      if ($conn) {
        $total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints"))['count'] ?? 0;
        $pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE status='pending'"))['count'] ?? 0;
        $progress = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE status='in_progress'"))['count'] ?? 0;
        $resolved = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM complaints WHERE status='resolved'"))['count'] ?? 0;
        mysqli_close($conn);
      }
      ?>
      
      <div class="col-md-3 col-sm-6">
        <div class="stat-box">
          <h2><i class="fas fa-file-alt"></i> <?php echo $total; ?></h2>
          <p>Total Complaints</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="stat-box">
          <h2><i class="fas fa-hourglass-half"></i> <?php echo $pending; ?></h2>
          <p>Pending Review</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="stat-box">
          <h2><i class="fas fa-spinner"></i> <?php echo $progress; ?></h2>
          <p>In Progress</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="stat-box">
          <h2><i class="fas fa-check-circle"></i> <?php echo $resolved; ?></h2>
          <p>Resolved</p>
        </div>
      </div>
    </div>
  </div>
</section>


<script>setInterval(() => location.reload(), 30000);</script>

<!-- CTA SECTION -->
<section class="cta-section">
  <div class="container text-center">
    <h2 class="section-title mb-4">Need Help?</h2>
    <p class="section-subtitle mb-5">The support team is available to assist with any questions or concerns.</p>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow h-100" style="transition: all 0.3s ease;">
          <div class="card-body">
            <i class="fas fa-phone fa-3x text-warning mb-3"></i>
            <h5 class="text-dark font-weight-bold">Call Us</h5>
            <p class="lead font-weight-500">+91-XXX-XXX-XXXX</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow h-100" style="transition: all 0.3s ease;">
          <div class="card-body">
            <i class="fas fa-envelope fa-3x text-warning mb-3"></i>
            <h5 class="text-dark font-weight-bold">Email Us</h5>
            <p class="lead font-weight-500">support@college.edu</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow h-100" style="transition: all 0.3s ease;">
          <div class="card-body">
            <i class="fas fa-map-marker-alt fa-3x text-warning mb-3"></i>
            <h5 class="text-dark font-weight-bold">Visit Us</h5>
            <p class="lead font-weight-500">College Campus, Admin Block</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5><i class="fas fa-university mr-2"></i> Student Grievance Portal</h5>
        <p>Working towards a better campus through transparent communication and prompt action.</p>
      </div>
      <div class="col-md-4 mb-4">
        <h5>Quick Links</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#footer">About Us</a></li>
          <li><a href="guidelines.php">Guidelines</a></li>
          <li><a href="submit-complaint.php">Submit Complaint</a></li>
          <li><a href="track-complaint.php">Track Complaint</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-4">
        <h5>Contact Info</h5>
        <ul>
          <li><i class="fas fa-phone mr-2"></i> +91-XXX-XXX-XXXX</li>
          <li><i class="fas fa-envelope mr-2"></i> support@college.edu</li>
          <li><i class="fas fa-map-marker-alt mr-2"></i> College Campus</li>
        </ul>
        <div class="mt-4">
          <a href="#" class="text-warning mr-4" style="font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-warning mr-4" style="font-size: 1.5rem;"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-warning" style="font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <hr style="background-color: rgba(255,255,255,0.2); border: none; height: 1px;">
    <div class="row">
      <div class="col-12 text-center mt-4">
        <p>&copy; 2025 Student Grievance Portal. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
