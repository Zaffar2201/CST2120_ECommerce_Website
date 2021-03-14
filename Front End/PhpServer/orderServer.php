<?php

//Load library
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select the database
$db = $mongoClient->ecommerce;

//Start session
session_start();

//FInd criteria
$findCriteria = [
    "customerUsername" => $_SESSION['loggedInUsername']
];


//Select a collection and find result
$result = $db->Orders->find($findCriteria);

//Create an orderArray
$orderArray = array();

//Loop through cursor and push into orderArray
foreach ($result as $k => $row) {

    array_push($orderArray, $row);
}

// Send orderArray back into JSON format
echo json_encode($orderArray);

 ?>

