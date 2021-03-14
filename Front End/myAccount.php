<?php

//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("BagKart - Account");

?>

<!--Main content starts here-->
<div id="accountInfo">
    <!--Vertical div containing user profile and links-->
    <div id="accountProfile">

        <div id="accountProfile-Pic">
            <!--User icon-->
            <img src="Images/user.png" alt="account icon">

        </div>
        <div id="accountProfile-Links">
            <!--User direct links-->
            <table id="accountTableLinks">

                <tr>
                    <td class="middleBorder"><a href="myOrders.php" style="color:white;">My Orders</a></td>
                </tr>
                <tr>
                    <!--Table data with claa middleBorder for styling-->
                    <td class="middleBorder" style="color:white;"><a href="myCart.php">My Cart</a></td>
                </tr>
                <tr>
                    <td><a href="Shop.php" style="color:white;">My Shop</a></td>
                </tr>
            </table>

        </div>


    </div>
    <!--User account form-->
    <div id="accountForm">

    </div>
</div>










<!--End of user profile div-->



<?php

//Output the footer

outputFooter("BagKart - Account");

?>