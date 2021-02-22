//DOCUMENT READY
$(document).ready(function () {
	var require = $('#GET_require').val();
	var row = $('#GET_row').val();

	//CRIANDO CKEDITOR
	$("textarea[ckeditor='S']").ckeditor();

	$(".phone").inputmask({
		mask: ["(99) 99999-9999", "(99) 99999-9999"],
		keepStatic: true
	});
	$('.taginput').tagsInput({
		defaultText: 'Adicione'
	});
	initMaskTags();
	initMaskFields();
	if (require === 'form' && (row <= 0 || row === undefined)) {

		$('#BSalvar').show();
		$('.Post').removeAttr('disabled');
		$('.checker').removeClass('disabled');
		var data = new Date();

		var data_atual = data.getFullYear() + "-" + zeroPad((data.getMonth() + 1), 2) + "-" + zeroPad(data.getDate(), 2);
		var data_hora = data.getFullYear() + "-" + zeroPad((data.getMonth() + 1), 2) + "-" + zeroPad(data.getDate(), 2) +
				"T" + zeroPad(data.getHours(), 2) + ":" + zeroPad(data.getMinutes(), 2);
		$('.Date').val(data_atual);

		$('.DateTime').val(data_hora);
		//HABILITANDO CKEDITOR
		if ($("textarea[ckeditor='S']").length > 0) {
			$("textarea[ckeditor='S']").ckeditorGet().config.readOnly = false;
		}
		$('.taginput').tagsInput();



	} else {
		//DESABILITANDO CKEDITOR
		if ($("textarea[ckeditor='S']").length > 0) {
			$("textarea[ckeditor='S']").ckeditorGet().config.readOnly = true;
		}
	}
});

//BOTAO EDITAR
$('#BEditar').on('click', function () {
	enableMaskTags();
	$('.Post').removeAttr('disabled');
	$('.AjaxSelect').select2('enable');
	$('.selectpicker').selectpicker('refresh');
	$('#BSalvar').show();
	$('#acao').val('Editar');
	$('#BEditar,#BExcluir,#BStatusImovel,#BStatusAtend').hide();
	//remover classe disabled do checkbox	
	$('.checker').removeClass('disabled');
	//Deixar campo ReadyOnly
	$(".ReadOnly").attr("readonly", "readonly");
	//Habilita o Campo TextArea com CKEditor
	if ($("textarea[ckeditor='S']").length > 0) {
		$("textarea[ckeditor='S']").ckeditorGet().destroy();
		$("textarea[ckeditor='S']").ckeditor();
		$("textarea[ckeditor='S']").ckeditorGet().config.readOnly = false;
	}

});

//BOTAO VOLTAR
$('#BVoltar').on('click', function () {
	window.history.go(-1);
});

//BOTAO NOVO
$('#BNovo').on('click', function () {
	console.log($('#GET_id_cadastro').val());
	window.open('?secao=Cadastro&id_cadastro=' + $('#GET_id_cadastro').val() + '&require=form', '_self');
});

//BOTAO ENVIAR IMAGENS
$('#BUpload').on('click', function () {
	window.open('?secao=Cadastro&id_cadastro=' + $('#GET_id_cadastro').val() + '&require=upload&id=' + $('#GET_row').val(), '_self');
});

//BOTAO ADICIONAR UNIDADES
$('#BAdicionarUnidades').on('click', function () {
	window.open('?secao=Cadastro&id_cadastro=' + $('#GET_id_cadastro').val() + '&require=batch&id=' + $('#GET_row').val(), '_self');
});

//BOTAO HISTORICO DO ATENDIMENTO
$('#BHistorico').on('click', function () {
	window.open('?secao=Historico&require=historico&id=' + $('#GET_row').val(), '_self');
});

$('#BExcluirOK').on('click', function () {
	var row = $('#GET_row').val();
	var acao = 'Excluir';
	var id_cadastro = $('#GET_id_cadastro').val();

	$.post("crud.php", {
		row: row,
		acao: acao,
		id_cadastro: id_cadastro
	},
	function (retorno) {
		switch (retorno) {
			case 'EXCLUIU':
				//window.open('?secao=Cadastro&id_cadastro=' + $('#GET_id_cadastro').val(), '_self');
				retorno = true;
				break;
			case 'ERRO':
				noty({force: true, text: 'Este cadastro não pode ser excluído.', type: 'error', layout: 'top'});
				break;
		}
	});
});

//CONFIRMAR EXCLUIR
$('#BExcluir').on('click', function () {
	noty({
		text: 'Tem certeza que deseja excluir o registro?',
		type: 'confirm',
		layout: 'top',
		timeout: 2000,
		modal: true,
		buttons: ('confirm' != 'confirm') ? false : [
			{
				addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
					//$noty.close();
					//noty({force: true, text: 'Excluindo ...', type: 'confirm', layout: 'top'});
					$("#BExcluirOK").click();
					window.open('?secao=Cadastro&id_cadastro=' + $('#GET_id_cadastro').val(), '_self');
				}
			}, {
				addClass: 'btn btn-danger', text: 'Cancelar', onClick: function ($noty) {
					$noty.close();
					noty({force: true, text: 'Ação Cancelada', type: 'error', layout: 'top', timeout: 2000});
				}
			}
		]
	});

	return false;
});

//MASCARA DE VALOR
$(".MaskValor").maskMoney({
	prefix: 'R$ ',
	allowNegative: true,
	thousands: '.',
	decimal: ',',
	affixesStay: true
}).maskMoney('mask');

//CARREGAR SELECT AJAX DOS CLIENTES
$(document).ready(function () {
	$('.AjaxSelectClientes').select2({
		allowClear: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {
				$.ajax("Personalizados/Ajax/AjaxSelectClientes.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					//console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectClientes.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});
});

//CARREGAR SELECT MÚLTIPLO AJAX DOS CLIENTES 
$(document).ready(function () {
	$('.AjaxMultipleSelectClientes').select2({
		allowClear: true,
		multiple: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {
				$.ajax("Personalizados/Ajax/AjaxSelectClientes.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					//console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectClientes.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});
});
//CARREGAR SELECT AJAX DOS CORRETORES
$(document).ready(function () {
	$('.AjaxSelectCorretores').select2({
		allowClear: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {
				$.ajax("Personalizados/Ajax/AjaxSelectCorretores.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					//console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectCorretores.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});

	$('.AjaxMultipleSelectImoveis').select2({
		allowClear: true,
		multiple: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {

				$.ajax("Personalizados/Ajax/AjaxSelectImoveis.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectImoveis.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});

});

//CARREGAR SELECT AJAX DOS IMOVEIS
$(document).ready(function () {
	$('.AjaxSelectImoveis').select2({
		allowClear: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {

				$.ajax("Personalizados/Ajax/AjaxSelectImoveis.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					//console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectImoveis.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});
});

//CARREGAR SELECT AJAX DOS CLIENTES
$(document).ready(function () {
	$('.AjaxSelectVendas').select2({
		allowClear: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {
				$.ajax("Personalizados/Ajax/AjaxSelectVendas.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					//console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectVendas.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});
});

//CARREGAR SELECT AJAX DOS FORNECEDORES
$(document).ready(function (){
	$('.AjaxSelectFornecedores').select2({
		allowClear: true,
		minimumInputLength: 1,
		initSelection: function (element, callback) {
			var id = $(element).val();
			if (id !== "") {
				$.ajax("Personalizados/Ajax/AjaxSelectFornecedores.php?id=" + id, {
					dataType: "json"
				}).done(function (data) {
					//console.log(data);
					callback(data);
				});
			}
		},
		ajax: {
			url: "Personalizados/Ajax/AjaxSelectFornecedores.php",
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term
				};
			},
			results: function (data, page) {
				return {
					results: data
				};
			}
		}
	});
});


//CARREGAR CAMPO DATA E HORA
$(document).ready(function () {
		$("input[type=password]").val('');
		$("input[type='datetime-local']").each(function(){
		if($(this).attr('value') != null){
			$(this).attr('value', $(this).attr('value').replace(' ','T'));
		}
		});
});

function historicoAlteracao() {
	var id_cadastro = $("input[name=id_cadastro]").val();
	var id = $("input[name=row]").val();
	$.post("Personalizados/Ajax/AjaxHistoricoAlteracao.php", {
		id: id,
		id_cadastro: id_cadastro
	}, function (data) {
		$("#alteracao").html(data);
	});
}

function salvarHistoricoAlteracao() {
	var id_cadastro = $("input[name=id_cadastro]").val();
	var id = $("input[name=row]").val();
	$.post("Personalizados/Ajax/AjaxSalvarHistoricoAlteracao.php", {
		id: id,
		id_cadastro: id_cadastro
	});
}

function initMaskTags(interact){
	var require = $('#GET_require').val();
	var row = $('#GET_row').val();
	interact = typeof interact !== 'undefined' ? interact : false;
	if (require === 'form' && (row <= 0 || row === undefined)) {
		interact = true;
	}
	$('.multitag_mask').each(function () {
		$(this).tagsInput({
			defaultText: 'Adicione',
			interactive: interact
		});
		var masks = $(this).attr('data-mask').split(',');
		var inputEl = $(this).next('.tagsinput');
		if (!interact){
			inputEl.find('span.tag > a').remove();
		}
		inputEl.first().find('input').inputmask({
			mask: masks,
			keepStatic: true
		});
	});
}

function enableMaskTags(selector){
	var selectors = typeof selector !== 'undefined' ? $(selector) : $('.multitag_mask');
	selectors.each(function () {
		$(this).tagsInput = null;
		$(this).next('.tagsinput').remove();
		$(this).tagsInput({
			defaultText: 'Adicione',
			interactive: true
		});
		$(this).nextAll('.tagsinput').removeAttr('disabled');
		var masks = $(this).attr('data-mask').split(',');
		var inputEl = $(this).next('.tagsinput').first().find('input');
		inputEl.inputmask({
			mask: masks,
			keepStatic: true
		});
	});
}

function initMaskFields(){
	$('.masked').each(function () {
		var masks = $(this).attr('data-mask').split(',');
		$(this).inputmask({
			mask: masks,
			keepStatic: true
		}).trigger('click');
	});
	$(".mask-decimal").each(function () {
		$(this).maskMoney({
			prefix: '',
			allowNegative: true,
			thousands: '.',
			decimal: ',',
			affixesStay: true
		}).maskMoney('mask');
	});
	$(".mask-decimal3").each(function () {
		$(this).maskMoney({
			prefix: '',
			precision:3,
			allowNegative: true,
			thousands: '.',
			decimal: ',',
			affixesStay: true
		}).maskMoney('mask');
	});
}