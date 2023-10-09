	function validaInsereImovel(){
		//validar nome
		d = document.imovelInsere;

		if (d.un.value == ""){
			alert("Por favor, selecione a unidade que o imóvel pertence.");
			d.un.focus();
			return false;
		}
		
		if (d.categoria.value == ""){
			alert("Por favor, selecione a categoria.");
			d.categoria.focus();
			return false;
		}
		
		if (d.finalidade.value == ""){
			alert("Por favor, selecione a finalidade.");
			d.finalidade.focus();
			return false;
		}
		
		if (d.txtReferencia.value == ""){
			alert("Por favor, digite a referência.");
			d.txtReferencia.focus();
			return false;
		}
		
		if (d.txtBairro.value == ""){
			alert("Por favor, digite o bairro.");
			d.txtBairro.focus();
			return false;
		}
		
		if (d.txtValorImovel.value == ""){
			alert("Por favor, digite o preço.");
			d.txtValorImovel.focus();
			return false;
		}
		
		if (d.txtDescricao.value == ""){
			alert("Por favor, digite o preço.");
			d.txtDescricao.focus();
			return false;
		}
		
		return true;
		}