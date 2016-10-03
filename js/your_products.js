function edit_item(id_product) {
//	var id_product = this.getAttribute("id_product");
	window.location.assign("edit_product.php?id_product="+id_product)
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