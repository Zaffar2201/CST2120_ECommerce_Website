<?php
    //Start session management
    session_start();
    
    //Check if a customer is already logged in or not
    if( array_key_exists("loggedInUsername", $_SESSION) ){
        // Send appropriate confirmation message
        echo "ok";
    }
    else{
        echo 'Not logged in.';
    }

?>