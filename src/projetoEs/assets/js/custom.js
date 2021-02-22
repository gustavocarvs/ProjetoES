/*
 * custom.js
 *
 * Place your code here that you need on all your pages.
 */

"use strict";

$(document).ready(function(){

	//===== Sidebar Search (Demo Only) =====//
	$('.sidebar-search').submit(function (e) {
		//e.preventDefault(); // Prevent form submitting (browser redirect)

		$('.sidebar-search-results').slideDown(200);
		return false;
	});

	$('.sidebar-search-results .close').click(function() {
		$('.sidebar-search-results').slideUp(200);
	});

	//===== .row .row-bg Toggler =====//
	$('.row-bg-toggle').click(function (e) {
		e.preventDefault(); // prevent redirect to #

		$('.row.row-bg').each(function () {
			$(this).slideToggle(200);
		});
	});

	//===== Sparklines =====//


	//===== Refresh-Button on Widgets =====//

	$('.widget .toolbar .widget-refresh').click(function() {
		var el = $(this).parents('.widget');

		App.blockUI(el);
		window.setTimeout(function () {
			App.unblockUI(el);
			noty({
				text: '<strong>Widget updated.</strong>',
				type: 'success',
				timeout: 1000
			});
		}, 1000);
	});

	//===== Fade In Notification (Demo Only) =====//
	setTimeout(function() {
		$('#sidebar .notifications.demo-slide-in > li:eq(1)').slideDown(500);
	}, 3500);

	setTimeout(function() {
		$('#sidebar .notifications.demo-slide-in > li:eq(0)').slideDown(500);
	}, 7000);
});

function convertToNumber(str){
    str = str.replace(/\./g, "").replace(",", ".");
    var valor = parseFloat(str);
    return valor;
}

function valorComissao(elemValor, elemPorcent){
    var valor = convertToNumber(elemValor.val());
    var porcentagem = elemPorcent.val();
    if (valor > 0 && porcentagem > 0){
		var valorComissao = (valor * porcentagem / 100);
		return accounting.formatMoney(valorComissao, "", 2, ".", ",");
    }
    return accounting.formatMoney(0, "", 2, ".", ",");
}

function valorPorcentagem(elemValor, elemComissao){
    var valor = convertToNumber(elemValor.val());			    // valor do imovel
    var val_comissao = convertToNumber(elemComissao.val());	    // valor comissão
    if (valor > 0 && val_comissao > 0){
	var porcentagem = ((val_comissao / valor) * 100).toFixed(2);
	return porcentagem;
    }
    return "0";
}

function zeroPad(num, places) {
  var zero = places - num.toString().length + 1;
  return Array(+(zero > 0 && zero)).join("0") + num;
}