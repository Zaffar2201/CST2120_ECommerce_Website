<!--<?php
// This form displays the list of orders and allows the authorised user to delete orders.
// As a security measure the page is 'protected' by checking if session variable 'user_id' is set 

session_start();

if ( !isset( $_SESSION['user_id'] ) )
{
	//--- no user logged in, so redirect user to admin login page to 'protect' this page
	header("Location: adminlogin.php");
}


?> -->
<!DOCTYPE html>
<html>
    <title>Order Management</title>
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
							<li class="menu-text" style="padding-left:10px"><b>Orders</b></li>
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

        <div class="w3-container" id="showorders" style="margin-top:20px">
		  <span>&nbsp;</span>
		  <div id="orders" style="margin-top:5px">&nbsp;</div>
		  <!---Start AJAX --->
		  
			 <script>
				//Download orders when page loads
				window.onload = loadOrders;
				
				//Downloads JSON description of orders from server
				function loadOrders(){
					
					//Create request object 
					let request = new XMLHttpRequest();

					//Create event handler that specifies what should happen when server responds
					request.onload = () => {
						//Check HTTP status code
						if(request.status === 200){
							//Add data from server to page
							displayOrders(request.responseText);
						}
						else
							alert("Error communicating with server: " + request.status);
					};

					//Set up request and send it
					request.open("GET", "class/listorders.php");
					request.send();
				}
				 
				 
				//Loads orders into page
				function displayOrders(jsonOrders){
					//Convert JSON to array of order objects
					let orderArray = JSON.parse(jsonOrders);
					
					//Create HTML table containing order data
					let htmlStr = "<table width='610' class='table'>";
					htmlStr += "<tr class='text-small-b'>";
					htmlStr += "<td width='10'>&nbsp;</td>";
					htmlStr += "<td width='70'><div align='left'><u>#</u></div></td>";
					htmlStr += "<td width='100'><div align='left'><u>Order Date</u></div></td>";
					htmlStr += "<td width='100'><div align='left'><u>Order Time</u></div></td>";
					htmlStr += "<td width='120'><div align='left'><u>Customer</u></div></td>";
					htmlStr += "<td width='110'><div align='left'><u>Order Amount</u></div></td>";
					htmlStr += "<td width='50'>&nbsp;</td>";
					htmlStr += "<td width='50'>&nbsp;</td>";
					htmlStr += "</tr>";
					
					//Looping
					for(let i=0; i<orderArray.length; ++i){
						var cnt = i + 1;
						htmlStr += "<tr class='text-small-11'>";
						htmlStr += "<td width='10'>&nbsp;</td>";
						htmlStr += "<td>" + cnt + "</td>";
						htmlStr += "<td>" + orderArray[i].date + "</td>";
						htmlStr += "<td>" + orderArray[i].time + "</td>";
						htmlStr += "<td>" + orderArray[i].customerUsername + "</td>";
						htmlStr += "<td><div align='right'>" + orderArray[i].total + "</div></td>";
						
						// Extract id from order ObjectId
						var strpid = JSON.stringify(orderArray[i]._id); // Store value of _id in as a string
						var slength = strpid.length - 2;
						strpid = strpid.substring(9,slength);
						htmlStr += "<td>&nbsp;</td>";
						htmlStr += "<td><a href='class/deleteorder.php?pid=" + strpid + "' style='color:#2B65EC'>Delete</a></td>";
						htmlStr += "</tr>";
						
						//Display header information for order details
						htmlStr += "<tr class='text-small-11'>";
						htmlStr += "<td>&nbsp;</td>";
						htmlStr += "<td colspan='2'><div align='center'><u>Product</u></div></td>";
						htmlStr += "<td>&nbsp;</td>";
						htmlStr += "<td colspan='2'><div align='center'><u>Quantity</u></div></td>";
						
						htmlStr += "<td>&nbsp;</td>";
						htmlStr += "</tr>";
						
						//Display order details
						for(let j=0; j<orderArray[i].products.length; ++j){
							htmlStr += "<tr class='text-small-11'>";
						    htmlStr += "<td>&nbsp;</td>";
							htmlStr += "<td>&nbsp;</td>";
						    htmlStr += "<td colspan='2'>" + orderArray[i].products[j].title + "</td>";
						    htmlStr += "<td colspan='2'><div align='center'>" + orderArray[i].products[j].quantity + "</div></td>";
						    htmlStr += "<td>&nbsp;</td>";
						    htmlStr += "<td>&nbsp;</td>";
						    htmlStr += "</tr>";
						}
						htmlStr += "<tr>";
					    htmlStr += "<td colspan='7' class='text-small'><hr></td>";
					    htmlStr += "</tr>";
					  
						
						
						
					}
					//Finish off table and add to document
					htmlStr += "</table>";
					document.getElementById("orders").innerHTML = htmlStr;
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
