<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select the database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$sessionStorageJsonFormat = $_POST['sessionStorage'];
$totalPrice = $_POST['total'];

//Start session management
session_start();


// Retrieve current customer session
if( array_key_exists("loggedInUsername", $_SESSION) ){
    
    //Store in username variable
    $username= $_SESSION['loggedInUsername'];
}
else{
    echo 'Not logged in';
    //Prevent below code to execute
    return;
}
// Retrieve current date and time
$currentDate = date("Y/m/d");
$currentTime= date("h:i");

//Array to add into db
$checkoutArray=[
    "customerUsername"=> $username,
    "date"=> $currentDate,
    "time"=> $currentTime,
    "total"=> $totalPrice,
    // Convert into perfer JSOn format
    "products"=>json_decode($sessionStorageJsonFormat)
    
];

//Select the order collection 
$collection = $db->Orders;

//Add the new product to the database
$insertResult = $collection->insertOne($checkoutArray);

   
    //Echo result back to user
if($insertResult->getInsertedCount()==1){
echo 'good';
}
else {
echo 'Error';
}
?>