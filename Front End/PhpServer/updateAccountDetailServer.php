<?php

// Retrieve data send from client
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


// Load library
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Create a PHP array with our search criteria
$replaceCriteria = [
    "Username" => $username
];

// New customer data
$customerData = [
    "Name" => $name,
    "Address" => $address,
    "Phone" => $phone,
    "Email" => $email,
    "Username" => $username,
    "Password" => $password,

];

//Replace data
$updateResult = $db->Customers->replaceOne($replaceCriteria, $customerData);

//Echo message ti user
if ($updateResult->getModifiedCount() == 1) {
    echo 'Updated';
} else {
    echo 'Error';
}

?>