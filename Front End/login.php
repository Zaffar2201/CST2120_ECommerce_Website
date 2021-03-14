<?php

//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("BagKart - Login");

?>

<!--Main section of login page-->

<!--Div login form-->
<div class="login-dark">
  <div id="form">
    <!--Display bootstrap lock icon-->
    <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
    <!--Input textbox div-->
    <div class="form-group"><input class="form-control" type="text" id="lgUsername" placeholder="Username" autocomplete="off"></div>
    <div class="form-group"><input class="form-control" type="password" id="lgPassword" placeholder="Password" autocomplete="off"></div>
    <div class="form-group"><button class="btn btn-primary btn-block" onclick="login()">Log In</button></div><br><a href="register.php" class="forgot">New to BagKart?</a>
    <br>
    <center><span id="ServerResponse"></span></center>
  </div>

  <!--End of form-->


</div>


</div>



<?php

//Output the footer

outputFooter("BagKart - Login");

?>

