<?php
//Get name and address strings - need to filter input to reduce chances of SQL injection etc.
$name = filter_input(INPUT_POST, 'registerName', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'registerAddress', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'registerPhone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'registerEmail', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'registerUsername', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'registerPassword', FILTER_SANITIZE_STRING);

//Check query parameters 
if ($name == "" && $address == "" && $phone == "" && $email == "" && $username == "" && $password == "") {

    echo 'Registration data missing';

    //Prevent additional code to execute
    return;
}

// Load library
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->Customers;

// Find criteria
$findCriteria = [
    "Username" => $username
];

// Determine number of result obtained
$count = $collection->count($findCriteria);

//Prevent duplicate username
if ($count != 0) {
    echo 'Username is already taken!';
    return;
}
// Customer Array to add in db
$customerArray = [
    "Name" => $name,
    "Address" => $address,
    "Phone" => $phone,
    "Email" => $email,
    "Username" => $username,
    "Password" => $password

];



//Add the new customer to the database
$insertResult = $collection->insertOne($customerArray);

//Echo result back to user
if ($insertResult->getInsertedCount() == 1) {
    echo 'Thank you for registering ' . $name;
} else {
    echo 'Error adding customer';
}

?>

