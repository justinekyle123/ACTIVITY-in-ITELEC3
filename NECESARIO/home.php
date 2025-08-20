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

        $sql = "SELECT * FROM students ORDER BY Student_id DESC";
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
                        <a href='delete_student.php?id=" . $row['Student_id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No students found</td></tr>";
        }
        ?>


    <style>
       

    </style>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
