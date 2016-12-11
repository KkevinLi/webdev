<!DOCTYPE HTML>
<html>
<head>
	<title> Login Page </title>
	<?php	include "header.php";	?>
</head>
<body>
<?php
	session_start(); 
	include "navbar.php";
	
	if (isset($_SESSION["loggedin"])) {
	echo '<div class="alert alert-warning">
		  <strong>You are already logged in!</strong>  
		  </div>';
		header("refresh: 1; index.php");
	}
	else
	{
	if(isset($_POST["username"],$_POST["password"]))
	{

	
		$database = fopen("users.txt","r") or die("Unable to open File");
		while(!feof($database))
		{
			$line = fgets($database);
			if(($_POST["username"] . " " . $_POST["password"] .PHP_EOL) == $line)
			{
				$_SESSION["loggedin"] = true;
				echo "Successfully Logged In! Redirecting back to home in 2 seconds...";
				fclose($database);
				header("refresh: 2; index.php");
				exit(); #exit in order to stop script. break still runs script below even if using header
			}
		
		}
			echo '<div class="alert alert-warning">
				  <strong>Incorrect Combination !</strong>  Please check your username and password.
				  </div>';
				header("refresh: 2; login.php");
		
		fclose($database);
	}
	
	else
	{
		echo '	<div class="container form-signin">
			<h1>
				<p style="text-align: center;">Sign In </p>
			</h1>
			<form method="post" action="login.php">
			<div class = "input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class = "form-control" name="username" placeholder="Username"  required></div>
				<div class = "input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>		<input type="password" class = "form-control" name="password" placeholder="Password" required></div>
					
							<button type = "submit" class = "btn btn-lg btn-block btn-primary">
									Login
							</button>


						</div>
					</form>
				</body>';
		
	}

	}
	show_source("login.php");
?>
</body>
</html>