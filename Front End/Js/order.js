//Create request object 
let request = new XMLHttpRequest();

//Set up request with HTTP method and URL 
request.open("GET", "PhpServer/orderServer.php");

//Send request
request.send();


//Create event handler that specifies what should happen when server responds
request.onload = () => {
    //Check HTTP status code
    if (request.status === 200) {

        //Call displayPastOrders function with data from server
        displayPastOrders(request.responseText);

    } else
        alert("Error communicating with server: " + request.status);
};




// This function displays past orders according to customer

function displayPastOrders(jsonOrders) {

    //Convert JSON orders into array
    let ordersArray = JSON.parse(jsonOrders);


    // Display past orders
    let htmlStr = '';
    let date;
    htmlStr += '<table id="OrderTable">';
    htmlStr += '<col width="150"><col width="100"><col width="550"><col width="100"><col width="100"><col width="100">';
    htmlStr += '<tr class="spaceUnder"><th></th><th>Date</th><th>Title</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';
    // Looping to display each order and product accordingly
    for (let outer = 0; outer < ordersArray.length; outer++) {

        date = ordersArray[outer].date;

        for (let inner = 0; inner < ordersArray[outer].products.length; inner++) {
            htmlStr += '<tr height="100">';
            htmlStr += '<td align="middle"><img id="' + ordersArray[outer].products[inner].image_id + '" src="' + ordersArray[outer].products[inner].image_url + '"></td>';
            htmlStr += '<td align="middle">' + date + '</td>';
            htmlStr += '<td align="middle" style="text-align:middle;">' + ordersArray[outer].products[inner].title + '</td>';
            htmlStr += '<td align="middle" style="text-align:middle;">' + ordersArray[outer].products[inner].price + '</td>';
            htmlStr += '<td align="middle" style="text-align:middle;">' + ordersArray[outer].products[inner].quantity + '</td>';
            htmlStr += '<td align="middle" style="text-align:middle;">' + (ordersArray[outer].products[inner].price * ordersArray[outer].products[inner].quantity) + '</td>';
            htmlStr += '</tr>';

        }

    }
    htmlStr += '</table>';

    //Add into div element
    document.getElementById('myOrders-Table').innerHTML = htmlStr;









}