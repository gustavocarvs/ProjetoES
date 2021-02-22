<?php

require "inc/Acesso.php";
include "../config.php";
$con = mysqli_connect($host,$login,$senha,$bd);
$id_usuario = $_SESSION['id_cliente'];


?>

<head>
							<title>Produto SuperKingFood</title>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
							<!-- Latest compiled and minified CSS -->
							<link rel="stylesheet" href="inventory/css/bootstrap.min.css">
							<!-- Optional theme -->
							<link rel="stylesheet" href="inventory/css/bootstrap-theme.min.css">
							<!-- Loader -->
							<link rel="stylesheet" href="inventory/css/loader.css">
							<script src="inventory/js/jquery-1.12.4.js"></script>
							<link rel="stylesheet" type="text/css" href="inventory/dashboard/vendor/font-awesome/css/font-awesome.min.css">
							<script>
								$(document).ready(function() {
										$('#example').DataTable({});
									});

								</script>
							<link rel="stylesheet" href="inventory/css/jquery.dataTables.min.css">
							<link rel="stylesheet" href="inventory/css/dataTables.bootstrap.min.css">
							<link rel="stylesheet" href="inventory/css/responsive.bootstrap.min.css">
							<link href="assets/css/pagina_main_two.css" rel="stylesheet" type="text/css" />
							<script src="inventory/js/bootstrap.min.js"></script>
							<script src="inventory/js/jquery.dataTables.min.js"></script>
							

	
</head>
<body onload="myFunction()" style="margin:0;">
<div id="container">
    <div id="content">
        <div class="container">
            <div class="col-md-12"  style="margin-top:10px;">
				<div class="widget box">
					<div class="widget-content">
						<form method="post" enctype="multipart/form-data" id="form_perfil" action="">
							<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $dados['ID_Fornecedor'] ?>">
														
							<div class="form-group">
							<i class="icon-shopping-cart ic" style="display:block; margin-left: auto; margin-right: auto; width: fit-content;"></i>
								<br><br>
								
								<h4 style="margin-top: -35px ;display: block;  margin-right: auto;  margin-left: auto;" id="Cadastro"> PRODUTOS </h4>
							
								<br>
								
							

						
							 
								<br>
								<table id="example" class="table table-hover" >
									<thead>
										<tr>
											
											<th scope="col" style="text-align:center;">NOME</th>
											<th scope="col" style="text-align:center;">MARCA</th>
											<th scope="col" style="text-align:center;">VALOR R$</th>
											<th scope="col" style="text-align:center;">ESTOQUE</th>
																				
										</tr>
									</thead>
									
									<tbody>
										<?php 
											$sql = "SELECT a.*
														FROM Produto a
																			
																";
											$result = mysqli_query($con, $sql);
											if(mysqli_num_rows($result) > 0 ){
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
													$id = $row['ID_Produto'];
													$item_name = $row['NomeProduto'];
													$item_category = $row['Marca'];
													$item_sell = $row['ValorDeVenda'];
												
													$qty = $row['qntdEstoque'];

													if($qty == 0){
														$alert = "Sem Estoque
													   ";
													}else {
														$alert = $qty;
													}

											?>
											<tr>
											   
												<td align="center">
													<?php echo $item_name; ?>
												</td >
												<td align="center">
													<?php echo $item_category; ?>
												</td>
												<td align="center">
													<?php echo $item_sell; ?>
												</td>
												
												<td align="center">
													<?php echo $alert; ?>
												</td>
					
												<tr>
                <?php
												}
											}
						
							
                      

					?>
            </tbody>
        </table>
    </div>
    							
							
							</div>
						</form>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
</body>

</html>
<style>
*, ::after, ::before {
    box-sizing: revert;
}
a {
    color: #fff;
    text-decoration: none;
}

<script>
.form-control: disabled {
	background-color: #cccccc;
    opacity: 1;
}

</style>