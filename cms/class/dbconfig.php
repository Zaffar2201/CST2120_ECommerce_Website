<?php
// This page contains the codes to connecting to the database

//Include libraries. The 'vendor' folder is placed in the root directory of the ecommerce website
require __DIR__ . '/../../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Set database name
$dbname = 'ecommerce';

//Select ecommerce database
$db = $mongoClient->$dbname;

?>
