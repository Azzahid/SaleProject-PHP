function validateform() {
	var fullname = document.forms["register"]["full_name"].value;
	var username = document.forms["register"]["username"].value;
	var email = document.forms["register"]["email"].value;
	var pass = document.forms["register"]["pass"].value;
	var cpass = document.forms["register"]["confirm_pass"].value;
	var fulladr = document.forms["register"]["full_adress"].value;
	var postalcode = document.forms["register"]["postal_code"].value;
	var phone = document.forms["register"]["phone_number"].value;
	if(fullname === null || fullname === ""){
		alert("Please fill the fullname field. ");
		return false;
	}
	if(username === null || username === ""){
		alert("Please fill the username field. ");
		return false;
	}
	if(email === null || email === ""){
		alert("Please fill the email. ");
		return false;
	}
	if(pass === null || pass === ""){
		alert("Please fill the password. ");
		return false;
	}
	if(cpass === null || cpass === "" || cpass !== pass){
		alert("Please enter the same password. ");
		return false;
	}
	if(fulladr === null || fulladr === ""){
		alert("Please fill your address. ");
		return false;
	}
	if(fulladr.toString().length === 0 ){
		alert("Address can't be empty. ");
		return false;
	}
	if(postalcode === null || postalcode === ""){
		alert("Please fill the postal code. ");
		return false;
	}
	if(postalcode % 1 !== 0){
		alert("Postal code must be a number");
		return false;
	}
	if(phone === null || phone === ""){
		alert("Please enter your phone number. ");
		return false;
	}
	if(phone % 1 !== 0){
		alert("Phone number must be a number");
		return false;
	}
}