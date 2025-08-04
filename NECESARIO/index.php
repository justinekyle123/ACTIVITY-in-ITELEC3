<?php 
	
	include_once('connection.php');
	$error = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$rs = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password' ");
		if($rs->num_rows > 0){
			header("Location: home.php");
			exit();
		}else{
			$error = true;
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.17/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome Icons -->

</head>

<body>
      <div class="form-card">
        <h1>Login</h1>

        <?php if($error): ?>
            <div class="alert alert-danger">
                Incorrect Credentials!
            </div>
        <?php endif; ?>

        <form id="loginForm" action="index.php" method="post">
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
            </div>
            <button type="submit" name="button" class="btn">Login</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // SweetAlert for incorrect credentials (example)
        <?php if($error): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Incorrect Credentials!',
                confirmButtonColor: '#6f42c1'
            });
        <?php endif; ?>
    </script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>