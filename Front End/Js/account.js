// Call checkLogin when window loads
checkLogin();


//Function to check if a customer is already logged in
//Prevent duoble logged in
function checkLogin() {

    let request = new XMLHttpRequest();
    //Set up and send request
    request.open("GET", "PhpServer/retrieveUserSession.php");
    request.send();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        if (request.status === 200) {
            //Store server response in global variable usernameSession
            var usernameSession = request.responseText;
            proceedEdit(usernameSession);

        } else {
            // Alert any error
            alert("Error communicating with server: " + request.status);

        }
    };

}

//This request current customer acc details
function proceedEdit(usernameSession) {

    let request2 = new XMLHttpRequest();


    //Create event handler that specifies what should happen when server responds
    request2.onload = function() {




        //Check HTTP status code
        if (request2.status === 200) {
            //Get data from server
            displayCustomers(request2.responseText);


        } else
            alert("Error communicating with server: " + request2.status);
    };

    // Send post req to server
    request2.open("POST", "PhpServer/AccountDetailServer.php");
    request2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request2.send("Username=" + usernameSession);

}

//This display current customer acc details
function displayCustomers(jsonCustomers) {

    //Convert JSON response into array
    let customerArray = JSON.parse(jsonCustomers);

    //Display form
    htmlStr = "";
    htmlStr += '<div id="form">';
    htmlStr += '<div id="Intro-text">My Account</div>';
    htmlStr += '<div id="Edit-text">View and edit your personal info below.</div><br>';
    htmlStr += '<span style="color:red; font-szie:19px">*These fields cannot be changed</span><br>';
    htmlStr += ' <span style="vertical-align:middle; opacity:0.7;color:whitesmoke;font-size:20px;">_______________________________________________________________</span> <br><br>';

    //Loop
    for (let i = 0; i < customerArray.length; i++) {


        htmlStr += '<div id="first-Fields">';
        htmlStr += '<div id="first-Fields-left"><span style="color:#EEE6E6;font-family:verdana; font-size:20px;">Name</span><br>';
        htmlStr += '<input class="account-input" type="text" id="accountName" value="' + customerArray[i].Name + '" autocomplete="off">';
        htmlStr += ' </div>';
        htmlStr += '<div id="first-Fields-right"><span style="color:#EEE6E6;font-family:verdana; font-size:20px;">Address</span><br>';
        htmlStr += ' <input class="account-input" type="text" id="accountAddress" value="' + customerArray[i].Address + '" autocomplete="off">';
        htmlStr += '</div> </div><br><br>';
        htmlStr += '<div id="second-Fields">';
        htmlStr += '<div id="second-Fields-left"><span style="color:#EEE6E6;font-family:verdana; font-size:20px;">Phone</span><br>';
        htmlStr += '<input class="account-input" type="number" id="accountPhone" value="' + customerArray[i].Phone + '" autocomplete="off">';
        htmlStr += '</div>';
        htmlStr += '<div id="second-Fields-right"><span style="color:#EEE6E6;font-family:verdana; font-size:20px;">Email</span><br>';
        htmlStr += '<input class="account-input" type="email" id="accountEmail" value="' + customerArray[i].Email + '" style="color:red; autocomplete="off" disabled>';
        htmlStr += '</div> </div><br><br>';
        htmlStr += ' <div id="third-Fields">';
        htmlStr += '<div id="third-Fields-left"><span style="color:#EEE6E6;font-family:verdana; font-size:20px;">Username</span><br>';
        htmlStr += '<input class="account-input" type="text" id="accountUsername" value="' + customerArray[i].Username + '" style="color:red;" autocomplete="off" disabled>';
        htmlStr += ' </div>';
        htmlStr += '<div id="third-Fields-right"><span style="color:#EEE6E6;font-family:verdana; font-size:20px;">Password</span><br>';
        htmlStr += ' <input class="account-input" type="password" id="accountPassword" value="' + customerArray[i].Password + '" autocomplete="off">';
        htmlStr += '</div></div><br><br><br>';
        htmlStr += ' <button class="accountButton" type="submit" onclick="updateInfo()"><center><span style="font-size:16px;font-family:georgia">Update Info</span></center></button>';
        htmlStr += '<span id="confirmationText" style="margin-left:25px;font-size:16px;font-family:georgia;"></span>';
        htmlStr += '</div><br><br>';

    }

    //Add all into a div string and display
    document.getElementById("accountForm").innerHTML = htmlStr;

}

//This function update customer details in database
function updateInfo() {

    let request3 = new XMLHttpRequest();

    //Extract login data
    var newCustomerName = document.getElementById("accountName").value;
    var newCustomerAddress = document.getElementById("accountAddress").value;
    var newCustomerPhone = document.getElementById("accountPhone").value;
    var newCustomerEmail = document.getElementById("accountEmail").value;
    var newCustomerUsername = document.getElementById("accountUsername").value;
    var newCustomerPassword = document.getElementById("accountPassword").value;

    // Send request using POST

    request3.open("POST", "PhpServer/updateAccountDetailServer.php");
    request3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request3.send("name=" + newCustomerName + "&address=" + newCustomerAddress + "&phone=" + newCustomerPhone + "&email=" + newCustomerEmail + "&username=" + newCustomerUsername + "&password=" + newCustomerPassword);

    //Create event handler that specifies what should happen when server responds
    request3.onreadystatechange = () => {


        //Check HTTP status code
        if (request3.status === 200) {
            //Get data from server

            if (request3.responseText === "Updated") {

                //Display confirmation message
                document.getElementById('confirmationText').innerHTML = "Record has been successfully updated!";
                setTimeout(() => {
                    document.getElementById('confirmationText').innerHTML = "";
                }, 3500);
            }

        } else {
            alert("Error communicating with server: " + request3.status);
        }
    };



}