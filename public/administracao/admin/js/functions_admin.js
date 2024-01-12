$(document).ready(function() {
	// colocando classes e alterando css
	$('.contentBox'). addClass('ui-widget ui-widget-content ui-helper-clearfix ui-corner-all');
	$('.contentBoxHeader').addClass('ui-widget-header ui-corner-top');
	$('#loginBox').addClass('ui-widget ui-widget-content ui-helper-clearfix ui-corner-all');
	
	// alterando estilo da mensagem AUTH
	$('#authMessage').addClass('ui-state-highlight ui-corner-all');
	$('#authMessage').attr('style', 'margin-top: 0; padding: 0 .7em;');
	var mensagem = $('#authMessage').html();
	var novaMensagem;
	novaMensagem = '<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>';
	novaMensagem += '<strong>Aviso: </strong>';
	novaMensagem += mensagem + '</p>';
	$('#authMessage').html(novaMensagem);
	
	// alterando estilo da mensagem FLASH
	$('#flashMessage').addClass('ui-state-highlight ui-corner-all');
	$('#flashMessage').attr('style', 'margin: 0 20px 10px; padding: 0 .7em; font-size:12px;');
	var mensagem = $('#flashMessage').html();
	var novaMensagem;
	novaMensagem = '<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em; margin-top:4px"></span>';
	novaMensagem += '<strong>Aviso: </strong>';
	novaMensagem += mensagem + '</p>';
	$('#flashMessage').html(novaMensagem);
	
	// alterando estilo da mensagem de ERRO
	$('.error-message').addClass('ui-state-error ui-corner-all');
	$('.error-message').attr('style', 'margin: 0 0 10px; padding: 0 .7em; font-size:12px; width:405px');
	
	// fazendo com que os icones da .contentBox atuem como botoes para fazer slide do conteudo
	$(".contentBox .ui-icon-carat-1-n").click(function() {
		$(this).parents(".contentBox:first").find(".contentBoxMiddle").slideToggle("fast");
		$(this).toggleClass("ui-icon-carat-1-s"); 
		return false;	
	});
	
	// fazendo com que as caixas fiquem com opcao de sortable
	$("#sortable").sortable({
		revert: true
	});
	
	// validando href para w3c
	$('a[rel=external]').click(function() {
		window.open($(this).href);
		return false;
	});
	
	// colocando href no button
	$('button[class=href]').click(function() {
		window.location.replace($(this).attr('name'));
	});
	
	// sempre que for deletar algo, perguntar antes
	$('.removeItem').click(function() {
		if (confirm('Tem certeza que deseja deletar?')) {
			if ($(this).attr('id') == 'removeAll') {
				$('.removeAll').submit();
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	});
	
	// seleciona todos checks
	$('#allBox').click(function() {
		if ($('#allBox:checked').length >= 1) {
			$('.checkboxRemove').attr('checked', 'checked');
			$('.checker span').attr('class', 'checked');
		} else {
			$('.checkboxRemove').attr('checked', 'false');
			$('.checker span').removeClass('checked');
		}
	});
	
	// colocando uniform nos campos
	$("input, textarea, select, button").uniform();
});

function mostrarResultado(box,num_max,campospan){
	var contagem_carac = box.length;
	if (contagem_carac != 0){
		document.getElementById(campospan).innerHTML = contagem_carac + " caracteres digitados.";
		if (contagem_carac == 1){
			document.getElementById(campospan).innerHTML = contagem_carac + " caracter digitado.";
		}
		if (contagem_carac >= num_max){
			document.getElementById(campospan).innerHTML = "Limite de caracteres atingido!";
		}
	}else{
		document.getElementById(campospan).innerHTML = "Nenhum caractere foi digitado.";
	}
}

function contarCaracteres(box,valor,campospan){
	var conta = valor - box.length;
	document.getElementById(campospan).innerHTML = "Restam " + conta + " caracteres para incluir.";
	if(box.length >= valor){
		document.getElementById(campospan).innerHTML = "";
		document.getElementById("txtDescricao").value = document.getElementById("txtDescricao").value.substr(0,valor);
	}	
}