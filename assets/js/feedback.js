/*It20664558 D.M.P.D.Daundasekara*/
function validate() {
      
         if( document.form.fbdescription.value == "" ) 
         {
            alert( "Please provide your  comment" );
            document.form.fbdescription.focus() ;
            return false;
         }
         if( document.form.rating.value == "-1" ) {
            alert( "Please provide your ratings!" );
            return false;
         }

         return true;
      }
         
   
      function validate() 
      {
         alert("your feedback submited!!")
      }