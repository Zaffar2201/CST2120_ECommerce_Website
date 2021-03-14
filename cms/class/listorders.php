<?php
// This page contains the codes to return the list of all orders in JSON format

//Include MongoDB database connection
require 'dbconfig.php';
 
//Find all orders in the database
$cursor = $db->Orders->find([]);

//Return the list of orders from the orders collection in JSON format
echo json_encode(iterator_to_array($cursor));

?>

