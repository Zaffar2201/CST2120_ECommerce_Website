<?php
// This page contains the codes to return the list of all staff in JSON format

//Include MongoDB database connection
require 'dbconfig.php';
    

//Find all staff
$cursor = $db->staff->find([]);

//Return the list of staff from the staff collection in JSON format
//Output each staff as a JSON object with comma in between
$jsonStr = '['; //Start of array of staff in JSON

//Work through the staff
foreach ($cursor as $staff){
    $jsonStr .= json_encode($staff);//Convert PHP representation of staff into JSON 
    $jsonStr .= ',';//Separator between staff
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';

//Echo final string
echo $jsonStr;

?>
