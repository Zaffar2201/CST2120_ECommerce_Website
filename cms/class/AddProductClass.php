<?php
// This page contains the codes to add a product to the Products collection

//Include MongoDB database connection
require 'dbconfig.php';

 
// Function to display a message box
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	return true;
}  

 
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	if (isset($_POST['save'])) // Check if user clicked "Save" button on addproduct page
	   {
			
			
			//Extract the data that was sent to the server and get product details
			
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
			
			
			// Check if product already exists in database before insert		
			// Create a PHP array with product id and category as search criteria
			$findCriteria = [
				"Product_id" => $product_id, 
				"Category" => $prodcat, 
			 ];
			
			 
			if ($db->Products->countDocuments($findCriteria) > 0)  // Product exists in collection 
			  {
				//Product Id and category found display error message
				phpAlert("The product id and product category specified already exists!");
			  }
			else  // Product not found. Insert in collection
			  {
				//Convert to PHP array
				$dataArray = [
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
				 
				//Select Products collection 
				$collection = $db->Products;
				
				//Add the new product to the database
				$insertResult = $collection->insertOne($dataArray);
				
				//Inform user of outcome of insert operation
				if($insertResult->getInsertedCount()==1){
					phpAlert("Product added successfully! New document id: ". $insertResult->getInsertedId());
				}
				else { // Insert operation failed
					phpAlert("Error adding new product ");
				}
			  }

	   }
 }
?>


