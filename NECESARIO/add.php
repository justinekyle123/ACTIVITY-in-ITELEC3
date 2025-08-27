<?php
include 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $upload_dir = "upload/";
    $photo_name = time(). "_" . basename($_FILES['photo']['name']);
    $target_file = $upload_dir . $photo_name;

    if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_file)){
        $name = $_POST['name'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $place_of_birth = $_POST['place_of_birth'];
        $contact_no = $_POST['contact_no'];
        $date_of_birth = $_POST['date_of_birth'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $religion = $_POST['religion'];
        $citizenship = $_POST['citizenship'];
        $civil_status = $_POST['civil_status'];

        $sql = "INSERT INTO students 
        (Photo, Name, Date, Gender, Address, Place_of_birth, Contact_no, Date_of_birth, Email, Age, Religion, Citizenship, Civil_status)
        VALUES 
        ('$target_file', '$name', '$date', '$gender', '$address', '$place_of_birth', '$contact_no', '$date_of_birth', '$email', '$age', '$religion', '$citizenship', '$civil_status')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Added successfully');
                    window.location.href='home.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background: linear-gradient(135deg, #f0f9ff, #cbebff);
      font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
      background: #fff;
      border-radius: 15px;
      padding: 30px;
      margin: 40px auto;
      max-width: 1000px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      border: 2px solid #dee2e6;
      animation: fadeIn 0.8s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .form-title {
      text-align: center;
      font-weight: 700;
      font-size: 1.9rem;
      color: #2c3e50;
      margin-bottom: 25px;
    }
    .section-title {
      color: #34495e;
      font-weight: 600;
      margin-bottom: 15px;
      border-left: 5px solid #f1c40f;
      padding-left: 10px;
    }
    .form-label {
      font-weight: 500;
      color: #2c3e50;
    }
    .form-control, .form-select {
      border-radius: 8px;
      border: 1.5px solid #ced4da;
      transition: all 0.2s ease;
    }
    .form-control:focus, .form-select:focus {
      border-color: #2c3e50;
      box-shadow: 0 0 8px rgba(44,62,80,0.3);
      transform: scale(1.02);
    }
    .btn-primary {
      background-color: #2c3e50;
      border-color: #2c3e50;
      border-radius: 50px;
      padding: 10px 25px;
      font-weight: 600;
      transition: all 0.3s ease-in-out;
    }
    .btn-primary:hover {
      background-color: #1a252f;
      border-color: #1a252f;
      transform: scale(1.05);
    }
    /* Image Preview */
    #preview {
      margin-top: 10px;
      max-width: 120px;
      max-height: 120px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: none;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h2 class="form-title"><i class="fas fa-user-graduate"></i> Full Student Registration</h2>

    <form action="add.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

      <!-- Personal Information -->
      <div class="col-12">
        <h5 class="section-title"><i class="fas fa-id-card"></i> Personal Information</h5>
      </div>

      <div class="col-md-4">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control" accept="image/*" onchange="previewImage(event)" required>
        <img id="preview" alt="Photo Preview">
      </div>

      <div class="col-md-4">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" required>
        <div class="invalid-feedback">Please enter full name.</div>
      </div>

      <div class="col-md-4">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select" required>
          <option value="">-- Select --</option>
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
        <div class="invalid-feedback">Please select gender.</div>
      </div>

      <div class="col-md-4">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" min="5" max="99" required>
      </div>

      <div class="col-md-12">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control"></textarea>
      </div>

      <div class="col-md-4">
        <label class="form-label">Place of Birth</label>
        <input type="text" name="place_of_birth" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Contact No</label>
        <input type="tel" name="contact_no" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <!-- Additional Info -->
      <div class="col-12">
        <h5 class="section-title"><i class="fas fa-info-circle"></i> Additional Information</h5>
      </div>

      <div class="col-md-4">
        <label class="form-label">Religion</label>
        <input type="text" name="religion" class="form-control">
      </div>

      <div class="col-md-4">
        <label class="form-label">Citizenship</label>
        <input type="text" name="citizenship" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Civil Status</label>
        <select name="civil_status" class="form-select">
          <option>Single</option>
          <option>Married</option>
          <option>Widowed</option>
          <option>Separated</option>
        </select>
      </div>

      <!-- Submit -->
      <div class="col-12 text-center mt-4">
        <button type="submit" name="submit" class="btn btn-primary px-4 py-2"><i class="fas fa-save"></i> Save Student</button>
      </div>

    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Bootstrap validation
(() => {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();

// Image preview
function previewImage(event) {
  const preview = document.getElementById('preview');
  preview.src = URL.createObjectURL(event.target.files[0]);
  preview.style.display = "block";
}
</script>
</body>
</html>
