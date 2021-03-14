<?php
// This page contains the codes to edit a product from the Products collection

//Include MongoDB database connection
require 'dbconfig.php';

 
// Function to display a message box
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	return true;
}  

if (isset($_GET['pid'])) // Pid has contains a value
  {

	//Extract parameter from URL sent to the server to get id of product to be edited
	$pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);

	// Hold the MongoDB id
	$pid = new MongoDB\BSON\ObjectID($pid);

	//Create a PHP array with _id as search criteria to locate product in collection
	$findCriteria = [
		"_id" => $pid
	 ];
 
  }

if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
	if (isset($_POST['save'])) // User has clicked the "Save" button
	  {
		  //Extract product details
		  $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);
		  $prodcat = filter_input(INPUT_POST, 'prodcat', FILTER_SANITIZE_STRING);
		  $brandname = filter_input(INPUT_POST, 'brandname', FILTER_SANITIZE_STRING);
		  $imageid = filter_input(INPUT_POST, 'imageid', FILTER_SANITIZE_STRING);
		  $imageurl = filter_input(INPUT_POST, 'imageurl', FILTER_SANITIZE_STRING);
		  $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
		  $prodtitle = filter_input(INPUT_POST, 'prodtitle', FILTER_SANITIZE_STRING);
		  $prodintro = filter_input(INPUT_POST, 'prodintro', FILTER_SANITIZE_STRING);
		  $proddesc = filter_input(INPUT_POST, 'proddesc', FILTER_SANITIZE_STRING);
		  $releasedate = filter_input(INPUT_POST, 'releasedate', FILTER_SANITIZE_STRING);
		  $prodcolour = filter_input(INPUT_POST, 'prodcolour', FILTER_SANITIZE_STRING);
		  $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
		  $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
		
		  //Replace document with MongoDB id = $pid
		  $replaceCriteria = [
			 "_id" => $pid
		  ];
		  
		  //Data to replace
		  $productData = [
			"Product_id" => $product_id, 
			"Category" => $prodcat, 
			"Brand_name" => $brandname,
			"Image_id" => $imageid,
			"Image_url" => $imageurl,
			"Model_number" => $model,
			"Title" => $prodtitle,
			"Intro" => $prodintro,
			"Description" => $proddesc,
			"Release_date" => $releasedate,
			"Color" => $prodcolour,
			"Price" => $price,
			"Quantity" => $quantity
		  ];
		  
		 //Replace product data for this ID
		 $updateRes = $db->Products->replaceOne($replaceCriteria, $productData);
		 
		 //Inform user of outcome of update operation
		 if($updateRes->getModifiedCount() == 1)
		   {
			  echo "<script language='javascript'>
			  alert('Product successfully updated');
			  window.location.href='showproducts.php';  
			  </script>";
		   }	
		 else
			echo phpAlert("Product updated failed");
	  }	
	
	if (isset($_POST['cancel']))
	  {
		  // User has clicked the "cancel" button. Redirect user to the product list
		  header('Location: showproducts.php');
	  }	
	
  }

?>


