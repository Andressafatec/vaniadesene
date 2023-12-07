	function validaAlteraFoto(){
		//validar nome
		d = document.fotoAltera;
		if (d.fotoImovel.value == ""){
			alert("Por favor, selecione um arquivo para upload.");
			d.fotoImovel.focus();
			return false;
		}
		
		return true;
		}