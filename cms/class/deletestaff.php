<?php
// This page contains the codes to delete a staff from the staff collection

//Include MongoDB database connection
require 'dbconfig.php';

if (isset($_GET['sid'])) // Sid contains a value
  {

	//Extract parameter from URL sent to the server to get id of staff to be deleted
	$sid = filter_input(INPUT_GET, 'sid', FILTER_SANITIZE_STRING);

	// Hold the MongoDB id
	$sid = new MongoDB\BSON\ObjectID($sid);

	//Create a PHP array with _id as search criteria to locate staff in collection
	$deleteCriteria = [
		"_id" => $sid
	 ];
	 
	//Delete the staff document
	$deleteRes = $db->staff->deleteOne($deleteCriteria); 
	
	//Inform user of outcome of delete operation
	if($deleteRes->getDeletedCount() == 1)
	   {
		  echo "<script language='javascript'>
		  alert('Staff successfully deleted');
		  window.location.href='../showstaff.php';  
		  </script>";
	   }	
	 else
	   {
		  echo "<script language='javascript'>
		  alert('Delete operation failed');
		  window.location.href='../showstaff.php';  
		  </script>";
	   }
  }

?>


