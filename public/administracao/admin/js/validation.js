	function UserLogin(){
		//validar nome
		d = document.UserLoginForm;
		if (d.username.value == ""){
			alert("Por favor, preencha o campo Login.");
			d.username.focus();
			return false;
		}
		
		if (d.password.value==""){
		alert("Por favor, preencha o campo Senha.");
		d.password.focus();
		return false;
		}

		return true;
		}