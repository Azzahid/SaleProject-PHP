function like(id, userid){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var obj = eval(this.responseText);
			document.getElementById(String(id)).innerHTML = obj[0];
			document.getElementById(String(id)+"-num").innerHTML = obj[1];
		}else{
		}
	};
	xhttp.open("POST", "like.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+String(id)+"&user="+String(userid));

}
