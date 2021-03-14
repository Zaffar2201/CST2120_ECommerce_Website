<?php
	//Session management
	session_start();
	session_unset();   //--- Unset session variables.
	session_destroy(); //--- End Session we created earlier.
	
	//Location
	header('Location: adminlogin.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
	<head>
		<title></title>
	</head>
	<body>
	</body>
</html>