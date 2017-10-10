function movie(){
	var api = document.getElementById('api').value;
	var url = document.getElementById('url').value;
	document.getElementById("player").src = api+url;
}
