
$(document).ready(function(){

	 $('.telefone').mask("(99) 9 9999-9999");

});


$(document).ready(function(){
	$('#ModalLancamento').modal('show');	
});

$(function(){
	$('#mytable').FullTable({
		"alwaysCreating":true,
		"selectable":true,
		"fields":{
			"Nota_Fiscal":{
				"mandatory":true,
				"errors":{
					"mandatory":"Nota fiscal is mandatory"
				}
			},
			"Data":{
				"mandatory":true,
				"errors":{
					"mandatory":"Data fiscal is mandatory"
				}
			}
				
		}
	});	
	

	$('#mytable').FullTable("draw");
	


	
});		
		
		
		
		
		
		
		
		
