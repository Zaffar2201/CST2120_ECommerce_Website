<?php
// This page contains the codes to check the user credentials and allow login to the CMS
// if the credentials provided correspond to the information in the database

// Create Session
session_start();

//Include MongoDB database connection
require 'dbconfig.php';

 
// Function to display a message box
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	return true;
}  

 
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	if (isset($_POST['submitlogin'])) // Check if user clicked "Login" button on CMS login page
	   {
			
			//Extract the data that was sent to the server and store values in variables $MyUsername & $MyPassword
			$MyUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$MyPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
					
			//Create a PHP array with username search criteria
			$findCriteria = [
				"username" => $MyUsername, 
			 ];
			
			// Check if user account already exists in database			
			 
			if ($db->staff->countDocuments($findCriteria) > 0)  // Account exists in collection 
			  {
				//Find id, username and password that matched this username entered
				$cursor = $db->staff->find($findCriteria);
				foreach ($cursor as $staff){
				   $username = $staff['username'];
				   $password = $staff['password'];
				   $Id       = $staff['_id'];
				}
			  }
			else  // Account does not exist. Set user username and password to ""
			  {
				$username = "";
				$password = "";
			  }

			if($MyUsername == $username && $MyPassword == $password)
			  {
				// username and password provided by user match values in database. set $_SESSION and redirect user CMS Main page
				$_SESSION['user_id'] = $Id;
				
				header('Location: cmsmain.php');
			  }
			else // username and password provided by user do not match values in database. Display an error message
			  {
				phpAlert("Wrong username or password!");
			  } 
	   }
 }
?>


