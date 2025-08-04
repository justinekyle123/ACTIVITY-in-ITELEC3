<?php 
	
	include_once('connection.php');

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$rs = $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password' ");
		if($rs->num_rows > 0){
			header("Location: home.php");
		}else{
			echo "<script>
					alert('incorrect credentials');
				</script>";
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
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            font-family: 'Roboto', sans-serif;
        }

        .form-card {
            width: 25vw;
            max-width: 400px;
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.5s ease-out;
        }

        .form-card h1 {
            color: #2575fc;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 30px;
            border: 1px solid #ccc;
            padding: 10px 20px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.7);
        }

        .btn {
            width: 100%;
            border-radius: 30px;
            padding: 12px;
            background-color: #2575fc;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #1d65e5;
        }

        /* Animation */
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsiveness */
        @media (max-width: 600px) {
            .form-card {
                width: 80vw;
                padding: 30px 20px;
            }
        }

    </style>
</head>

<body>
    <div class="form-card">
        <h1 class="text-center">Login</h1>

        <form id="loginForm" action="index.php" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
            </div>
            <button type="submit" name="button" class="btn">Login</button>
        </form>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.17/dist/sweetalert2.all.min.js"></script>

    <script>
        // Sample validation check for empty fields
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var username = document.getElementsByName("username")[0].value;
            var password = document.getElementsByName("password")[0].value;

            if (!username || !password) {
                // Trigger SweetAlert if fields are empty
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill in both username and password!',
                    confirmButtonColor: '#2575fc'
                });
            } else {
                // Normally you would submit the form to the server
                Swal.fire({
                    icon: 'success',
                    title: 'Logged in successfully!',
                    text: 'Welcome back!',
                    confirmButtonColor: '#2575fc'
                }).then(() => {
                    // Simulate form submission (for demonstration purposes)
                    window.location.href = 'index.php'; // Redirect to home page
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
