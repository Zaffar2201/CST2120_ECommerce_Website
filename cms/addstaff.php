<?php
// This form allows the authorised user to add a staff
// As a security measure the page is 'protected' by checking if session variable 'user_id' is set 

session_start();

if ( !isset( $_SESSION['user_id'] ) )
{
	//--- no user logged in, so redirect user to admin login page to 'protect' this page
	header("Location: adminlogin.php");
}

include_once ("class/AddStaffClass.php");

?>
<!DOCTYPE html>
<html>
    <title>Staff Maintenance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/cmsstyle.css">
    
    <body>
        <!-- Sidebar/menu -->
		<nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding dark-grey" style="z-index:3;width:200px;font-weight:bold;" id="mySidebar">
            <br>
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
            <div class="w3-container">
                <div class="w3-center"><img src="images/backpackTitle.png" width="32" height="32"><span style="color:rgba(212,175,55,1)" class="w3-small">Bag</span><span style="color:rgba(255,255,255,1)" class="w3-small">Kart</span>
            </div>
            <div class="w3-container" style="margin-top:40px">
                <h6 class="text-white"><b>Maintain</b></h6>
            </div>
            <div class="w3-bar-block"> 
                <a href="showproducts.php" class="bar-item text-small">- Products</a>
				<a href="showstaff.php" class="bar-item text-small">- Staff</a>
            </div>
			<div class="w3-container">
                <h6 class="text-white"><b>Manage</b></h6>
            </div>
			<div class="w3-bar-block"> 
                <a href="showorders.php" class="bar-item text-small">- Orders</a>
            </div>
        </nav>
        <!-- Top menu on small screens -->
        <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
            <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
        </header>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
         <div class="w3-main" style="margin-left:190px;">
            <!-- Header -->
			 <!-- Start Top Bar -->
				<div class="top-bar">
					<div>
						<ul class="menu">
							<li class="menu-text" style="padding-left:10px"><b>Add New Staff</b></li>
						</ul>
					</div>
					<div>
						<ul class="menu">
							<li>
								<a href="adminlogout.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
			 <!-- End Top Bar -->

        <div class="w3-container w3-center" id="ctnaddstaff" style="margin-top:10px">
		    <form id="formaddstaff" method = "post">
				
				<div class="form-section required">
					<label class="control-label col-label" for="staff_name">Name</label>
					<input class="form-input input-border col-25" id="staff_name" name="staff_name" type="text" class="form-control" required placeholder="staff full name" pattern="[a-zA-Z- ]+" title="Name can contain alphabets, spaces( ) and hyphen(-) only!" tabindex="1">
				</div>
				
				<div class="form-section required">
					<label class="control-label col-label" for="username">Username</label>
					<input class="form-input input-border col-25" id="username" name="username" type="text" class="form-control" required placeholder="username" pattern="[a-zA-Z0-9]+" title="Username can contain alphabets and numbers only!" tabindex="2">
				</div>
				
				<div class="form-section required">
					<label class="control-label col-label" for="password">Password</label>
					<input class="form-input input-border col-25" type="password" id="password" name="password" tabindex="3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
				</div>
					
				<div class="form-section required">
					<label class="control-label col-label" for="repassword">Confirm password</label>
					<input class="form-input input-border col-25" type="password" id="repassword" name="repassword"  class="form-control" tabindex="4" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"required oninput="check(this)">
				</div>
						
				<!-- Script to ensure that password match  --->
				<script language='javascript' type='text/javascript'>
					function check(input)
					{
						
						if (document.getElementById('repassword').value != document.getElementById('password').value)
							{
								input.setCustomValidity('Password Must be Matching.');
							}
						else
						{
						// input is valid -- reset the error message
						input.setCustomValidity('');
						}
					}
				</script>
					 
			
					
				<div class="form-section">
					<span class="text-small-11 col-note"><font color="red">* required field</font></span>
				</div>
				
				<div class="form-section">
					<button type="submit" class="button-1 padding-1 center-block w3-light-blue" name="cancel" id="cancel" tabindex="14" value="cancel" onClick="window.location.href = 'showstaff.php';">Cancel</button>
					<button type="submit" class="button-1 padding-1 center-block w3-light-blue" name="save" id="save" tabindex="15" value="save">Save</button>
				 </div>
					
            </form> <!-- End form -->              
        
		</div>
		
        <script>
			// Script to open and close sidebar
			function w3_open() {
				document.getElementById("mySidebar").style.display = "block";
				document.getElementById("myOverlay").style.display = "block";
			}
			 // Script to open and close sidebar
			function w3_close() {
				document.getElementById("mySidebar").style.display = "none";
				document.getElementById("myOverlay").style.display = "none";
			}

			// Modal Image Gallery
			function onClick(element) {
			  document.getElementById("img01").src = element.src;
			  document.getElementById("modal01").style.display = "block";
			  var captionText = document.getElementById("caption");
			  captionText.innerHTML = element.alt;
			}
		</script>
    </body>
</html>
