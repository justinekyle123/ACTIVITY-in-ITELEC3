<?php

include 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

     $name = $_POST['name'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $nickname = $_POST['nickname'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $place_of_birth = $_POST['place_of_birth'];
    $contact_no = $_POST['contact_no'];
    $date_of_birth = $_POST['date_of_birth'];
    $email_address = $_POST['email_address'];
    $age = $_POST['age'];
    $religion = $_POST['religion'];
    $citizenship = $_POST['citizenship'];
    $civil_status = $_POST['civil_status'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $language_spoken = $_POST['language_spoken'];
    $occupation = $_POST['occupation'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $emergency_contact_person = $_POST['emergency_contact_person'];
    $emergency_address = $_POST['emergency_address'];
    $emergency_relationship = $_POST['emergency_relationship'];
    $emergency_contact_no = $_POST['emergency_contact_no'];
    $elementary_school = $_POST['elementary_school'];
    $elementary_years_attended = $_POST['elementary_years_attended'];
    $high_school = $_POST['high_school'];
    $high_school_years_attended = $_POST['high_school_years_attended'];
    $skills = $_POST['skills'];

    $stmt->prepare("insert INTO students ( Name, Date, Gender, Nickname, Present_address, Permanent_address, Place_of_birth, Contact_no, Date_of_birth, Email_address, Age, Religion, Citizenship, Civil_status, Weight, Height, Language_spoken, Occupation, Father_name, Father_occupation, Mother_name, Mother_occupation, Emergency_contact_person, Emergency_address, Emergency_relationship, Emergency_contact_no, Elementary_school, Elementary_years_attended, High_school, High_school_years_attended, Skills) 
        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssisssddssssssssssssssss",
        $name, $date, $gender, $nickname, $present_address, $permanent_address, $place_of_birth, $contact_no, $date_of_birth, $email_address, $age, $religion, $citizenship, $civil_status, $weight, $height, $language_spoken, $occupation, $father_name, $father_occupation, $mother_name, $mother_occupation, $emergency_contact_person, $emergency_address, $emergency_relationship, $emergency_contact_no, $elementary_school, $elementary_years_attended, $high_school, $high_school_years_attended, $skills);
    
        if($stmt->execute()){
            echo 'Success';
        }else{
            echo "❌ Error: " . $stmt->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .form-title {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 5px;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .section-divider {
            border-top: 2px solid #e9ecef;
            margin: 25px 0;
            padding-top: 15px;
        }
        .section-title {
            color: #3498db;
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="form-title">Full Student Registration</h2>
		<div class="section-divider"></div>
        <form id="studentForm" action="insert_student.php" method="POST" enctype="multipart/form-data" class="row g-3">
            
            <!-- Personal Information Section -->
            <div class="col-12">
                <h5 class="section-title">Personal Information</h5>
            </div>
            
            <div class="col-md-4 ">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" id="photoInput" class="form-control" accept="image/*" required>
                <small class="text-muted">Max size: 2MB (JPG, PNG only)</small>
                <div id="photoPreview" class="mt-2" style="display: none;">
                    <img id="previewImage" src="#" alt="Photo Preview" style="max-width: 150px; max-height: 150px; border-radius: 5px;">
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="">-- Select --</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Nickname</label>
                <input type="text" name="nickname" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" min="5" max="99" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Present Address</label>
                <textarea name="present_address" class="form-control" required></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Permanent Address</label>
                <textarea name="permanent_address" class="form-control"></textarea>
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
                <input type="email" name="email_address" class="form-control" required>
            </div>

            <!-- Additional Information Section -->
            <div class="col-12 section-divider">
                <h5 class="section-title">Additional Information</h5>
            </div>

            <div class="col-md-3">
                <label class="form-label">Religion</label>
                <input type="text" name="religion" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Citizenship</label>
                <input type="text" name="citizenship" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Civil Status</label>
                <select name="civil_status" class="form-select">
                    <option>Single</option>
                    <option>Married</option>
                    <option>Widowed</option>
                    <option>Separated</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Language Spoken</label>
                <input type="text" name="language_spoken" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Weight (kg)</label>
                <input type="number" step="0.01" name="weight" class="form-control" min="20" max="200">
            </div>

            <div class="col-md-3">
                <label class="form-label">Height (cm)</label>
                <input type="number" step="0.01" name="height" class="form-control" min="100" max="250">
            </div>

            <div class="col-md-3">
                <label class="form-label">Occupation</label>
                <input type="text" name="occupation" class="form-control">
            </div>

            <!-- Family Information Section -->
            <div class="col-12 section-divider">
                <h5 class="section-title">Family Information</h5>
            </div>

            <div class="col-md-6">
                <label class="form-label">Father's Name</label>
                <input type="text" name="father_name" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Father's Occupation</label>
                <input type="text" name="father_occupation" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Mother's Name</label>
                <input type="text" name="mother_name" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Mother's Occupation</label>
                <input type="text" name="mother_occupation" class="form-control">
            </div>

            <!-- Emergency Contact Section -->
            <div class="col-12 section-divider">
                <h5 class="section-title">Emergency Contact</h5>
            </div>

            <div class="col-md-4">
                <label class="form-label">Emergency Contact Person</label>
                <input type="text" name="emergency_contact_person" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Emergency Relationship</label>
                <input type="text" name="emergency_relationship" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Emergency Contact No</label>
                <input type="tel" name="emergency_contact_no" class="form-control" required>
            </div>

            <div class="col-12">
                <label class="form-label">Emergency Address</label>
                <textarea name="emergency_address" class="form-control" required></textarea>
            </div>

            <!-- Educational Background Section -->
            <div class="col-12 section-divider">
                <h5 class="section-title">Educational Background</h5>
            </div>

            <div class="col-md-6">
                <label class="form-label">Elementary School</label>
                <input type="text" name="elementary_school" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Elementary Years Attended</label>
                <input type="text" name="elementary_years_attended" class="form-control" placeholder="e.g. 2010-2016">
            </div>

            <div class="col-md-6">
                <label class="form-label">High School</label>
                <input type="text" name="high_school" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">High School Years Attended</label>
                <input type="text" name="high_school_years_attended" class="form-control" placeholder="e.g. 2016-2020">
            </div>

            <!-- Skills Section -->
            <div class="col-12 section-divider">
                <h5 class="section-title">Skills & Talents</h5>
            </div>

            <div class="col-12">
                <label class="form-label">Skills</label>
                <textarea name="skills" class="form-control" placeholder="List your skills"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="col-12 text-center mt-4">
                <button type="submit" name="submit" class="btn btn-primary px-4 py-2">Save Student</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Photo preview functionality
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('previewImage');
                preview.src = event.target.result;
                document.getElementById('photoPreview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Form validation
    document.getElementById("studentForm").addEventListener("submit", function(e) {
        // Validate photo
        const fileInput = document.querySelector('input[name="photo"]');
        const file = fileInput.files[0];
        
        if (file) {
            const allowedTypes = ["image/jpeg", "image/png"];
            const maxSize = 2 * 1024 * 1024; // 2MB
            
            if (!allowedTypes.includes(file.type)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type',
                    text: 'Only JPG and PNG images are allowed!'
                });
                return;
            }
            
            if (file.size > maxSize) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'File Too Large',
                    text: 'Maximum file size is 2MB!'
                });
                return;
            }
        }
        
        // Validate contact numbers
        const contactNo = document.querySelector('input[name="contact_no"]').value;
        const emergencyContactNo = document.querySelector('input[name="emergency_contact_no"]').value;
        
        if (!/^[\d\s\-+]+$/.test(contactNo)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Invalid Contact Number',
                text: 'Please enter a valid phone number!'
            });
            return;
        }
        
        if (!/^[\d\s\-+]+$/.test(emergencyContactNo)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Invalid Emergency Contact Number',
                text: 'Please enter a valid phone number!'
            });
            return;
        }
        
        // Validate email
        const email = document.querySelector('input[name="email_address"]').value;
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Invalid Email',
                text: 'Please enter a valid email address!'
            });
            return;
        }
        
        // If all validations pass, show success message
        Swal.fire({
            icon: 'success',
            title: 'Form Submitted',
            text: 'Student information is being processed...',
            timer: 2000,
            showConfirmButton: false
        });
    });

    // Calculate age from date of birth
    document.querySelector('input[name="date_of_birth"]').addEventListener('change', function() {
        const dob = new Date(this.value);
        if (!isNaN(dob.getTime())) {
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.querySelector('input[name="age"]').value = age;
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>