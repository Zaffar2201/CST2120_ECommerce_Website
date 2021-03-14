<?php

//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("BagKart - Register");

?>

<!--Register div-->
<div class="register-dark">
    <div id="form">
        <!--Centered text-->
        <div class="text">
            <center>Create account</center>
        </div><br>
        <!--Input div with appropriate class styling-->
        <div class="form-group"><input class="form-control" type="text" id="registerName" placeholder="Name" autocomplete="off"></div>
        <div class="form-group"><input class="form-control" type="text" id="registerAddress" placeholder="Address" autocomplete="off"></div>
        <div class="form-group"><input class="form-control" type="phone" id="registerPhone" placeholder="Phone" autocomplete="off" size="8"></div>
        <div class="form-group"><input class="form-control" type="email" id="registerEmail" placeholder="Email" autocomplete="off"></div>
        <div class="form-group"><input class="form-control" type="text" id="registerUsername" placeholder="Username" autocomplete="off"></div>
        <div class="form-group"><input class="form-control" type="password" id="registerPassword" placeholder="Password" autocomplete="off"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" onclick="register()">Sign up</button></div><br>
        <a href="login.php" class="forgot">Already an existing member?</a><br>
        <center><span id="ServerResponse"></span></center>
    </div>
    <!--End of form-->



</div>


</div>





<?php

//Output the footer

outputFooter("BagKart - Register");

?>