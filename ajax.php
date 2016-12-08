<?php
	if(isset($_POST["checkName"]))
	{
		if(checkUsernameValid($_POST["checkName"]))
			echo ($_POST["checkName"]). " is taken";
		else
			echo ($_POST["checkName"]). " is valid";
		
	}
	
function checkUsernameValid($username)
	{
		$database = fopen("users.txt","r") or die("Unable to open File");
		while(!feof($database))
		{
			$line = explode(" ",fgets($database));
		#	if(count($line)>1){
			#echo (strlen(trim($line[1]))." ".$line[1]);
	
		#	}
			if(count($line)>1 && trim($line[0]) == $username)
				return true;
		}
	fclose($database);
	return false;
	}
	
	?>