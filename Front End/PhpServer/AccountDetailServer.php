<?php
    
    //Filter username sent from account.php
    $username= filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING);
   
    //Load vendor files
    require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select the database
$db = $mongoClient->ecommerce;


//Create a PHP array with our search criteria
$findCriteria = [
    "Username" => $username, 
 ];

//Search for criteria and store in result cursor
$result = $db->Customers->find($findCriteria);

//Create a product array
$productsArray = array();

//Loop through cursor
foreach ($result as $k => $row) {

    //Add into productsArray
    array_push($productsArray, $row);
}

//Echo array in JSON format
echo json_encode($productsArray);

?>