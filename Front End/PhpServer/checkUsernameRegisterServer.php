<?php


//Get username and password strings - need to filter input to reduce chances of SQL injection etc.
$custUsername = filter_input(INPUT_POST, 'custUsername', FILTER_SANITIZE_STRING);

//Load library
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select the collection 
$collection = $db->Customers;

//Find criteria
$findCriteria = [
    "Username" => $custUsername
];


//Find all of the customers that match  this criteria
$count = $collection->count($findCriteria);


//Check that there is exactly one customer
if ($count == 0) {
    echo 'ok';
} else {
    echo 'Username is already taken!';
}
   
?>