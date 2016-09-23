function edit_item() {
	window.location.assign("http://localhost/edit_product.php")
}

function delete_item() {
	var retVal = confirm("Are you sure you want to delete this item?");
   	if( retVal == true ){
    	console.log('delete');
   	}
   	else{
      	// document.write ("User does not want to continue!");
      	// return false;
   	}
}