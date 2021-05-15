/*const deleted = document.getElementById('cancel');
//when we click cancel button we will be redirected to vendorDashboard                 
deleted.addEventListener('click',()=>{
        window.location.href = "vendorDashboard.php";
});*/ 



//whene user submit the form this function will be called
function checking( ){

     

//get values form  form inputs and textareas and trim then to remove white spaces them  convert them into lowercase word
   var title=((document.getElementById('title').value).trim()).toLowerCase();
   var category=((document.getElementById('category').value).trim()).toLowerCase();
   var description=((document.getElementById('description').value).trim()).toLowerCase();
   var email=((document.getElementById('email').value).trim()).toLowerCase();
  //return true or false    
  return(check(title,"title_chk","title")&&check(category,"category_chk","category")&&check(description,"description_chk","description")&&check(email,"email_chk","email"));

  //if(chkTitle&&chkCategory&&chkdescription&&chemail){
     
	//  myform.removeEventListener('submit',checking);
	  //document.getElementById("formi").submit();
  //}
 }


function check(content,id,inputID) {
  var invalid=new Array();
  if(content==email){
	var res =content.split("@");
	 console.log("&*");
  }else{
	  console.log("&*ssdf");
    var res =content.split(" ");
  }
  for(x in res){
    if(res[x]==="freak"){
        console.log("*");
	
        invalid.push(res[x]);
     }
   

  } 
 var message=""; 
 if(invalid.length){     
  message="These words : " +invalid+ " are inappropriate,Please Change";
  document.getElementById(inputID).style.borderColor="red";
  document.getElementById(id).style.color="red";
  document.getElementById(id).innerHTML=message;
  return false;
 }else{
   message="These words are allowed.";
   document.getElementById(inputID).style.borderColor="green";
   document.getElementById(id).style.color="green";
   document.getElementById(id).innerHTML=message;
   return true;
  }
}


