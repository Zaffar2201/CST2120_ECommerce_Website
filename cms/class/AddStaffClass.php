<?php
// This page contains the codes to add a staff to the staff collection

//Include MongoDB database connection
require 'dbconfig.php';

 
// Function to display a message box
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	return true;
}  

 
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	if (isset($_POST['save'])) // Check if user clicked "Save" button on addstaff page
	   {
			
			
			//Extract the data that was sent to the server and get staff details
			
			$staff_name = filter_input(INPUT_POST, 'staff_name', FILTER_SANITIZE_STRING);
		    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			
			
			// Check if staff already exists in database before insert		
			// Create a PHP array with username as search criteria
			$findCriteria = [
				"username" => $username 
			 ];
			
			 
			if ($db->staff->countDocuments($findCriteria) > 0)  // Staff exists in collection 
			  {
				//Username found display error message
				phpAlert("Username already exists!");
			  }
			else  // Username not found. Insert in collection
			  {
				//Convert to PHP array
				$staffData = [
					"name" => $staff_name, 
					"username" => $username, 
					"password" => $password
				];
				 
				//Select staff collection 
				$collection = $db->staff;
				
				//Add the new staff to the database
				$insertResult = $collection->insertOne($staffData);
				
				//Inform user of outcome of insert operation
				if($insertResult->getInsertedCount()==1){
					phpAlert("Staff details added successfully! New document id: ". $insertResult->getInsertedId());
				}
				else { // Insert operation failed
					phpAlert("Error adding new staff");
				}
			  }

	   }
 }
?>


