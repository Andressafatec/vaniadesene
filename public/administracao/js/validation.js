// JavaScript Document
	function validaForm(){
		//validar nome
		d = document.contato;
		if (d.nome.value == ""){
			alert("Por favor, preencha o campo Nome.");
			d.nome.focus();
			return false;
		}
	
		//validar email
		if (d.email.value == ""){
			alert("Por favor, preencha o campo E-mail.");
			d.email.focus();
			return false;
		}
		//Checando se o endereço de e-mail é válido
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.contato.email.value))){
		alert("O campo E-mail deve conter um endereço eletrônico válido!");
		document.contato.email.focus();
		return false;
		}
		
		//validar telefone
		if (d.tel.value == ""){
			alert("Por favor, preencha o campo Telefone.");
			d.tel.focus();
			return false;
		}
		
		if (d.msg.value==""){
		alert("Por favor, preencha o campo Mensagem.");
		d.msg.focus();
		return false;
		}

		return true;
	}
	
	function newsletter(){
		//validar nome
		f = document.news;
		if (f.nome.value == ""){
			alert("Por favor, preencha o campo Nome.");
			f.nome.focus();
			return false;
		}
		
		//validar nome mask
		if (f.nome.value == "NOME"){
			alert("Por favor, preencha o campo Nome.");
			f.nome.focus();
			return false;
		}
	
		//validar email mask
		if (f.email.value == "E-MAIL"){
			alert("Por favor, preencha o campo E-mail.");
			f.email.focus();
			return false;
		}

		//validar email
		if (f.email.value == ""){
			alert("Por favor, preencha o campo E-mail.");
			f.email.focus();
			return false;
		}
		//Checando se o endereço de e-mail é válido
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.news.email.value))){
		alert("O campo E-mail deve conter um endereço eletrônico válido!");
		document.news.email.focus();
		return false;
		}

		return true;
	}
	
	function ficha(){
		//validar nome
		f = document.inscricao;
		if (f.nome.value == ""){
			alert("Por favor, preencha o campo Nome.");
			f.nome.focus();
			return false;
		}
		
		if (f.idade.value == ""){
			alert("Por favor, preencha o campo Idade.");
			f.idade.focus();
			return false;
		}
		
		if (f.telComercial.value == ""){
			alert("Por favor, preencha o campo Telefone Comercial.");
			f.telComercial.focus();
			return false;
		}
		
		if (f.telResidencial.value == ""){
			alert("Por favor, preencha o campo Telefone Residencial.");
			f.telResidencial.focus();
			return false;
		}

		if (f.telCelular.value == ""){
			alert("Por favor, preencha o campo Telefone Celular.");
			f.telCelular.focus();
			return false;
		}

		//validar email
		if (f.email.value == ""){
			alert("Por favor, preencha o campo E-mail.");
			f.email.focus();
			return false;
		}
		//Checando se o endereço de e-mail é válido
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.inscricao.email.value))){
		alert("O campo E-mail deve conter um endereço eletrônico válido!");
		document.inscricao.email.focus();
		return false;
		}
		
		/*if (f.objetivo.value == ""){
			alert("Por favor, preencha o campo Objetivos.");
			f.objetivo.focus();
			return false;
		}*/
		
		if (f.termo_resp.value == ""){
			alert("Por favor, aceite os termos de responsabilidade.");
			f.termo_resp.focus();
			return false;
		}
		
		/*if ((!d.area[0].checked) && (!d.area[1].checked) && (!d.area[2].checked) && (!d.area[3].checked) && (!d.area[4].checked) && (!d.area[5].checked) && (!d.area[6].checked) && (!d.area[7].checked) && (!d.area[8].checked) && (!d.area[9].checked) && (!d.area[10].checked) && (!d.area[11].checked) && (!d.area[12].checked) && (!d.area[13].checked) && (!d.area[14].checked)) {
        alert("Por favor, marque o campo Atividades!");
        return false;
        }*/
		
		if ((!d.forma_pagamento[0].checked) && (!d.forma_pagamento[1].checked) && (!d.forma_pagamento[2].checked)) {
        alert("Por favor, selecione o tipo de pagamento.");
        return false;
        }

		return true;
	}
		
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}

function soNumeros(v){
    return v.replace(/\D/g,"")
}

function telefone(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
}