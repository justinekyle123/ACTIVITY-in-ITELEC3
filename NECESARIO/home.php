<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background: #f0f4fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      background: #2c3e50;
    }
    .navbar-brand {
      font-weight: bold;
      color: #fff !important;
      font-size: 1.3rem;
    }
    .navbar-brand i {
      margin-right: 8px;
    }
    .table {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }
    .table thead {
      background: #34495e;
      color: #fff;
    }
    .table tbody tr:hover {
      background-color: #f9fbff;
    }
    .btn-school {
      border-radius: 8px;
      font-weight: 500;
    }
    .page-link {
      border-radius: 6px;
    }
    .header-section {
      text-align: center;
      margin: 30px 0 20px 0;
    }
    .header-section h2 {
      font-weight: 700;
      color: #2c3e50;
    }
    .header-section p {
      color: #7f8c8d;
    }
    .student-photo {
      border-radius: 50%;
      border: 2px solid #ddd;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">
      <i class="fas fa-school"></i> My School
    </a>
  </div>
</nav>

<div class="container">
  <div class="header-section">
    <h2><i class="fas fa-user-graduate"></i> Student List</h2>
    <p>Manage student information and records easily</p>
    <a href="add.php" class="btn btn-warning btn-school mb-3"><i class="fas fa-user-plus"></i> Add Student</a>
  </div>

  <table class="table table-bordered table-hover text-center">
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

      $limit = 8;
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      if ($page < 1) $page = 1;
      $offset = ($page - 1) * $limit;

      $countRes = $conn->query("SELECT COUNT(*) AS total FROM students");
      $countRow = $countRes->fetch_assoc();
      $total_students = $countRow['total'];
      $total_pages = ceil($total_students / $limit);

      $sql = "SELECT * FROM students ORDER BY student_id ASC LIMIT $limit OFFSET $offset";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['student_id'] . "</td>";
              echo "<td>";
              if (!empty($row['Photo'])) {
                  echo "<img src='" . $row['Photo'] . "' width='50' height='50' class='student-photo'>";
              } else {
                  echo "<i class='fas fa-user-circle fa-2x text-muted'></i>";
              }
              echo "</td>";
              echo "<td>" . $row['Name'] . "</td>";
              echo "<td>" . $row['Gender'] . "</td>";
              echo "<td>" . $row['Contact_no'] . "</td>";
              echo "<td>" . $row['Email'] . "</td>";
              echo "<td>" . $row['Age'] . "</td>";
              echo "<td>
                      <a href='edit_student.php?id=" . $row['student_id'] . "' class='btn btn-sm btn-primary btn-school'><i class='fas fa-edit'></i> Edit</a>
                      <a href='#' onclick='confirmDelete(" . $row['student_id'] . ")' class='btn btn-sm btn-danger btn-school'><i class='fas fa-trash'></i> Delete</a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='8' class='text-center'>No students found</td></tr>";
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

<script>
function confirmDelete(userId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This student record will be deleted permanently.",
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
