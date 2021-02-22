
$(document).ready(function(){
	 $("#telefone").mask("(99) 9 9999-9999");
	 $("#cep").mask("99.999-999");
});


$(document).ready(function(){
	$('#ModalLancamento').modal('show');	
});

//PREENCHENDO CEP AUTOMATICO
$("#cep").on('blur', function () {
    var cep = $(this).val().replace(/[^0-9]/, '');
    cep = cep.replace('-', '');
    if (cep !== "") {
	$.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function (json) {
	//$.getJSON('http://cep.correiocontrol.com.br/' + cep + '.json', function (json) {
	    $("#logradouro").val(json.logradouro);
	    $("#bairro").val(json.bairro);
	    $("#cidade").val(json.localidade);
	    $("#estado").val(json.uf);
	    $('#numero').focus();
	}).fail(function () {
	    alert('Não Conseguiu Encontrar');
	});
    }
});
