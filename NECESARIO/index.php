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
<html>
<head>
	<title></title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
		<div class="form-card p-4 shadow pb-5">
			<h1 class="text-center mb-4">Login</h1>

			<form action="index.php" method="post">
				<div class="mb-3">
					<label class="form-label">Username</label>
	    			<input type="text" name="username" placeholder="Enter Username" class="form-control">
	 			</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" placeholder="Enter Password" class="form-control">
				</div>
				<button type="submit" name="button" class="btn btn-primary">
					Login
				</button>
			</form>
		</div>
</body>

	<style type="text/css">
		.form-card{
			width: 20vw;
			border-radius: 20px;
		}
		.btn{
			width: 100%;
		}
		body{
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</html>

