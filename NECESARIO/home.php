<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>


    <!---------------------------------------------------- Main Content----------------------------------------- -->
    
<div class="container">
    <h2 class="mb-4">Student List</h2>
    <a href="add.php" class="btn btn-warning mb-1">Add Student</a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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

        $limit = 5;

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
        echo "<td>" . $row['Student_id'] . "</td>";
        echo "<td>";
        if (!empty($row['Photo'])) {
            echo "<img src='" . $row['Photo'] . "' width='50' height='50' style='object-fit:cover; border-radius:50%;'>";
        } else {
            echo "No Photo";
        }
        echo "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "<td>" . $row['Contact_no'] . "</td>";
        echo "<td>" . $row['Email_address'] . "</td>";
        echo "<td>" . $row['Age'] . "</td>";
        echo "<td>
                <a href='edit_student.php?id=" . $row['Student_id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                <a href='#' onclick='confirmDelete(" . $row['Student_id'] . ")' class='btn btn-sm btn-danger'>Delete</a>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center'>No students found</td></tr>";
}

 ?>
<!-- Pagination Links -->
 <nav>
  <ul class="pagination">
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
            // redirect to PHP delete page
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
