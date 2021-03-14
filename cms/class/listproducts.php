<?php
// This page contains the codes to return the list of all products in JSON format

//Include MongoDB database connection
require 'dbconfig.php';
    

//Find all products
$cursor = $db->Products->find([]);

//Return the list of products from the products collection in JSON format
//Output each product as a JSON object with comma in between
$jsonStr = '['; //Start of array of products in JSON

//Work through the products
foreach ($cursor as $product){
    $jsonStr .= json_encode($product);//Convert PHP representation of product into JSON 
    $jsonStr .= ',';//Separator between products
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';

//Echo final string
echo $jsonStr;

?>
