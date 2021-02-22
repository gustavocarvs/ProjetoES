<?php

require "inc/Acesso.php";
include "../config.php";
$con = mysqli_connect($host,$login,$senha,$bd);
$id_usuario = $_SESSION['id_cliente'];


?>

<head>
							<title>Fornecedor SuperKingFood</title>
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
							<i class="icon-truck ic" style="display:block; margin-left: auto; margin-right: auto; width: fit-content;"></i>
								<br><br>
								
								<h4 style="margin-top: -35px ;display: block;  margin-right: auto;  margin-left: auto;" id="Cadastro"> FORNECEDOR </h4>
							
								<br>
								
							

						
							 
								<br>
								<table id="example" class="table table-hover" >
									<thead>
										<tr>
											
											<th scope="col" style="text-align:center;">ID</th>
											<th scope="col" style="text-align:center;">NOME</th>
											<th scope="col" style="text-align:center;">CIDADE</th>
											<th scope="col" style="text-align:center;">ACAO</th>
																				
										</tr>
									</thead>
									
									<tbody>
										<?php 
											$sql = "SELECT a.*
														FROM fornecedor a
																			
																";
											$result = mysqli_query($con, $sql);
											if(mysqli_num_rows($result) > 0 ){
												// output data of each row
												while($row = mysqli_fetch_assoc($result)) {
													$id = $row['ID_Fornecedor'];
													$nome_forn = $row['NomeFornecedor'];
													$endereco = $row['EnderecoFornecedor'];
									
											?>
											<tr>
											   
												<td align="center">
													<?php echo $id; ?>
												</td >
												<td align="center">
													<?php echo $nome_forn; ?>
												</td>
												<td align="center">
													<?php echo $endereco; ?>
												</td>
												
												<td align="center">
													<a href="#edit<?php echo $id;?>" data-toggle="modal">
														<button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
													</a>
													<a href="#delete<?php echo $id;?>" data-toggle="modal">
														<button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
													</a>
												</td>
               
					
                    <!--Edit Item Modal -->
                    <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Editar Fornecedor</h4>
                                    </div>
                                    <div class="modal-body">
                                       <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>"> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="ID_Fornecedor">ID Fornecedor</label>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control" id="ID_Fornecedor" name="ID_Fornecedor" value="<?php echo $id; ?>" placeholder="ID"  required autofocus> </div>
                                            <label class="control-label col-sm-3" for="NomeFornecedor">Nome Fornecedor</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="NomeFornecedor" name="NomeFornecedor" placeholder="Nome"value="<?php echo $nome_forn; ?>"  required> </div>
                                        
                                            <label class="control-label col-sm-3" for="EnderecoFornecedor">Cidade</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="EnderecoFornecedor" name="EnderecoFornecedor" value="<?php echo $endereco; ?>" placeholder="Cidade" required> 
											</div>
											
                                        </div>
                                     </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="alterar_fornecedor"><span class="glyphicon glyphicon-edit"></span> Editar </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete<?php echo $id; ?>" class="modal fade " role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                               <div class="modal-dialog modal-lg"><!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Delete</h4>
										</div>
										<div class="modal-body">
											<input type="hidden" name="delete_id" value="<?php echo $id; ?>">
											<div class="alert alert-danger">Tem certeza que deseja excluir o Fornecedor <strong>
													<?php echo $id; ?>?</strong> 
											</div>
											<div class="modal-footer">
												<button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SIM</button>
												<button type="button" class="btn btn-default" data-dismiss="modal"> CANCELAR</button>
											</div>
										</div>
									</div>
							   </div>
                          </form>
                     </div>
                   
                </tr>
                <?php
                        }
                        //Update Items
						
							
                        if(isset($_POST['alterar_fornecedor'])){
							$id = $_POST['ID_Fornecedor'];
                            $nome = $_POST['NomeFornecedor'];
							$city = $_POST['EnderecoFornecedor'];
						
							
							$sql = "UPDATE fornecedor SET NomeFornecedor='$nome', EnderecoFornecedor = '$city' 
										WHERE ID_Fornecedor = '$id' ";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>alert('Pedido alterado com sucesso!');</script>";
								echo "<script>window.location = 'index.php?secao=Fornecedor_gerente';</script>";
                            } else {
                                echo "<script>alert('Erro ao editar!');</script>";
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM fornecedor WHERE ID_Fornecedor='$delete_id' ";
                            if (mysqli_query($con, $sql)) {
                              		echo "<script>alert('Fornecedor DELETADO com sucesso!');</script>";
									echo "<script>window.location = 'index.php?secao=Fornecedor_gerente';</script>";
							} else {
										echo "<script>alert('Erro ao deletar!');</script>";
							}
                          
                        }
                    }
							
                    //Add Item        
                    if(isset($_POST['add_fornecedor'])){
							$id = $_POST['ID_Fornecedor'];
                            $nome = $_POST['NomeFornecedor'];
							$city = $_POST['EnderecoFornecedor'];
						
							
							
							$sql = "INSERT INTO fornecedor (ID_Fornecedor,EnderecoFornecedor,NomeFornecedor )VALUES ('$id','$city','$nome')";
                        if (mysqli_query($con, $sql)) {
                            

                           			echo "<script>alert('Fornecedor ADICIONADO com sucesso!');</script>";
									echo "<script>window.location = 'index.php?secao=Fornecedor_gerente';</script>";
                           
                        } else {
                           echo "<script>alert('Erro ao ADD!');</script>";
                        }
                    }

?>
            </tbody>
        </table>
    </div>
     <div class="dropdown" >
	 <a href="#add" data-toggle="modal">
                <button style="display:block; margin-left: auto; margin-right: auto;" type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Inserir Fornecedor</button>
            </a>
	 </div>
	<!--Add Item Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Adicionar Fornecedor<h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            
                            <label class="control-label col-sm-2" for="ID_Fornecedor">ID </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="ID_Fornecedor" name="ID_Fornecedor" placeholder="ID Fornecedor" autocomplete="off" required> 
							</div>
							
							<label class="control-label col-sm-3" for="NomeFornecedor">Nome </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="NomeFornecedor" name="NomeFornecedor"  placeholder="Nome "autofocus required> 
							</div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="EnderecoFornecedor">Cidade </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="EnderecoFornecedor" name="EnderecoFornecedor" placeholder="Cidade " autocomplete="off" required> </div>
                           
						
						</div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="add_fornecedor"><span class="glyphicon glyphicon-plus"></span> Adicionar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
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

</style>

<script>
.form-control: disabled {
	background-color: #cccccc;
    opacity: 1;
}