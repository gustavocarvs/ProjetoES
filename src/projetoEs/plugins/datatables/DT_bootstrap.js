/* Set the defaults for DataTables initialisation */

/* FILTRO INDIVIDUAL POR COLUNA NO DATATABLES */
$(document).ready(function () {
	//CLICK NA LINHA
//	console.log(document.cookie.split(';')[0]);
//	document.cookie
	$("#dataTable tbody").on("mouseover", "tr", function () {
		$(this).css('cursor', 'pointer');
	});
	$("#dataTable tbody").on("click", "tr", function () {
		var id = $(this).find("td:first").html();
		var id_cadastro = $('#GET_id_cadastro').val();
		//CONDICAO PARA NAO CLICAR NO DATATABLE INTEGRACAO
//		if (id_cadastro == 7 || id_cadastro == 10){
//			window.open("?secao=Cadastro&require=form&row="+id+"&id_cadastro="+id_cadastro, '_blank');
//		}
//		else if (id_cadastro != 21){
//			window.location="?secao=Cadastro&require=form&row="+id+"&id_cadastro="+id_cadastro;
//		}
		window.location = "?secao=Cadastro&require=form&row=" + id + "&id_cadastro=" + id_cadastro;
	});

	// ADICIONANDO CAMPOS AUTOMATICAMENTE
	var qtd = $("#dataTable thead th").length;
	$('#dataTable thead').append('<tr class="filtro">');
	for (i = 0; i < qtd; i++) {
		$('#dataTable thead tr[class="filtro"]').append('<th></th>');
	}
	$('#dataTable thead').append('</tr>');

	$('#dataTable thead th').each(function () {
		$(this).html('<span class="filter_column filter_text"><input type="text" class="text_filter form-control search_init " /></span>');
	});

	$(".search_init").keyup(function () {
		/* Filter on the column (the index) of this element */
		$('#dataTable').dataTable().fnFilter(this.value, $("thead input").index(this));
	});

});

$.extend(true, $.fn.dataTable.defaults, {
	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
	"sPaginationType": "bootstrap",
	"oLanguage": {"sUrl": "plugins/datatables/pt_br.txt"},
	"aaSorting": [[0, "desc"]],
	"bRetrieve": true,
	"bProcessing": true,
	"bServerSide": true,
	"bStateSave": true,
	"sAjaxSource": "datatables.php",
	"fnServerData": function (sSource, aoData, fnCallback) {
		aoData.push({"name": "id_cadastro", "value": $(this).attr("id_cadastro")});
		$.getJSON(sSource, aoData, function (json) {
			fnCallback(json);
		});
	},
	"fnStateLoad": function (oSettings) {
		var session = $("#dataTable").attr('session');
		var cadastro = $("#dataTable").attr('id_cadastro');
		if (session === cadastro) {
			var sData = this.oApi._fnReadCookie(oSettings.sCookiePrefix + oSettings.sInstance);
		}
		else {
			var sData = '';
		}
		var oData;

		try {
			oData = (typeof $.parseJSON === 'function') ?
					$.parseJSON(sData) : eval('(' + sData + ')');
		} catch (e) {
			oData = null;
		}

		return oData;
	}
});


/* Default class modification */
$.extend($.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
});


/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
{
	return {
		"iStart": oSettings._iDisplayStart,
		"iEnd": oSettings.fnDisplayEnd(),
		"iLength": oSettings._iDisplayLength,
		"iTotal": oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage": oSettings._iDisplayLength === -1 ?
				0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
		"iTotalPages": oSettings._iDisplayLength === -1 ?
				0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
	};
};


/* Bootstrap style pagination control */
$.extend($.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function (oSettings, nPaging, fnDraw) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function (e) {
				e.preventDefault();
				if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
					fnDraw(oSettings);
				}
			};

			$(nPaging).append(
					'<ul class="pagination">' +
					'<li class="prev disabled"><a href="#">&larr; ' + oLang.sPrevious + '</a></li>' +
					'<li class="next disabled"><a href="#">' + oLang.sNext + ' &rarr; </a></li>' +
					'</ul>'
					);
			var els = $('a', nPaging);
			$(els[0]).bind('click.DT', {action: "previous"}, fnClickHandler);
			$(els[1]).bind('click.DT', {action: "next"}, fnClickHandler);
		},
		"fnUpdate": function (oSettings, fnDraw) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, ien, j, sClass, iStart, iEnd, iHalf = Math.floor(iListLength / 2);

			if (oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if (oPaging.iPage <= iHalf) {
				iStart = 1;
				iEnd = iListLength;
			} else if (oPaging.iPage >= (oPaging.iTotalPages - iHalf)) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for (i = 0, ien = an.length; i < ien; i++) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// Add the new list items and their event handlers
				for (j = iStart; j <= iEnd; j++) {
					sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';
					$('<li ' + sClass + '><a href="#">' + j + '</a></li>')
							.insertBefore($('li:last', an[i])[0])
							.bind('click', function (e) {
								e.preventDefault();
								oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
								fnDraw(oSettings);
							});
				}

				// Add / remove disabled classes from the static elements
				if (oPaging.iPage === 0) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if (oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
});


/*
 * TableTools Bootstrap compatibility
 * Required TableTools 2.1+
 */
if ($.fn.DataTable.TableTools) {
	// Set the classes that TableTools uses to something suitable for Bootstrap
	$.extend(true, $.fn.DataTable.TableTools.classes, {
		"container": "DTTT btn-group",
		"buttons": {
			"normal": "btn",
			"disabled": "disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu",
			"buttons": {
				"normal": "",
				"disabled": "disabled"
			}
		},
		"print": {
			"info": "DTTT_print_info modal"
		},
		"select": {
			"row": "active"
		}
	});

	// Have the collection use a bootstrap compatible dropdown
	$.extend(true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
		"collection": {
			"container": "ul",
			"button": "li",
			"liner": "a"
		}
	});
}