<?php
// This form allows the authorised user to edit a product
// As a security measure the page is 'protected' by checking if session variable 'user_id' is set 

session_start();

if ( !isset( $_SESSION['user_id'] ) )
{
	//--- no user logged in, so redirect user to admin login page to 'protect' this page
	header("Location: adminlogin.php");
}

include_once ("class/EditProductClass.php");

?>
<!DOCTYPE html>
<html>
    <title>Product Maintenance</title>
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
							<li class="menu-text" style="padding-left:10px"><b>Edit Product</b></li>
						</ul>
					</div>
					<div>
						<!--Menu ul-->
						<ul class="menu">
							<li>
								<a href="adminlogout.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
			 <!-- End Top Bar -->

        <div class="w3-container w3-center" id="ctneditprod" style="margin-top:10px">
		    <form id="formeditprod" method = "post">
				<?php
					//Find the product that matches the specified id
					$cursor = $db->Products->find($findCriteria);

					//Output the results
				
					foreach ($cursor as $prod){
				?>
						<div class="form-section required">
							<label class="control-label col-label" for="product_id">Product Id</label>
							<input class="form-input input-border col-25" id="product_id" name="product_id" type="text" class="form-control" required value = "<?php echo $prod['Product_id'];?>" tabindex="1">
						</div>
						
						<div class="form-section required">
							<label class="control-label col-label" for="prodcat">Category</label>
							<input class="form-input input-border col-25" id="prodcat" name="prodcat" type="text" class="form-control" required pattern="[a-zA-Z]+" title="Product Category can contain alphabets only!" value = "<?php echo $prod['Category'];?>" tabindex="2">
						</div>
					 <!---Form class-->
						<div class="form-section required">
							<label class="control-label col-label" for="brandname">Brand Name</label>
							<input class="form-input input-border col-25" id="brandname" name="brandname" type="text" class="form-control" value = "<?php echo $prod['Brand_name'];?>" tabindex="3" required>
						</div>
						
						<div class="form-section required">
							<label class="control-label col-label" for="imageid">Image Id</label>
							<input class="form-input input-border col-75" id="imageid" name="imageid" type="text" class="form-control" required value = "<?php echo $prod['Image_id'];?>" tabindex="4">
						</div>
						
						<div class="form-section required">
							<label class="control-label col-label" for="imageurl">Image Url</label>
							<input class="form-input input-border col-75" id="imageurl" name="imageurl" type="text" class="form-control" required value = "<?php echo $prod['Image_url'];?>" tabindex="5">
						</div>
						
						<div class="form-section required">
							<label class="control-label col-label" for="model">Model No.</label>
							<input class="form-input input-border col-25" id="model" name="model" type="text" class="form-control" required value = "<?php echo $prod['Model_number'];?>" tabindex="6">
						</div> 
						 
						<div class="form-section required">
							<label class="control-label col-label" for="prodtitle">Title</label>
							<input class="form-input input-border col-75" id="prodtitle" name="prodtitle" type="text" class="form-control" required value = "<?php echo $prod['Title'];?>" tabindex="7">
						</div> 
						
						<div class="form-section required">
							<label class="control-label col-label" for="prodintro">Introduction</label>
							<input class="form-input input-border col-75" id="prodintro" name="prodintro" type="text" class="form-control" required value = "<?php echo $prod['Intro'];?>" tabindex="8">
						</div> 
						
						<div class="form-section required">
							<label class="control-label col-label" for="proddesc">Description</label>
							<input class="form-input input-border col-75" id="proddesc" name="proddesc" type="text" class="form-control" required value = "<?php echo $prod['Description'];?>" tabindex="9">
						</div> 
						
						<div class="form-section required">
							<label class="control-label col-label" for="releasedate">Release Date</label>
							<input class="form-input input-border col-25" id="releasedate" name="releasedate" type="text" class="form-control" required value = "<?php echo $prod['Release_date'];?>" tabindex="10">
						</div> 
						
						<div class="form-section required">
							<label class="control-label col-label" for="prodcolour">Colour</label>
							<input class="form-input input-border col-25" id="prodcolour" name="prodcolour" type="text" class="form-control" required value = "<?php echo $prod['Color'];?>" tabindex="11">
						</div> 
						
						<div class="form-section required">
							<label class="control-label col-label" for="price">Price</label>
							<input class="form-input input-border col-10" id="price" name="price" type="text" class="form-control" required pattern="[0-9]+" title="Please enter numbers only!" value = "<?php echo $prod['Price'];?>" tabindex="12">
						</div>
						
						<div class="form-section required">
							<label class="control-label col-label" for="quantity">Stock Count</label>
							<input class="form-input input-border col-10" id="quantity" name="quantity" type="text" class="form-control" required pattern="[0-9]+" title="Please enter numbers only!" value = "<?php echo $prod['Quantity'];?>" tabindex="13">
						</div>
					
					<?php
					}
				?>
					
					<div class="form-section">
						<span class="text-small-11 col-note"><font color="red">* required field</font></span>
					</div>
					
					<div class="form-section">
                        <button type="submit" class="button-1 padding-1 center-block w3-light-blue" name="cancel" id="cancel" tabindex="14" value="cancel">Cancel</button>
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
