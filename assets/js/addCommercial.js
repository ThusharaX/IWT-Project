//IT20654962
//when user submit the form this function will be called
//Check for specific inappropriateword
function checking( ){

     

//get values form  form inputs and textareas and trim then to remove white spaces in the begining them  convert them into lowercase word
   var title=((document.getElementById('title').value).trim()).toLowerCase();
   
   var description=((document.getElementById('description').value).trim()).toLowerCase();
   
    var paymentDescription=((document.getElementById('paydescription').value).trim()).toLowerCase();
  //return true or false,if all values  are true  button type will be converted into submit type   
  if(check(title,"title_chk_error","title_chk_success","title")        
		 &&check(description,"description_chk_error","description_chk_success","description")
         &&check(paymentDescription,"paydescription_chk_error","paydescription_chk_success","paydescription")){
			 
	   document.getElementById("saved").type="submit";		 
		 
		 
   }

 }

/*function which checks occurance of inappropriate words*/
function check(content,idError,idSuccess,inputID) {
  var invalid=new Array();
/*split when a space character meets*/
  var res =content.split(" ");

  for(x in res){
  //check if word freak in the rex arrays
    if(res[x]==="freak"){
      
	
        invalid.push(res[x]);
      }
   

    
  } 
  //create a empty message 
 var message=""; 
 /*if invalid array contains any words this if condition will be true*/
 if(invalid.length){     
  message="These words : " +invalid+ " are inappropriate,Please Change";
  document.getElementById(inputID).style.borderColor="red";
  document.getElementById(idSuccess).style.visibility="hidden";
  document.getElementById(idError).style.visibility="visible";
  document.getElementById(idError).style.color="red";
  document.getElementById(idError).innerHTML=message;
  return false;
 }else{
	 //for allowed words
   message="These words are allowed.";
   document.getElementById(inputID).style.borderColor="green";
    document.getElementById(idError).style.visibility="hidden";
   document.getElementById(idSuccess).style.visibility="visible";
   document.getElementById(idSuccess).style.color="green";
   document.getElementById(idSuccess).innerHTML=message;
   return true;
  }
}


