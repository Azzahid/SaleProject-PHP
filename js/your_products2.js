function edit_item(id_product) {
	var id_active = document.getElementById("id_active").getAttribute("value");
	window.location.assign("edit_product.php?id_product="+id_product+"&id_active="+id_active);
}

function delete_item(id_product) {
	var retVal = confirm("Are you sure you want to delete this item?");
   	if( retVal == true ){		
   		var id_active = document.getElementById("id_active").getAttribute("value");
   		window.location.assign("your_products.php?id_active="+id_active+"&d="+id_product);
   	}
   	else{
      	// document.write ("User does not want to continue!");
      	// return false;
   	}
}