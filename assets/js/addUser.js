function addUserFormValidate() {
    var fname = document.forms["addUser"]["fname"].value;
    var lname = document.forms["addUser"]["lname"].value;
    var email = document.forms["addUser"]["email"].value;

    if (fname == "") {
        alert("First Name must be filled out");
        return false;
    }
    else if (lname == "") {
        alert("Last Name must be filled out");
        return false;
    }
    else if (email == "") {
        alert("Email must be filled out");
        return false;
    }
  } 