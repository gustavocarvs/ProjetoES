<?
require "inc/Acesso.php";


?>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
</head>

							
<div class="modal fade" id="ModalLancamento">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			</div>
				<div class="modal-body" style="text-align: center; border-color: #122963">
					Deseja mesmo sair?
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" style="background-color: #ea1c24; border: none; width: 20%;" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" style="background-color: #122963; border: none; width: 15%;" data-dismiss="modal" id="BSair">Sair</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
				
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="Personalizados/js/sair.js"></script>
<script>
.form-control: disabled {
	background-color: #cccccc;
    opacity: 1;
}
</script>

<script>
	$(document).ready(function () {
	noty({force: true, text: '<?= $Msg->getResult()[0]['nome']; ?>', type: '<?= $Msg->getResult()[0]['tipo']; ?>', layout: 'top', timeout: 2000});
	});
</script>
	
