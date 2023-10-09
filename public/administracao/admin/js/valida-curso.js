	function validaCurso(){
		d = document.curso;
		if (d.txtTitulo.value == ""){
			alert("Por favor, preencha o campo Título.");
			d.txtTitulo.focus();
			return false;
		}
		
		if (d.txtData.value == ""){
			alert("Por favor, preencha o campo Data.");
			d.txtData.focus();
			return false;
		}
		
		if (d.txtHorario.value == ""){
			alert("Por favor, preencha o campo Horário.");
			d.txtHorario.focus();
			return false;
		}
		
		if (d.txtLocal.value == ""){
			alert("Por favor, preencha o campo Local.");
			d.txtLocal.focus();
			return false;
		}
		
		return true;
		}
		
function mascaraData(campoData){
              var txtData = campoData.value;
              if (txtData.length == 2){
                  txtData = txtData + '/';
                  document.forms[0].txtData.value = txtData;
      return true;              
              }
              if (txtData.length == 5){
                  txtData = txtData + '/';
                  document.forms[0].txtData.value = txtData;
                  return true;
              }
         }