

function validateContactForm() {

    let name = document.getElementById("name").value;
    let emailForm = document.getElementById("email").value;
    let subject = document.getElementById("subject").value;
    let userMessage = document.getElementById("message").value;


    let nameRegex = /^[a-zA-Z ]{5,50}$/;
    let emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    /*if (checkForBlankField(name, emailForm, subject, userMessage) && validateName(name, nameRegex) && validateEmail(emailForm, emailRegex) == true) {
        return true;
    } else {
        return false;
    }
*/
    if (checkForBlankField(name, emailForm, subject, userMessage) && validateName(name, nameRegex) && validateEmail(emailForm, emailRegex) == true) {
        resetFields();
        return true;
        setInterval(() => alert('Hello'), 4000);
    } else {

        return false;
    }
}

function validateName(name, name_regex) {

    if ((name_regex.test(name)) != true) {
        // Reset all fields
        resetFields();


        document.getElementById("name").style.border = "solid red";
        document.getElementById("name").title = "Please enter a valid name!";
        // Return false to prevent submission
        return false;


    } else {
        resetFields();
        return true;

    }
}


function validateEmail(emailForm, emailRegex) {

    if ((emailRegex.test(emailForm)) != true) {
        // Reset all fields
        resetFields();


        document.getElementById("email").style.border = "solid red";
        document.getElementById("email").title = "Please enter a valid email!";
        // Return false to prevent submission
        return false;


    } else {
        resetFields();
        return true;

    }
}

function checkForBlankField(name, emailForm, subject, userMessage) {

    if (name == null || name == "") {

        resetFields();


        document.getElementById("name").style.border = "solid red";
        document.getElementById("name").title = "Name field cannot be empty!";

        return false;
    } else if (emailForm == null || emailForm == "") {

        resetFields();


        document.getElementById("email").style.border = "solid red";
        document.getElementById("email").title = "Email field cannot be empty!";
        return false;
    } else if (subject == null || subject == "") {
        resetFields();


        document.getElementById("subject").style.border = "solid red";
        document.getElementById("subject").title = "subject field cannot be empty!";
        return false;
    } else if (userMessage == null || userMessage == "") {
        resetFields();


        document.getElementById("message").style.border = "solid red";
        document.getElementById("message").title = "Please fill in message box!";
        return false;
    } else {

        resetFields();

        return true;
    }





}

function resetFields() {

    document.getElementById("name").style.border = "1px solid white";
    document.getElementById("email").style.border = "1px solid white";
    document.getElementById("subject").style.border = "1px solid white";
    document.getElementById("message").style.border = "1px solid white";

}