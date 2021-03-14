//Global string
var globalJsonStringArray;

//Onload, call retrieveProducts fnction
retrieveProducts();

//This function display all products
function retrieveProducts() {

    //Create request object 
    let request = new XMLHttpRequest();

    //Set up request with HTTP method and URL 
    request.open("GET", "PhpServer/shopServer.php");

    //Send request
    request.send();


    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Store data from server into global variable
            globalJsonStringArray = request.responseText;
            //Call display function with data received from server
            displayProducts(request.responseText);

        } else
            alert("Error communicating with server: " + request.status);
    };






}

// Display the products
function displayProducts(jsonProducts) {


    // Prevent null products
    if (jsonProducts.length > 2) {
        let productsArray = JSON.parse(jsonProducts);
        let htmlStr = "";
        //Loop through array to display element
        for (let i = 0; i < productsArray.length; i += 2) {

            htmlStr += '<div class="w3-row-padding">';
            htmlStr += '<div class="w3-col l3 m6 bagWrap">';
            htmlStr += '<div class="BagImageWrapper">';
            htmlStr += "<img id='" + productsArray[i].Image_id + "' src='" + productsArray[i].Image_url + "' class='w3-hover-opacity'>";
            htmlStr += "</div>"
            htmlStr += '<div class="BagDescriptionWrapper">';
            htmlStr += '<h5 class="BagName">' + productsArray[i].Title + '</h5>';
            htmlStr += '<p class="shopPara">' + productsArray[i].Intro + '</p>';
            htmlStr += '<p class="BagPrice">';
            htmlStr += '<b>Rs' + productsArray[i].Price + '</b>';
            htmlStr += '</p>';
            htmlStr += '<div class="btn-group">';
            //Add to basket functionality
            htmlStr += '<input type="button" class="w3-button w3-white" value="Add to my cart" onclick="addToBasket(\'' + productsArray[i]._id.$oid + '\',\'' + productsArray[i].Image_url + '\',\'' + productsArray[i].Image_id + '\',\'' + productsArray[i].Title + '\',\'' + productsArray[i].Price + '\')">';
            htmlStr += ' </div> </div> </div>';
            // Check if result array has 1 more detail
            if ((i + 1) !== productsArray.length) {
                htmlStr += '<div class="w3-col l3 m6 bagWrap">';
                htmlStr += '<div class="BagImageWrapper">';
                htmlStr += "<img id='" + productsArray[i + 1].Image_id + "' src='" + productsArray[i + 1].Image_url + "' class='w3-hover-opacity'>";
                htmlStr += "</div>"
                htmlStr += '<div class="BagDescriptionWrapper">';
                htmlStr += '<h5 class="BagName">' + productsArray[i + 1].Title + '</h5>';
                htmlStr += '<p class="shopPara">' + productsArray[i + 1].Intro + '</p>';
                htmlStr += '<p class="BagPrice">';
                htmlStr += '<b>Rs' + productsArray[i + 1].Price + '</b>';
                htmlStr += '</p>';
                htmlStr += '<div class="btn-group">';
                htmlStr += '<input type="button" class="w3-button w3-white" value="Add to my cart" onclick="addToBasket(\'' + productsArray[i + 1]._id.$oid + '\',\'' + productsArray[i + 1].Image_url + '\',\'' + productsArray[i + 1].Image_id + '\',\'' + productsArray[i + 1].Title + '\',\'' + productsArray[i + 1].Price + '\')">';
                htmlStr += '</div> </div> </div>';
                htmlStr += '</div>';

            }
        }

        //Add content to div
        document.getElementById("Products").innerHTML = htmlStr;
    } else {

        //Appropriate styling
        document.getElementById("Products").style.color = "red";
        document.getElementById("Products").style.fontSize = "xx-large";
        document.getElementById("Products").style.margin = "275px 600px";
        document.getElementById("Products").innerHTML = "No products found!";

        setTimeout(() => {
            document.getElementById("Products").style.color = "white";
            document.getElementById("Products").style.margin = "inherit";
            document.getElementById("Products").style.fontSize = "small";
            retrieveProducts();
        }, 5000);
    }
}

// This function searches desired product in database
function search() {

    //Retrieve search criteria
    let search = document.getElementById('searchIndex').value;
    document.getElementById('searchIndex').value = '';



    //Create a request
    let request = new XMLHttpRequest();


    //Set up request with HTTP method and URL 
    request.open("POST", "PhpServer/searchServer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("searchIndex=" + search);


    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server

            globalJsonStringArray = request.responseText;
            //Display search result
            displayProducts(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };




}
//This function call appropriate sorting method
function sorting(sortingCriteria) {

    switch (sortingCriteria) {

        case "Asc":
            //Call appropriate sorting algo
            priceAscending(globalJsonStringArray);

            break;

        default:
            priceDescending(globalJsonStringArray);
            break;


    }

}
//Bubble sort algorithm for price sorting
function priceAscending(jsonProducts) {

    let productsArray = JSON.parse(jsonProducts);

    let length = productsArray.length;
    //Outer for loop
    for (let x = 0; x < productsArray.length - 1; x++) {
        //Inner for loop
        for (let y = 0; y < (productsArray.length - x - 1); y++) {

            if (productsArray[y].Price > productsArray[y + 1].Price) {
                //Swapping process
                let temp = productsArray[y];
                productsArray[y] = productsArray[y + 1];
                productsArray[y + 1] = temp;


            }



        } // End of inner for loop

    } // end of outer for loop

    //Display products
    displayProducts(JSON.stringify(productsArray))


}


// Reverse bubbleSort algoritm
function priceDescending(jsonProducts) {

    let productsArray = JSON.parse(jsonProducts);

    let length = productsArray.length;

    for (let x = 0; x < productsArray.length - 1; x++) {

        for (let y = 0; y < (productsArray.length - x - 1); y++) {

            if (productsArray[y].Price > productsArray[y + 1].Price) {

                let temp = productsArray[y];
                productsArray[y] = productsArray[y + 1];
                productsArray[y + 1] = temp;


            }



        } // End of inner for loop

    } // end of outer for loop

    //Reverse array
    productsArray.reverse();
    displayProducts(JSON.stringify(productsArray))


}


//This function add items to basket(SessionStorage)
function addToBasket(prodId, prodImage, prodImageId, prodTitle, prodPrice) {


    let basket = getBasket(); //Load or create basket





    //Increase count if product alreadu exists or create a index in array
    let indexFound;
    let found;
    for (let i = 0; i < basket.length; i++) {

        if (basket[i].id == prodId) {
            found = true;
            indexFound = i;
            break;
        }

    }


    if (!found) {
        //Add items into array
        basket.push({
            id: prodId,
            image_url: prodImage,
            image_id: prodImageId,
            title: prodTitle,
            price: prodPrice,
            quantity: 1
        });

    } else {
        basket[indexFound].quantity++;
    }


    //Store in local storage
    sessionStorage.basket = JSON.stringify(basket);


}


//Get basket from session storage or create one if it does not exist
function getBasket() {
    let basket;
    if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
        basket = [];
    } else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}