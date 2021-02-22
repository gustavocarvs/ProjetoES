<?php
require "inc/Acesso.php";
include "../config.php";
$con = mysqli_connect($host,$login,$senha,$bd);


//print_r($_SESSION); exit;

?>
<head>
	<link href="assets/css/pagina_main_two.css" rel="stylesheet" type="text/css" />
	<script src="assets/js/jquery-3.5.1.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	
</head>




<div id="container">
    <div id="content">
        <div class="container">
            <div class="col-md-12"  style="margin-top:10px;">
				<div class="widget box">
					<div class="widget-content">
						
						<form method="post" enctype="multipart/form-data" action="">
							<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $dados['Cod_Cliente'] ?>">
														
							<div class="form-group">
							<i class="icon-unlock ic" style="display:block; margin-left: auto; margin-right: auto; width: fit-content;"></i>
								<br><br>
								
								<h4 style="margin-top: -35px ;display: block;  margin-right: auto;  margin-left: auto;" id="Cadastro"> ALTERAR SENHA</h4>
							
								<br>
								<div class="row" style="margin-right: auto; margin-left: auto;" >
									<div class="col-md-3">
										<label>Senha atual</label>
										<input type="password" class="form-control" name="current_password" required placeholder="Senha atual" autofocus autocomplete="off">      
									</div>
									<div class="col-md-3">
										<label>Nova Senha</label>
										<input type="password" class="form-control" name="new_password" required placeholder="Nova Senha" autocomplete="off">      
									</div>
									<div class="col-md-3">
										<label>Repetir Senha</label>
										<input type="password" class="form-control" name="repeat_password" required placeholder="Repetir Senha" autocomplete="off">      
									</div>
									
								</div>
									
										
								
								<div class="row" style="margin-right: auto; margin-left: auto;">
									<label>&nbsp;</label>
									<div class="col-md-12" style="flex: auto;">
										<button type="submit" class="btn2 btn-salvar pull-right" name="change_pass"><i class="icon-ok"></i> Editar</button>
									</div>
								</div>
							</div>
							</form>
					</div>
				</div>
			</div>
        </div>
    </div>
</div><?php
							if(isset($_POST['change_pass'])){
									$sql = "SELECT a.senha
													FROM cliente a
														WHERE a.Cod_Cliente = '".$_SESSION['id_cliente']."' ";
									$CaracteresInvalidos = [';', ',', '"', "'", '/', '\\'];	
									$tabela = mysqli_query($con, $sql);
									$current_password = crypt(str_replace($CaracteresInvalidos, '', addslashes(strip_tags(trim($_POST['current_password'])))),'UF');
									$repeat_password = crypt(str_replace($CaracteresInvalidos, '', addslashes(strip_tags(trim($_POST['repeat_password'])))),'UF');
									$new_password = crypt(str_replace($CaracteresInvalidos, '', addslashes(strip_tags(trim($_POST['new_password'])))),'UF');
								if(mysqli_num_rows($tabela) > 0 ) {
                                
									while($row = mysqli_fetch_assoc($tabela)) {
										if($row['senha'] != $current_password){
										   echo "<script>alert('Senha invalida!');</script>";
											$passwordErr = '<div class="alert alert-warning"><strong>Password!</strong> Invalid.</div>';
										} else if($new_password != $repeat_password) {
											echo "<script>alert('Senhas nao combinam!');</script>";
											echo "<script>window.location = 'index.php?secao=Senha_gerente';</script>";
										} else{
											$sql = "UPDATE cliente SET senha='$new_password' WHERE Cod_Cliente = '".$_SESSION['id_cliente']."'";

											 if (mysqli_query($con, $sql)) {
												echo "<script>alert('Senha alterada com sucesso!');</script>";
												echo "<script>window.location = 'index.php?secao=Senha_gerente';</script>";
											} else {
												echo "<script>alert('ERRO ao alterar a senha!');</script>";
											}
										}    
									}
								} else {
										$usernameErr = '<div class="alert alert-danger"><strong>Username</strong> Not Found.</div>';
										$username = "";
								}
							}
?>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>-->
<script src="Personalizados/js/perfil.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
*, ::after, ::before {
    box-sizing: revert;
}
a {
    color: #fff;
    text-decoration: none;
}

</style>

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