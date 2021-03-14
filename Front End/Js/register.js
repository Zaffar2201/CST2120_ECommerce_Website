//This function add a new customer into database
function register() {

    //ServerResponse variable
    var serverRes = document.getElementById('ServerResponse').innerHTML;

    //Create request object 
    let request = new XMLHttpRequest();

    //Set up request with HTTP method and URL 
    request.open("POST", "PhpServer/registerServer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract registration data
    let name = document.getElementById("registerName").value;
    let address = document.getElementById("registerAddress").value;
    let phone = document.getElementById("registerPhone").value;
    let email = document.getElementById("registerEmail").value;
    let username = document.getElementById("registerUsername").value;
    let password = document.getElementById("registerPassword").value;

    //Send request
    request.send("registerName=" + name + "&registerAddress=" + address + "&registerPhone=" + phone + "&registerEmail=" + email + "&registerUsername=" + username + "&registerPassword=" + password);

    if (request.status == "(canceled)") {
        request.abort();
    }






    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            let responseData = request.responseText;

            //Check responseData
            if (responseData.includes("Thank ")) {
                document.getElementById('ServerResponse').innerHTML = responseData;
                document.getElementById('ServerResponse').style.color = "magenta";
                // Redirect to login.php
                setTimeout(() => {
                    window.location.href = "login.php";
                }, 3000);
            }

            //Display appropriate message
            if (responseData.includes("Registration")) {
                document.getElementById('ServerResponse').innerHTML = responseData;
                document.getElementById('ServerResponse').style.color = "red";
                setTimeout(() => {
                    document.getElementById('ServerResponse').innerHTML = '';
                }, 3000);
            }

            //Display appropriate message
            if (responseData.includes("Username")) {
                document.getElementById('ServerResponse').innerHTML = responseData;
                document.getElementById('ServerResponse').style.color = "red";
                setTimeout(() => {
                    document.getElementById('ServerResponse').innerHTML = '';
                }, 3000);
            }
        } else
            alert("Error communicating with server: " + request.status);
    };


}


// This function prevent duplicate username
function duplicateUsername() {
    // Create and send request
    let request1 = new XMLHttpRequest();

    //Set up request with HTTP method and URL 
    request1.open("POST", "PhpServer/checkUsernameRegisterServer.php");
    reques1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract username entered
    let custUsername = document.getElementById("registerUsername").value;

    //Send username for check to server
    request1.send("custUsername=" + custUsername);


    //Create event handler that specifies what should happen when server responds
    request1.onload = () => {
        //Check HTTP status code
        if (request1.status === 200) {
            //Get data from server
            let usernameCheck = request1.responseText;

            // Check username
            if (usernameCheck.includes("ok")) {
                //Add into db
                register();
            } else {
                document.getElementById('ServerResponse').innerHTML = usernameCheck;
                document.getElementById('ServerResponse').style.color = "red";
                setTimeout(() => {
                    document.getElementById('ServerResponse').innerHTML = '';
                }, 3000);

            }



        } else
            alert("Error communicating with server: " + request1.status);
    };



}