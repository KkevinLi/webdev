<!DOCTYPE HTML>
<html>
<head>
	<title> Search Results </title>
	<?php	include "header.php";	?>
</head>
<body>
<?php
	session_start(); 
	include "navbar.php";
	
	if(isset($_POST["search"]))
	{
		$product = fopen("product.txt","r") or die("Unable to open File");
		while(!feof($product))
		{
			$line = fgets($product);
			if(strtoupper(($_POST["search"] .PHP_EOL)) == $line)
			{
				$description = fgets($product);
				$quant = fgets($product);
				$cost = fgets($product);
				$image = fgets($product);

				echo '<style>
						body {
							background-image: url('.$image.');
							background-repeat: no-repeat;
							}
						</style> 
						
						<div class="caption post-content">
						<h3>'.$line.'</h3>
						<p>'.$description.'</p>
						<p> Left In Stock : '.$quant.'</p>
						<p> Price : $'.$cost.'</p>
					</div>';
				
				fclose($product);
				exit();
			}
		
		}
			echo '<div class="alert alert-warning">
				  <strong>'.$_POST["search"].' Did not bring up any matches. Our only products are KH3, FFVII and FFXV!</strong>  </div>';
		
		fclose($product);
	}
	
	else
	{
		header('Location:product.php');
	}

	show_source("search.php");
?>
</body>
</html>