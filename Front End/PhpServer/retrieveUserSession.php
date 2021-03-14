<?php
//Start session management
session_start();

// Send current customer session
echo $_SESSION['loggedInUsername'];

?>