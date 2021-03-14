<?php
// This form allows the user to log into the BagKart Content Management System
include_once ("class/AdminLoginClass.php");
?>
<!DOCTYPE html>
<html>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/cmsstyle.css">
	
	<style>
		body {
			background-color: #333;
		}

	</style>
    
    <body>
       <!--Display main logo-->
      <div class="w3-container" style="margin-top:40px">
          <div class="w3-center"><img src="images/backpackTitle.png" width="128" height="128"><span style="color:rgba(212,175,55,1)" class="w3-xlarge">Bag</span><span style="color:rgba(238,230,230,1)" class="w3-xlarge">Kart</span>
         </div>
	  </div>	 
		
         <div class="w3-main">
            <!-- Header -->
            <div class="w3-container" style="margin-top:40px">
                <h1 class="w3-xlarge w3-center"><b style="color: #FFFFFF;">Content Management System</b></h1>
            </div>
         
            <div class="w3-container w3-center">
                <form id="loginform" method = "post">
				    <div class="form-section required">
						<input class="form-input-grey input-border center-block" id="username" name="username"  type="text" placeholder="username" tabindex="1" required>
					</div>
				
					<div class="form-section required">
						<input class="form-input-grey input-border center-block" type="password" id="password" name="password" placeholder="password" tabindex="2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
					</div>
					
					<div class="form-section">
                        <button type="submit" class="button-1 padding-1 center-block w3-light-blue" name="submitlogin" id="submitlogin" tabindex="3" value="login">Login</button>
					 </div>
					 
                </form> <!-- End form -->                
			</div>
		</div>
    </body>
</html>
