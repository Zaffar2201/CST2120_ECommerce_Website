<?php
// This page contains the codes to edit a staff from the staff collection

//Include MongoDB database connection
require 'dbconfig.php';

 
// Function to display a message box
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	return true;
}  

if (isset($_GET['sid'])) // Sid has contains a value
  {

	//Extract parameter from URL sent to the server to get id of staff to be edited
	$sid = filter_input(INPUT_GET, 'sid', FILTER_SANITIZE_STRING);

	// Hold the MongoDB id
	$sid = new MongoDB\BSON\ObjectID($sid);

	//Create a PHP array with _id as search criteria to locate staff in collection
	$findCriteria = [
		"_id" => $sid
	 ];
 
  }

if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
	if (isset($_POST['save'])) // User has clicked the "Save" button
	  {
		  //Extract staff details
		  $staff_name = filter_input(INPUT_POST, 'staff_name', FILTER_SANITIZE_STRING);
		  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

		  //Replace document with MongoDB id = $sid
		  $replaceCriteria = [
			 "_id" => $sid
		  ];
		  
		  //Data to replace
		  $staffData = [
			"name" => $staff_name, 
			"username" => $username, 
			"password" => $password
		  ];
		  
		 //Replace staff data for this ID
		 $updateRes = $db->staff->replaceOne($replaceCriteria, $staffData);
		 
		 //Inform user of outcome of update operation
		 if($updateRes->getModifiedCount() == 1)
		   {
			  echo "<script language='javascript'>
			  alert('Staff details successfully updated');
			  window.location.href='showstaff.php';  
			  </script>";
		   }	
		 else
			echo phpAlert("Failed to update staff details");
	  }	
	
	if (isset($_POST['cancel']))
	  {
		  // User has clicked the "cancel" button. Redirect user to the staff list
		  header('Location: showstaff.php');
	  }	
	
  }

?>


