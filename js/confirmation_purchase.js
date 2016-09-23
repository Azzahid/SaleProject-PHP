function getConfirmation(){
   var retVal = confirm("Are you sure with your input?");
   if( retVal == true ){
      document.getElementById("purchase_form").submit();
      window.location.assign("http://localhost/purchases.php")
      // return true;
   }
   else{
      // document.write ("User does not want to continue!");
      // return false;
   }
}

function updateTotalPrice() {
   var quantity = document.getElementById("quantity").value;
   document.getElementById("total_price").innerHTML = quantity * 100;
}