/*It20664558 D.M.P.D.Daundasekara*/
function validateForm()
{

 if (name.value == "" || email.value == "" || mobile.value=="" || message.value=="")
{
	alert("no blanks values are allowed");
	return false;
}
}



function validateForm()
{
if(!( /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)))
 {
 alert("You have entered an invalid email address!");
    return false;
    }
}
    

function ValidateEmail(email)

var useremail=document.getElementById("email");

function validateForm(){
    var isValidEmail= validateEmail(useremail,value);
    return isValidEmail;
   
}

   
