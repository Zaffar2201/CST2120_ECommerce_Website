// call loadBasket function onload
loadBasket();

//global variable
var totalFee;


//This function display all items in cart if any.
function loadBasket() {



    let basket;
    // Appropriate message for an empty basket
    if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
        document.getElementById('myCart-Profile').style.color = "red";
        document.getElementById('myCart-Profile').style.fontSize = "xx-large";
        document.getElementById('myCart-Profile').style.margin = "275px 600px";
        document.getElementById('myCart-Profile').innerHTML = "No items in basket yet!";
    } else {
        //Retrieve current basket
        basket = JSON.parse(sessionStorage.basket);
        let total = 0;
        let shippingFee = 150;
        let htmlStr = "";

        //Display basket
        htmlStr += '<div id="myCartProfile-left"><!--Direct link to shop page--><a href="shop.php"><img src="Images/left-arrow.png"><!--Specific styling for text--><span style="color:#EEE6E6;font-size:15px;font-family:Helvetica;">Continue Shopping</span></a></div>';
        htmlStr += '<div id="myCartProfile-right"><span style="color:#EEE6E6;font-size:15px;font-family:Helvetica;margin-left:325px;padding-top:100px;">Empty Basket</span>';
        htmlStr += '</div>';
        htmlStr += '<div id="Basket">';
        htmlStr += '<div id="myCart-Table">';
        htmlStr += '<table id="BasketTable">';
        htmlStr += '<col width="250"><col width="350"><col width="110"><col width="110"><col width="110">';
        htmlStr += '<tr class="spaceUnder"><th></th><th>Title</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';
        //Loop
        for (let x = 0; x < basket.length; x++) {
            if (x == 0) {
                htmlStr += '<tr class="spaceUnder">';
            } else {
                htmlStr += '<tr">';
            }
            htmlStr += '<td align="middle"><img id="' + basket[x].image_id + '" src="' + basket[x].image_url + '"></td>';
            htmlStr += '<td align="middle" style="text-align:middle;">' + basket[x].title + '</td>';
            htmlStr += '<td align="middle">' + basket[x].price + '</td>';
            htmlStr += '<td align="middle">' + basket[x].quantity + '</td>';
            htmlStr += '<td align="middle">' + (basket[x].price * basket[x].quantity) + '</td>';
            htmlStr += '</tr>';
            total = total + (basket[x].price * basket[x].quantity);


        }
        htmlStr += '</table></div>';
        htmlStr += '<div id="confirmationBox">';
        htmlStr += '<div class="confirmationBox-Price">';
        htmlStr += '<span style="float:left;">Subtotal</span>';
        htmlStr += '<span style="float:right;">Rs ' + total + '</span>';
        htmlStr += '</div>';
        htmlStr += '<br><br>';
        htmlStr += '<div class="confirmationBox-Shipping">';
        htmlStr += '<span style="float:left;">Shipping</span>';
        htmlStr += '<span style="float:right;font-size:17px;">' + shippingFee + '</span>';
        htmlStr += '</div> ';
        htmlStr += '<span style="color:rgba(211,211,211,0.45);padding-bottom: 5px;">__________________________________________</span>';
        htmlStr += '<br>';
        htmlStr += '<div class="confirmationBox-Finalprice">';
        htmlStr += '<span style="float:left;">Total</span>';
        htmlStr += '<span style="float:right;">Rs ' + (total + shippingFee) + '</span>';
        htmlStr += '</div><br>';
        htmlStr += '<button class="checkoutButton" onclick="checkout()"><img src="Images/hotel.png">&nbsp;Checkout</button>';
        htmlStr += '</div>';






        //display basket into div
        document.getElementById('myCart-Profile').innerHTML = htmlStr;

        //calculate final fee
        totalFee = total + shippingFee;



    }




}


//This function is to confirm order
function checkout() {



    //Create request object 
    let request = new XMLHttpRequest();

    //Set up request with HTTP method and URL 
    request.open("POST", "PhpServer/checkoutServer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("sessionStorage=" + sessionStorage.basket + "&total=" + totalFee);


    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server

            checkoutResponse(request.responseText);

        } else
            alert("Error communicating with server: " + request.status);
    };




}

//Display appropriate checkout response
function checkoutResponse(response) {

    if (response == 'Not logged in') {
        //Redirect to login page
        window.location.href = "login.php";
    } else if (response == 'good') {
        //Clear basket
        sessionStorage.clear();
        document.getElementById('myCart-Profile').style.color = "green";
        document.getElementById('myCart-Profile').style.fontSize = "xx-large";
        document.getElementById('myCart-Profile').style.margin = "275px 600px";
        document.getElementById('myCart-Profile').innerHTML = "Order has been successfully placed!";
        setTimeout(() => {
            window.location.href = "index.php";
        }, 5000);
    } else {
        alert(response);
    }

}