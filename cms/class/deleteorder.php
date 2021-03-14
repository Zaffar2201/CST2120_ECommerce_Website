<?php
// This page contains the codes to delete an order from the Orders collection

//Include MongoDB database connection
require 'dbconfig.php';

if (isset($_GET['pid'])) // Pid contains a value
  {

	//Extract parameter from URL sent to the server to get id of order to be deleted
	$pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);

	// Hold the MongoDB id
	$pid = new MongoDB\BSON\ObjectID($pid);

	//Create a PHP array with _id as search criteria to locate order in collection
	$deleteCriteria = [
		"_id" => $pid
	 ];
	 
	//Delete the order document
	$deleteRes = $db->Orders->deleteOne($deleteCriteria); 
	
	//Inform user of outcome of delete operation
	if($deleteRes->getDeletedCount() == 1)
	   {
		  echo "<script language='javascript'>
		  alert('Order successfully deleted');
		  window.location.href='../showorders.php';  
		  </script>";
	   }	
	 else
	   {
		  echo "<script language='javascript'>
		  alert('Delete operation failed');
		  window.location.href='../showorders.php';  
		  </script>";
	   }
  }

?>


