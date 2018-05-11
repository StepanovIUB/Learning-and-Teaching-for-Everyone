<script>
function profile() {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'profile.php');
	xhr.onreadystatechange = function() {
		document.getElementById('profile').innerHTML = xhr.responseText;
	}
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send();
}
function ajax_close() {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'profile.php');
	xhr.onreadystatechange = function() {
		document.getElementById('profile').innerHTML = "<li style='width: 0px; height: 0px;'></li>";
	}
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send();
}

</script>
