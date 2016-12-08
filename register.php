<!DOCTYPE HTML>
<html>
<head>
	<title> Sign Up Page </title>
	<?php	include "header.php";	?>
</head>
<body>
<?php
	include "navbar.php";
	session_start(); 
	if (isset($_SESSION["loggedin"])) {
		echo '<div class="alert alert-warning">
			  <strong>You cannot register while being signed in!</strong>  
			  </div>';
			header("refresh: 1; index.php");
	}
	else
	{
	if(isset($_POST["username"],$_POST["password"]))
	{
		# $x = intval(checkUsernameValid($_POST["username"]));
		if(!checkUsernameValid($_POST["username"]))
		{
			$_SESSION["loggedin"] = true;
			$database = fopen("users.txt","a") or die ("Unable to open file");
			echo '<div class="alert alert-success">
				  <strong>Success!</strong> Registration for '.$_POST["username"]. ' is complete! Redirecting back to home in 2 seconds....
				</div>';
			fwrite($database,($_POST["username"] . " " . $_POST["password"]  .PHP_EOL));
			header("refresh: 2; index.php");
		}
		else
		{
			echo '<div class="alert alert-warning">
				  <strong>Duplicate Username!</strong> '. $_POST["username"].' is already being used.
				</div>';

			header("refresh: 2; register.php");
		}
		fclose($database);
	}
	else
	{
		echo '	<div class="container form-signin">
				<h1>
					<p style="text-align: center;">Register </p>
				</h1>
				<form method="post" action="register.php">
				<div class = "input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class = "form-control" name="username" id = "uid" placeholder="Username"  required><span id = "result" class="input-group-addon"></span></div>
				<div class = "input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input type="password" class = "form-control" name="password" placeholder="Password" required></div>
								<button type = "submit" class = "btn btn-lg btn-block btn-primary">
										Register
								</button>
							</div>
						</form>
					</body>';
	
	}
	
	}
?>
</body>
</html>