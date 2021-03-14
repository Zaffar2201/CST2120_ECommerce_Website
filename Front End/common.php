<?php

//This function will be used to output header and navigation bar
//$title is a parameter which will be the title of the website
function outputHeader($title)
{
  echo '<!DOCTYPE html>';
  echo '<html>';
  echo '<head>';
  echo '<title>' . $title . '</title>';
  echo '<!-- Link to external style sheet-->';

  //If statement to determine css for header and footer and javascript sheet

  if ($title == "BagKart - Home") {
    echo ' <script src="Js/home.js" async></script>';
  }

  if ($title == "BagKart - Login") {
    echo ' <script src="Js/login.js" async></script>';
  }

  if ($title == "BagKart - Account") {
    echo ' <script src="Js/account.js" async></script>';
  }

  if ($title == "BagKart - Cart") {
    echo ' <script src="Js/cart.js" async></script>';
  }

  if ($title == "BagKart - Order") {
    echo ' <script src="Js/order.js" async></script>';
  }

  /*if ($title == "BagKart - Shop") {
    echo ' <script src="Js/shop.js" async></script>';
  }*/

  if ($title == "BagKart - Register") {
    echo ' <script src="Js/register.js" async></script>';
  }
  echo '<link rel="stylesheet" type="text/css" href="css/headerFooter.css">';

  // Make use of associative array and for each loop to determine styling sheet for the current page
  $css = array("BagKart - Home" => "css/indexcss.css", "BagKart - Shop" => "css/myShop.css", "BagKart - Cart" => "css/myCart.css", "BagKart - Order" => "css/myOrders.css", "BagKart - Account" => "css/myAccount.css", "BagKart - Register" => "css/register.css", "BagKart - Login" => "css/login.css");
  foreach ($css as $currentPage => $correspondingStyle) {
    if ($currentPage == $title) {
      echo '<link rel="stylesheet" type="text/css" href="' . $correspondingStyle . '">';
      break;
    }
  }

  if ($title == "BagKart - Login") {
    echo ' <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">';
  } else if ($title == "BagKart - Shop") {

    echo '  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
    echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
    echo '  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
  }

  echo '</head>';
  echo '<!--Body section-->';

  echo '<body>';



  switch ($title) {
    case "BagKart - Home":
      echo '<div id="index-section1">';
      break;
    case "BagKart - Shop":
      echo '<div id="myShop-main">';
      break;
    case "BagKart - Cart":
      echo '<div id="myCart-main">';
      break;
    case "BagKart - Account":
      echo '<div id="myAccount-main">';
      break;
    case "BagKart - Order":
      echo '<div id="myOrders-main">';
      break;
    case "BagKart - Login":
      echo '<div id="login-main">';
      break;
    default:
      echo '<div id="register-main">';
      break;
  }



  echo '<!--Header Navbar-->';
  echo '<div id="headerNav">';
  echo '<!--Display game main logo and specifying its source as class logo for styling-->';
  echo '<div class="headerNav-website-title-wrap">';
  echo '<div id="title">';
  echo '<img src="Images/backpackTitle.png"> <span style="color:rgba(212,175,55,1)">Bag</span>Kart';
  echo '</div>';
  echo '<!--Search bar wrapper-->
    
</div>';
  echo '<!--Nav bar links-->
    <div class="headerNav-link">



    <!--Navigation bar links-->
    <a href="index.php#index-section1">Home</a>
    <a href="shop.php">Shop</a>
    <a href="index.php#index-section5">About</a>
    <a href="index.php#index-section6">Contact</a>

    <!--Dropdown div for other links-->
    <div class="dropdown2">
        <img class="ImageIcon" src="Images/signupIcon.png">
        <div class="dropdown2-content">
            <a id="Orders"></a>
            <a id="Account"></a><span style="vertical-align:middle; opacity:1;color:grey;">_____________________</span>
            <a id="Sign"></a><span style="vertical-align:middle; opacity:0;">_____________________</span>
        </div>
    </div>
    <!--Additional space-->
    &nbsp;
    <a href="myCart.php"><img class="ImageIcon" src="Images/shopping-cart.png"></a>

</div>





</div>
<!--End of headerNav-->';
}

// To display footer for every pages
function outputFooter($title)
{
  echo '<!--Footer-->';
  if ($title == "BagKart - Home") {
    echo ' <footer id="footer">';
  } else {
    echo ' <footer class="footer-other">';
  }

  echo '
    <!--Company rights-->
    <p class="footer-text">© 1996-2020, BagKart.com, Inc. or its affiliates</p><br>
    <!--Social media icons-->
    <center><img src="../Images/facebook.png" alt="facebook">&nbsp;&nbsp;
        <img src="../Images/twitter.png" alt="twitter">&nbsp;&nbsp;
        <img src="../Images/linkedin.png" alt="linkedin">&nbsp;&nbsp;
        <img src="../Images/instagram.png" alt="instagram">&nbsp;&nbsp;
    </center>

</footer>


</body>


</html>
<!--End of HTML Page-->';
}
















?>

<script>
  window.onload = signButton;

  var commonrequest = new XMLHttpRequest();

  function signButton() {

    //Create event handler that specifies what should happen when server responds
    commonrequest.onload = function() {
      if (commonrequest.responseText === "ok") {
        document.getElementById('Sign').innerHTML = "Sign out";
        document.getElementById('Sign').href = "index.php";
        document.getElementById('Sign').onclick = function() {
          logOut()
        };

        document.getElementById('Orders').innerHTML = "My Orders";
        document.getElementById('Orders').href = "myOrders.php";

        document.getElementById('Account').innerHTML = "My Account";
        document.getElementById('Account').href = "myAccount.php";

      } else {

        document.getElementById('Sign').innerHTML = "Sign in";
        document.getElementById('Sign').href = "login.php";

        document.getElementById('Orders').innerHTML = "My Orders";
        document.getElementById('Orders').href = "login.php";

        document.getElementById('Account').innerHTML = "My Account";
        document.getElementById('Account').href = "login.php";
      }
    };
    //Set up and send request
    commonrequest.open("GET", "PhpServer/checkUserLoginServer.php");
    commonrequest.send();







  }



  function logOut() {
    commonrequest.open("GET", "PhpServer/logoutServer.php");
    commonrequest.send();
  }
</script>