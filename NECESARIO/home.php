<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f0f9ff, #cbebff);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }
    .header {
      text-align: center;
      padding: 30px 20px;
    }
    .header img {
      width: 80px;
      margin-bottom: 10px;
      border-radius: 50%;
      animation: bounce 5s infinite;
    }
    .header h2 {
      font-weight: bold;
      color: #004085;
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }
    .table-wrapper {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
      animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .table th {
      background-color: #004085 !important;
      color: #fff;
      text-align: center;
    }
    .table tbody tr:hover {
      background-color: #f1f7ff;
      transform: scale(1.01);
      transition: all 0.2s ease-in-out;
    }
    .btn-warning {
      background-color: #ffc107;
      border: none;
      transition: 0.3s;
    }
    .btn-warning:hover {
      background-color: #e0a800;
      transform: translateY(-2px);
    }
    /* Input Animation */
    input.form-control:focus {
      border-color: #004085;
      box-shadow: 0 0 8px rgba(0, 64, 133, 0.5);
      transform: scale(1.02);
      transition: all 0.2s ease-in-out;
    }
    /* Pagination */
    .pagination .page-item.active .page-link {
      background-color: #004085;
      border-color: #004085;
    }
    .pagination .page-link {
      color: #004085;
    }
    .img-thumbnail{
      border-radius:50%;
      width: 50px;
      position:absolute;
      left:1;
    }
    
  </style>
</head>
<body>
   <!---------------------------------------------NAVBAR HERE--------------------------------------->
    <nav class='navbar navbar-expand-lg bg-body-tertiary bg-primary'>
        <div class="container-fluid">
          <img src="awad.gif" class="img-thumbnail" alt="...">
          <a href='#' class='navbar-brand ' style="color:white; margin-left:55px;">Student Management</a>
        </div>
    </nav>


  <div class="container mt-4">
    <!----------------------- Header---------------------------------- -->
    <div class="header">
      <h2><i class="fas fa-school"></i> Student Management System</h2>
    </div>

    <!------------CHART-------------------------------------->
    <div class="row mb-4">
      <div class="col-md-6">
         <div class="card shadow-sm p-3">
            <h6>Student by Gender</h6>
            <canvas id='genderChart'>

            </canvas>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm p-3">
          <h6>Students by Civil Status</h6>
          <canvas id='statusChart'>

          </canvas>
        </div>
      </div>
    </div>


    <!-- Table -->
    <div class="table-wrapper">
      <div class="d-flex justify-content-between mb-3">
        <h4><i class="fas fa-users"></i> Student List</h4>
        <a href="add.php" class="btn btn-warning"><i class="fas fa-user-plus"></i> Add Student</a>
      </div>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Age</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'connection.php';
    // chart code-------------------
    $totalRes = $conn->query("SELECT COUNT(*) AS total from students ");
    $total_student = $totalRes->fetch_assoc()['total'];
    $maleRes = $conn->query("SELECT COUNT(*) AS male FROM students WHERE gender='male'");
    $maleStudents = $maleRes->fetch_assoc()['male'];
    $genderRes = $conn->query("SELECT gender, COUNT(*) AS count From students GROUP by gender " );
    $gender_data = [];
    while($row = $genderRes->fetch_assoc()){
        $gender_data[$row['gender']] = $row['count'];
    }


    //table code-------------------------------
            $limit = 8;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($page < 1) $page = 1;
            $offset = ($page - 1) * $limit;

            $countRes = $conn->query("SELECT COUNT(*) AS total FROM students");
            $countRow = $countRes->fetch_assoc();
            $total_students = $countRow['total'];
            $total_pages = ceil($total_students / $limit);

            $sql = "SELECT * FROM students ORDER BY Student_id ASC LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>";
                if (!empty($row['Photo'])) {
                  echo "<img src='" . $row['Photo'] . "' width='50' height='50' style='object-fit:cover; border-radius:50%;'>";
                } else {
                  echo "<span class='text-muted'>No Photo</span>";
                }
                echo "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['Contact_no'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Age'] . "</td>";
                echo "<td>
                        <a href='view.php?id=" . $row['student_id'] . "' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i> View</a>
                        <a href='edit_student.php?id=" . $row['student_id'] . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
                        <a href='#' onclick='confirmDelete(" . $row['student_id'] . ")' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i> Delete</a>
                      </td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='8' class='text-center text-muted'>No students found</td></tr>";
            }
          ?>
        </tbody>
      </table>

      <!-- Pagination -->
      <nav>
        <ul class="pagination justify-content-center">
          <?php if ($page > 1): ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a></li>
          <?php endif; ?>
          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>
          <?php if ($page < $total_pages): ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmDelete(userId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = 'delete_student.php?id=' + userId;
        }
      });
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-----------------------------------ChART Script---------------------------------->
<script>
    new Chart(document.gettElementById('genderChart'),{
      type: 'doughnut',
      data: {
        labels: <?php echo json_encode(array_keys($gender_data));?>,
        datasets: [{
          data: <?php echo json_encode(array_values($gender_data)); ?>,
          backgroundColor: ['#007bff','#ffc107','#28a745'] 
        }]
      }
    });
</script>

</body>
</html>
