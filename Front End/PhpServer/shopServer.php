<?php

//Load libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$result = $db->Products->find();

// Create a product array
$productsArray = array();

//Loop through array of cursor
foreach ($result as $k => $row) {

    // add into array
    array_push($productsArray, $row);
}

//Send JSON str
echo json_encode($productsArray);

?>