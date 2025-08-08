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
            <button type="submit" name="button" class="btn mb-3">Login</button>
            <p class="text-center">You dont have account yet? <a href="">Register</a></p>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <style type="text/css">
        body {
            background-image: url('awad.gif'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .form-card {
            background-color: transparent;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            backdrop-filter: blur(25px);
            
        }

        .form-card h1 {
            margin-bottom: 30px;
            color: #fff;
        }

        .form-card p{
            color: white;
        }

        .form-card a{
            color: orangered;
            text-decoration: none;
        }
        hr{
            color: white;
        }

        .alert-danger {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .form-card .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        .form-card .form-control:focus {
            border-color: black ;
            box-shadow: 0 0 3px black;
        }

        .form-card .btn {
            width: 100%;
            background-color:white ;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;

        }

        .form-card .btn:hover {
            background-color: white;
            transform:scale(1.01);
            color: black;
        }

        .form-card .btn:focus {
            opacity: .9;
            outline: none;
            background-color: black;
            color: white;
        }

        
        .form-card .input-group-text {
            background-color: black;
            color: white;
            border-radius: 5px 0 0 5px;
            padding: 11px; 
        }

        .input-group-text i{
            padding: 5px;
        }

        .form-card .input-group .form-control {
            border-left: none;
            border-radius: 5px;
            padding-left: 12px; 
        }


        .form-card .input-group .form-control::placeholder {
            padding-left: 2px; 
        }

        span{
            height: 50%;
        }
    </style>

</body>
</html>