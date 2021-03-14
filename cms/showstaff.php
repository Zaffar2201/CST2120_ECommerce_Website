<!--<?php
// This form displays the list of staff and allows the authorised user to add, edit and delete staff details.
// As a security measure the page is 'protected' by checking if session variable 'user_error' is set

session_start();

if ( !isset( $_SESSION['user_id'] ) )
{
	//--- no user logged in, so redirect user to admin login page to 'protect' this page
	header("Location: adminlogin.php");
}


?> -->
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
		
		<script>
           
            </script>
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
							<li class="menu-text" style="padding-left:10px"><b>Staff</b></li>
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

        <div class="w3-container" id="showstaff" style="margin-top:20px">
		  <span><a href="addstaff.php" style="color:#2B65EC">[Add Staff]</a></span>
		  <div id="staff" style="margin-top:5px">&nbsp;</div>
		  <!---Start AJAX --->
		  
			 <script>
				//Download staff when page loads
				window.onload = loadStaff;
				
				//Downloads JSON description of staff from server
				function loadStaff(){
					
					//Create request object 
					let request = new XMLHttpRequest();

					//Create event handler that specifies what should happen when server responds
					request.onload = () => {
						//Check HTTP status code
						if(request.status === 200){
							//Add data from server to page
							displayStaff(request.responseText);
						}
						else
							alert("Error communicating with server: " + request.status);
					};

					//Set up request and send it
					request.open("GET", "class/liststaff.php");
					request.send();
				}
				 
				//Loads staff into page
				function displayStaff(jsonStaff){
					//Convert JSON to array of staff objects
					let staffArray = JSON.parse(jsonStaff);
					
					//Create HTML table containing staff data
					let htmlStr = "<table width='500' class='table'>";
					htmlStr += "<tr class='text-small-b'>";
					htmlStr += "<td width='100'>&nbsp;</td>";
					htmlStr += "<td width='140'><div align='left'><u>Name</u></div></td>";
					htmlStr += "<td width='100'><div align='left'><u>Username</u></div></td>";
					htmlStr += "<td width='70'>&nbsp;</td>";
					htmlStr += "<td width='70'>&nbsp;</td>";
					htmlStr += "</tr>";
					
					for(let i=0; i<staffArray.length; ++i){
						htmlStr += "<tr class='text-small-11'>";
						htmlStr += "<td width='100'>&nbsp;</td>";
						htmlStr += "<td>" + staffArray[i].name + "</td>";
						htmlStr += "<td>" + staffArray[i].username + "</td>";

						// Extract id from staff ObjectId
						var strsid = JSON.stringify(staffArray[i]._id); // Store value of _id in as a string
						var slength = strsid.length - 2;
						strsid = strsid.substring(9,slength);
						
						htmlStr += "<td><a href='editstaff.php?sid=" + strsid + "' style='color:#2B65EC'>Edit</a></td>";
						htmlStr += "<td><a href='class/deletestaff.php?sid=" + strsid + "' style='color:#2B65EC'>Delete</a></td>";
						htmlStr += "</tr>";
					}
					//Finish off table and add to document
					htmlStr += "</table>";
					document.getElementById("staff").innerHTML = htmlStr;
				}
			 </script>
	  
		  <!---End AJAX --->
		  
			
        
		</div>
		
        <script>
			// Script to open and close sidebar
			function w3_open() {
				document.getElementById("mySidebar").style.display = "block";
				document.getElementById("myOverlay").style.display = "block";
			}
			 
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
