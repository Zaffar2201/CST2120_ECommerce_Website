<?php
//Start session management
session_start();

//Get username and password strings - need to filter input to reduce chances of SQL injection etc.
$username = filter_input(INPUT_POST, 'lgUsername', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'lgPassword', FILTER_SANITIZE_STRING);

//Load library
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select the database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->Customers;

//Find criteria
$findCriteria = [
    "Username" => $username,
    "Password" => $password
];

//Find all of the customers that match  this criteria
$count = $collection->count($findCriteria);

//Check that there is exactly one customer
if ($count == 0) {
    echo 'Invalid username or password';
    return;
} else if ($count > 1) {
    echo 'Database error: Multiple customers have same username.';
    return;
}

//Start session for this user
$_SESSION['loggedInUsername'] = $username;

//Inform web page that login is successful
echo 'Welcome back ' . $username;  
    
?>