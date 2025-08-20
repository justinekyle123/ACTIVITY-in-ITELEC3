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

    

    $sql = "INSERT INTO students 
    (Photo,Name, Date, Gender, Nickname, Present_address, Permanent_address, Place_of_birth, Contact_no, Date_of_birth, Email_address, Age, Religion, Citizenship, Civil_status, Weight, Height, Language_spoken, Occupation, Father_name, Father_occupation, Mother_name, Mother_occupation, Emergency_contact_person, Emergency_address, Emergency_relationship, Emergency_contact_no, Elementary_school, Elementary_years_attended, High_school, High_school_years_attended, Skills)
    VALUES 
    ( '$target_file','$name', '$date', '$gender', '$nickname', '$present_address', '$permanent_address', '$place_of_birth', '$contact_no', '$date_of_birth', '$email_address', '$age', '$religion', '$citizenship', '$civil_status', '$weight', '$height', '$language_spoken', '$occupation', '$father_name', '$father_occupation', '$mother_name', '$mother_occupation', '$emergency_contact_person', '$emergency_address', '$emergency_relationship', '$emergency_contact_no', '$elementary_school', '$elementary_years_attended', '$high_school', '$high_school_years_attended', '$skills')";


    if ($conn->query($sql) === TRUE) {
        echo"<script>
                alert('Successfully Added');
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
       body {
    background: linear-gradient(135deg, #eafaf1, #fdfcf4);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #3c3c3c;
}

.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

.form-container {
    background-color: #ffffff;
    border-radius: 15px;
    border: 2px solid #d4e9d4;
    box-shadow: 0 6px 18px rgba(100, 150, 100, 0.2);
    padding: 30px;
    position: relative;
}

.form-container::before {
    content: "🌿";
    font-size: 2rem;
    position: absolute;
    top: -15px;
    left: -15px;
}

.form-container::after {
    content: "🌾";
    font-size: 2rem;
    position: absolute;
    bottom: -15px;
    right: -15px;
}

.form-title {
    color: #2e7d32;
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
    font-size: 1.8rem;
    border-bottom: 3px solid #a5d6a7;
    display: inline-block;
    padding-bottom: 5px;
}

.section-title {
    color: #4caf50;
    font-weight: 600;
    margin-bottom: 15px;
    border-left: 5px solid #81c784;
    padding-left: 10px;
}

.form-label {
    font-weight: 500;
    color: #2e7d32;
}

textarea, input, select {
    border-radius: 10px !important;
    border: 1.5px solid #c8e6c9 !important;
}

textarea:focus, input:focus, select:focus {
    border-color: #66bb6a !important;
    box-shadow: 0 0 8px rgba(102, 187, 106, 0.5) !important;
}

.btn-primary {
    background-color: #66bb6a;
    border-color: #66bb6a;
    padding: 10px 25px;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease-in-out;
}

#btn{
    background-color: #eb0f0fff;
    border-color: #cce9cdff;
    padding: 10px 25px;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease-in-out;
}

.btn-primary:hover {
    background-color: #388e3c;
    border-color: #388e3c;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(56, 142, 60, 0.3);
}
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <a href="home.php" class="btn btn-primary" id="btn" style="float: right">Cancel</a><br>
        <h2 class="form-title">Full Student Registration</h2>
		<div class="section-divider"></div>

        <form id="studentForm" action="add.php" method="POST" enctype="multipart/form-data" class="row g-3">
          
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>