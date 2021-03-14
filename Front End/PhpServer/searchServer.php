<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$description = filter_input(INPUT_POST, 'searchIndex', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => ['$search' => $description]
];
//Find all of the Products that match  this criteria
$cursor = $db->Products->find($findCriteria);

//Output each Products as a JSON object with comma in between
$jsonStr = '['; //Start of array of Products in JSON

//Work through the Products
foreach ($cursor as $Products) {
    //Convert PHP representation of customer into JSON
    $jsonStr .= json_encode($Products);
    //Separator between customers
    $jsonStr .= ',';
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';

//Echo final string
echo $jsonStr;

?>