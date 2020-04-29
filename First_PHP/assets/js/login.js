// document.getElementById('log_in').addEventListener('click', openForm());
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
function overify_login(f) {
	if (f.login.value  =='') {
		document.getElementById("massage").innerHTML ="Введите логин!";
		return false;	
	}
	var pass=f.pass.value;
	if (pass  =='')	{
		document.getElementById("massage").innerHTML = "Введите пароль!";
		return false;	
	}
	if (pass.length < 4) {
		document.getElementById("massage").innerHTML = "Пароль должен содержать не менее 4 символов! ";			
		return false;   
	}
}