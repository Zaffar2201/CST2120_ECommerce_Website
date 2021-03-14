//Create an ajax request
var request = new XMLHttpRequest();

//Check login when page loads
checkLogin();


function checkLogin() {
    //Create event handler that specifies what should happen when server responds
    request.onload = function() {
        //Check response received
        if (request.responseText === "ok") {
            document.getElementById('ServerResponse').style.color = "magenta";
            document.getElementById('ServerResponse').innerHTML = "User is already logged in!";
            // Forward to new scene
            setTimeout(() => {
                window.location.href = "index.php";
            }, 2500);


        } else {
            //Hide message
            document.getElementById('ServerResponse').innerHTML = "";

        }
    };
    //Set up and send request
    request.open("GET", "PhpServer/checkUserLoginServer.php");
    request.send();
}


function login() {
    //Create event handler that specifies what should happen when server responds
    request.onload = function() {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            var responseData = request.responseText;

            //Add data to page
            if (responseData.includes("Welcome")) {
                document.getElementById('ServerResponse').style.color = "magenta";
                document.getElementById('ServerResponse').innerHTML = responseData;
                // Forward to index page
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 2500);
            } else
                document.getElementById('ServerResponse').innerHTML = request.responseText;
        } else
            document.getElementById('ServerResponse').innerHTML = "Error communicating with server";
    };

    //Extract login data
    var customerUsername = document.getElementById("lgUsername").value;
    var customerPassword = document.getElementById("lgPassword").value;

    //Set up and send request
    request.open("POST", "PhpServer/customerLoginServer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("lgUsername=" + customerUsername + "&lgPassword=" + customerPassword);
}