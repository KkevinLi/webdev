<!DOCTYPE HTML>
<html>
<head>
	<title> Products </title>
	<?php	include "header.php";	?>
</head>
<body style="background-color:#a2adcb">
<?php
	session_start(); 
	include "navbar.php";
	$products = array("FFXV","KH3","FFVII");
	$product = fopen("product.txt","r") or die("Unable to open File");
	echo '
				<div class = "container-fluid">
		
						<div class = "row">';
		while(!feof($product))
		{
			#echo"HI<br>";
			$line = fgets($product);
			
			if(in_array(Trim($line) ,$products))
			{
				$description = fgets($product);
				$quant = fgets($product);
				$cost = fgets($product);
				$image = fgets($product);

				echo '
							<div class = "col-md-4">
											

									<h3>'.$line.'</h3>
									<p>'.$description.'</p>
									<p> Left In Stock : '.$quant.'</p>
									<p> Price : $'.$cost.'</p>
							<img style= " max-width: 100%; max-height: 100%;" src ='.$image.'>
							</div>';
					
			}
		}
		echo '		</div>
						</div>

				</div>';
		fclose($product);
		show_source("product.php");
?>

</body>
</html>