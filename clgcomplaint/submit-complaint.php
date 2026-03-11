<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>File Complaint - Student Grievance Portal</title>
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
      max-width: 900px; 
      margin: 0 auto; 
      background: rgba(255,255,255,0.95); 
      border-radius: 20px; 
      box-shadow: 0 20px 40px rgba(0,0,0,0.2); 
      overflow: hidden; 
    }
    .form-header { 
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); 
      color: white; 
      padding: 30px; 
      text-align: center; 
    }
    .form-header i { font-size: 3rem; margin-bottom: 15px; }
    .form-body { padding: 40px; }
    .form-section { 
      background: #f8f9fa; 
      padding: 25px; 
      border-radius: 15px; 
      margin-bottom: 25px; 
      border-left: 5px solid #ef4444; 
    }
    .form-label { font-weight: 600; color: #1e3a8a; margin-bottom: 10px; }
    .voice-recorder { 
      background: linear-gradient(135deg, #10b981, #059669); 
      color: white; 
      padding: 20px; 
      border-radius: 15px; 
      text-align: center; 
      margin: 20px 0; 
    }
    .btn-submit { 
      background: linear-gradient(135deg, #ef4444, #dc2626); 
      border: none; 
      border-radius: 50px; 
      font-weight: 600; 
      padding: 15px 40px; 
      font-size: 1.1rem; 
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
    .btn-submit:hover, .back-btn:hover { transform: translateY(-3px); }
  </style>
</head>
<body>
  <div class="form-container">
    <div class="form-header">
      <i class="fas fa-exclamation-triangle"></i>
      <h1>File a Complaint</h1>
      <p class="mb-0">Your voice matters - We take every complaint seriously</p>
    </div>

    <div class="form-body">
      <form action="process-complaint.php" method="post" enctype="multipart/form-data">
        <!-- Personal Details -->
        <div class="form-section">
          <h4><i class="fas fa-user text-danger mr-2"></i>Personal Information</h4>
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
              <label class="form-label"><i class="fas fa-envelope mr-1"></i>Email *</label>
              <input type="email" name="email" class="form-control" required>
            </div>
          </div>
        </div>

        <!-- Complaint Details -->
        <div class="form-section">
          <h4><i class="fas fa-info-circle text-danger mr-2"></i>Complaint Details</h4>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-list mr-1"></i>Complaint Category *</label>
              <select name="category" class="form-control" required>
                <option value="">Select Category</option>
                <option value="Academic">Academic Issues</option>
                <option value="Infrastructure">Infrastructure</option>
                <option value="Faculty">Faculty Related</option>
                <option value="Harassment">Harassment/Ragging</option>
                <option value="Administrative">Administrative</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label"><i class="fas fa-calendar mr-1"></i>Date of Incident *</label>
              <input type="date" name="incident_date" class="form-control" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <label class="form-label"><i class="fas fa-edit mr-1"></i>Complaint Description * (Max 500 words)</label>
            <textarea name="description" class="form-control" rows="5" maxlength="2000" required 
              placeholder="Please describe your complaint in detail. Include names, dates, locations, and any relevant information..."></textarea>
          </div>
        </div>

        <!-- Voice Recording -->
        <div class="voice-recorder">
          <h5><i class="fas fa-microphone mr-2"></i>Voice Recording (Optional)</h5>
          <p>Record your complaint for faster processing</p>
          <button type="button" class="btn btn-light btn-lg" id="startRecord">
            <i class="fas fa-microphone"></i> Start Recording
          </button>
          <button type="button" class="btn btn-secondary btn-lg ml-2" id="stopRecord" style="display:none;">
            <i class="fas fa-stop"></i> Stop Recording
          </button>
          <br><small class="mt-2 d-block">* Click to record, works in Chrome/Edge</small>
          <input type="hidden" name="voice_recording" id="voiceBlob">
          <audio id="audioPlayback" controls style="display:none; margin-top:10px;"></audio>
        </div>

        <!-- Attachments -->
        <div class="form-section">
          <h4><i class="fas fa-paperclip text-danger mr-2"></i>Attachments (Optional)</h4>
          <div class="form-group">
            <label class="form-label"><i class="fas fa-file mr-1"></i>Upload Evidence (PDF/JPG/PNG - Max 5MB)</label>
            <input type="file" name="attachment[]" class="form-control" multiple accept=".pdf,.jpg,.jpeg,.png">
          </div>
        </div>

        <!-- Submit Section -->
        <div class="text-center">
          <a href="index.php" class="back-btn">
            <i class="fas fa-arrow-left mr-1"></i>Back to Home
          </a>
          <button type="submit" class="btn btn-submit btn-lg">
            <i class="fas fa-paper-plane mr-2"></i>Submit Complaint
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
    let mediaRecorder;
    let audioChunks = [];
    
    // Voice Recording Functionality
    document.getElementById('startRecord').onclick = async function() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);
        audioChunks = [];
        
        mediaRecorder.ondataavailable = function(e) {
          audioChunks.push(e.data);
        };
        
        mediaRecorder.onstop = function() {
          const audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
          const reader = new FileReader();
          reader.readAsDataURL(audioBlob);
          reader.onloadend = function() {
            document.getElementById('voiceBlob').value = reader.result;
          };
          const audioUrl = URL.createObjectURL(audioBlob);
          document.getElementById('audioPlayback').src = audioUrl;
          document.getElementById('audioPlayback').style.display = 'block';
        };
        
        mediaRecorder.start();
        document.getElementById('startRecord').style.display = 'none';
        document.getElementById('stopRecord').style.display = 'inline-block';
      } catch(err) {
        alert('Microphone access denied or not supported');
      }
    };
    
    document.getElementById('stopRecord').onclick = function() {
      mediaRecorder.stop();
      document.getElementById('startRecord').style.display = 'inline-block';
      document.getElementById('stopRecord').style.display = 'none';
    };
  </script>
</body>
</html>
