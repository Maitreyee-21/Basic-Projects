<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Grievance Portal</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

body{
margin:0;
font-family:'Poppins',sans-serif;
}

/* NAVBAR */

.navbar{
background:linear-gradient(135deg,#1e3a8a 0%,#3b82f6 50%,#60a5fa 100%);
padding:0.75rem 1rem;
}

.navbar-light .navbar-nav .nav-link{
color:#fff!important;
font-weight:500;
}

/* MARQUEE */

.marquee-bar{
background:linear-gradient(135deg,#fbd1a2,#fbb13c,#ffca3a);
color:#1a1a1a;
padding:0.8rem 0;
font-weight:600;
overflow:hidden;
}

.marquee-text{
white-space:nowrap;
display:inline-block;
padding-left:100%;
animation:marquee 15s linear infinite;
}

@keyframes marquee{
0%{transform:translateX(0);}
100%{transform:translateX(-100%);}
}

/* HERO */

.hero{
min-height:calc(100vh - 160px);
background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.4)),
url("img/m2.png") center/cover no-repeat;
display:flex;
align-items:center;
}

.hero-box{
margin-left:5%;
max-width:550px;
color:#fff;
padding:2.5rem 2rem;
background:rgba(0,0,0,0.4);
border-radius:25px;
}

.hero-box h1{
font-size:2.8rem;
margin-bottom:10px;
}

.hero-box p{
font-size:1.2rem;
margin-bottom:20px;
}

/* FEATURES */

.features-section{
padding:90px 0;
background:#f8f9fa;
}

.feature-card{
background:white;
padding:45px 35px;
border-radius:25px;
box-shadow:0 20px 40px rgba(0,0,0,0.08);
text-align:center;
transition:0.4s;
}

.feature-card:hover{
transform:translateY(-15px);
}

.feature-icon{
width:90px;
height:90px;
border-radius:50%;
background:linear-gradient(135deg,#fbb13c,#ffca3a);
color:white;
display:flex;
align-items:center;
justify-content:center;
margin:0 auto 30px;
font-size:2rem;
}

.section-title{
font-size:2.6rem;
font-weight:700;
text-align:center;
margin-bottom:10px;
}

.section-subtitle{
text-align:center;
margin-bottom:40px;
color:#6c757d;
}

/* CTA */

.cta-section{
padding:90px 0;
background:#f8f9fa;
}

/* FOOTER */

.footer{
background:#2c3e50;
color:white;
padding:70px 0 30px;
}

</style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-light sticky-top">

<a class="navbar-brand" href="#">
<img src="img/m1.png" width="60">
</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="mainNavbar">

<ul class="navbar-nav mx-auto">

<li class="nav-item">
<a class="nav-link" href="#"><i class="bi bi-house"></i> Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#footer"><i class="bi bi-info-circle"></i> About</a>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown">
<i class="bi bi-ui-checks-grid"></i> Forms
</a>

<div class="dropdown-menu">

<a class="dropdown-item" href="undertaking.php">
<i class="bi bi-file-earmark-text"></i> Undertaking
</a>

</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown">
<i class="bi bi-info-circle"></i> Information
</a>

<div class="dropdown-menu">

<a class="dropdown-item" href="img/poster1.jpg" target="_blank">
<i class="bi bi-file-earmark-image"></i> Anti-Ragging Poster
</a>

<a class="dropdown-item" href="img/poster2.jpg" target="_blank">
<i class="bi bi-file-earmark-image"></i> Complaint Redressal Mechanism
</a>

</div>
</li>

<li class="nav-item">
  <a class="nav-link" href="admin/adminlogin.php" target="_blank">
    <i class="bi bi-person-shield"></i> Admin Login
  </a>
</li>
</ul>

</div>

</nav>

<!-- MARQUEE -->

<div class="marquee-bar">
<div class="marquee-text">
<b>Your Voice Matters — Submit Your Complaint, because Every Concern Deserves Attention.</b>
</div>
</div>

<!-- HERO -->

<section class="hero">

<div class="hero-box">

<h1>Speak Up. Be Heard.</h1>

<p>Your complaints and feedback matter. Help make the college a better place for everyone.</p>

<a href="submit-complaint.php" class="btn btn-light btn-lg">
<i class="fas fa-file-alt mr-2"></i> File a Complaint
</a>

<a href="track-complaint.php" class="btn btn-outline-light btn-lg">
<i class="fas fa-search mr-2"></i> Track Status
</a>

</div>

</section>

<!-- FEATURES -->

<section class="features-section">

<div class="container">

<h2 class="section-title">Raise a Concern!</h2>
<p class="section-subtitle">A safe and transparent way to voice concerns</p>

<div class="row">

<div class="col-lg-4 col-md-6 mb-5">

<div class="feature-card">

<div class="feature-icon">
<i class="fas fa-shield-alt"></i>
</div>

<h3>Safe & Confidential</h3>

<p>Submit complaints anonymously if you prefer. Your privacy is protected.</p>

</div>

</div>

<div class="col-lg-4 col-md-6 mb-5">

<div class="feature-card">

<div class="feature-icon">
<i class="fas fa-clock"></i>
</div>

<h3>24/7 Accessibility</h3>

<p>File complaints anytime. The portal is available round the clock.</p>

</div>

</div>

<div class="col-lg-4 col-md-6 mb-5">

<div class="feature-card">

<div class="feature-icon">
<i class="fas fa-chart-line"></i>
</div>

<h3>Track Progress</h3>

<p>Monitor complaint status and updates from the administration.</p>

</div>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section class="cta-section">

<div class="container text-center">

<h2 class="section-title mb-4">Need Help?</h2>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card border-0 shadow h-100">

<div class="card-body">

<i class="fas fa-phone fa-3x text-warning mb-3"></i>

<h5>Call Us</h5>

<p>+91-XXX-XXX-XXXX</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card border-0 shadow h-100">

<div class="card-body">

<i class="fas fa-envelope fa-3x text-warning mb-3"></i>

<h5>Email Us</h5>

<p>support@college.edu</p>

</div>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card border-0 shadow h-100">

<div class="card-body">

<i class="fas fa-map-marker-alt fa-3x text-warning mb-3"></i>

<h5>Visit Us</h5>

<p>College Campus</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- FOOTER -->

<footer class="footer" id="footer">

<div class="container text-center">

<h5>Student Grievance Portal</h5>

<p>Working towards a better campus through transparent communication.</p>

<p>© 2025 Student Grievance Portal. All Rights Reserved.</p>

</div>

</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>