<?php

require "inc/Acesso.php";
include "../config.php";
$con = mysqli_connect($host,$login,$senha,$bd);
$id_usuario = $_SESSION['id_cliente'];


?>

<head>
							<title>Pedidos SuperKingFood</title>
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
							<i class="icon-file-text ic" style="display:block; margin-left: auto; margin-right: auto; width: fit-content;"></i>
								<br><br>
								
								<h4 style="margin-top: -35px ;display: block;  margin-right: auto;  margin-left: auto;" id="Cadastro"> PEDIDO</h4>
							
								<br>
								
							

						
							 
								<br>
								<table id="example" class="table table-hover" >
									<thead>
										<tr>
											
											<th scope="col" style="text-align:center;">PEDIDO</th>
											<th scope="col" style="text-align:center;">FORNECEDOR</th>
											<th scope="col" style="text-align:center;">DATA</th>
											<th scope="col" style="text-align:center;">QUANTIDADE</th>
											<th scope="col" style="text-align:center;">PRODUTO</th>
											<th scope="col" style="text-align:center;">GERENTE</th>
											<th scope="col" style="text-align:center;">ACAO</th>
										</tr>
									</thead>
									
									<tbody>
                <?php 
                    $sql = "SELECT a.*, DATE_FORMAT(a.DataPedido,'%d/%m/%Y') as dataPedido, c.ID_Produto, b.ID_Gerente, b.NomeGerente as NomeGerente, c.NomeProduto as NomeProduto, d.NomeFornecedor as NomeFornecedor
								FROM pedido a
									LEFT JOIN gerente b ON b.ID_Gerente = a.ID_Gerente
									LEFT JOIN produto c ON c.ID_Produto = a.ID_Produto
									LEFT JOIN fornecedor d ON d.ID_Fornecedor = c.ID_Fornecedor
										WHERE a.ID_Gerente = '".$id_usuario."'
									
										";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0 ){
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['Numero_Pedido'];
                            $item_name = $row['NomeProduto'];
							$item_data = $row['dataPedido'];
							$item_ger = $row['NomeGerente'];
							$item_forn = $row['NomeFornecedor'];
                            $id_produto = $row['ID_Produto'];
							$id_gerente = $row['ID_Gerente'];
							$qty = $row['Quantidade'];

                            if($qty == 0){
                                $alert = "Sem Estoque";
                            }else {
                                $alert = $qty;
                            }

                    ?>
                <tr>
                    <td align="center">
                        <?php echo $id; ?>
                    </td >
					 <td align="center">
                        <?php echo $item_forn; ?>
                    </td >
                    <td align="center">
                        <?php echo $item_data; ?>
                    </td >
                    <td align="center">
                        <?php echo $alert; ?>
                    </td>
                    <td align="center">
                        <?php echo $item_name; ?>
                    </td>
					<td align="center">
                        <?php echo $item_ger; ?>
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
                                        <h4 class="modal-title">Editar Pedido</h4>
                                    </div>
                                    <div class="modal-body">
                                       <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>"> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="Numero_Pedido">Numero Pedido</label>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control" id="Numero_Pedido" name="Numero_Pedido" value="<?php echo $id; ?>" placeholder="Numero Pedido"  required autofocus> </div>
                                            <label class="control-label col-sm-3" for="item_data">Data Pedido</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="item_data" name="item_data" value="<?php echo $item_data; ?>"  required> </div>
                                        
                                            <label class="control-label col-sm-3" for="qty">Quantidade</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $qty; ?>" placeholder="Quantidade" required> 
											</div>
											<label class="control-label col-sm-3" for="id_produto">ID Produto</label>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control" id="id_produto" name="id_produto" value="<?php echo $id_produto; ?>" placeholder="ID Produto" required> 
											</div>
											<label class="control-label col-sm-3" for="qty">ID Gerente</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="id_gerente" name="id_gerente" value="<?php echo $id_gerente; ?>" placeholder="ID Gerente" required> 
											</div>
                                        </div>
                                     </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Editar </button>
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
											<div class="alert alert-danger">Tem certeza que deseja excluir o Pedido <strong>
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
						
							
                        if(isset($_POST['update_item'])){
							$id = $_POST['Numero_Pedido'];
                            $quantidade = $_POST['qty'];
							$item_data = $_POST['item_data'];
							$id_produto = $_POST['id_produto'];
							$id_gerente = $_POST['id_gerente'];
							
							$sql = "UPDATE pedido SET Quantidade='$quantidade', Quantidade='$quantidade', DataPedido = '$item_data', 
										ID_Produto = '$id_produto', ID_Gerente = '$id_gerente'
											WHERE Numero_Pedido= '$id' ";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>alert('Pedido alterado com sucesso!');</script>";
								echo "<script>window.location = 'index.php?secao=Pedido_gerente';</script>";
                            } else {
                                echo "<script>alert('Erro ao editar!');</script>";
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM pedido WHERE Numero_Pedido='$delete_id' ";
                            if (mysqli_query($con, $sql)) {
                              		echo "<script>alert('Pedido DELETADO com sucesso!');</script>";
									echo "<script>window.location = 'index.php?secao=Pedido_gerente';</script>";
							} else {
										echo "<script>alert('Erro ao deletar!');</script>";
							}
                          
                        }
                    }
							
                    //Add Item        
                    if(isset($_POST['add_item'])){
							$id = $_POST['Numero_Pedido'];
                            $data = $_POST['DataPedido'];
                            $qntd = $_POST['Quantidade'];
                           	$id_produto = $_POST['ID_Produto'];
							$id_gerente = $_POST['ID_Gerente'];
							
							$sql = "INSERT INTO pedido (Numero_Pedido,DataPedido,Quantidade,ID_Produto,ID_Gerente)VALUES ('$id','$data','$qntd','$id_produto','$id_gerente')";
                        if (mysqli_query($con, $sql)) {
                            

                           			echo "<script>alert('Pedido ADICIONADO com sucesso!');</script>";
									echo "<script>window.location = 'index.php?secao=Pedido_gerente';</script>";
                           
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
                <button style="display:block; margin-left: auto; margin-right: auto;" type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Inserir Pedido</button>
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
                        <h4 class="modal-title">Adicionar Pedido<h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            
                            <label class="control-label col-sm-2" for="Numero_Pedido">Numero Pedido</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="Numero_Pedido" name="Numero_Pedido" placeholder="Numero Pedido" autocomplete="off" required> 
							</div>
							
							<label class="control-label col-sm-3" for="DataPedido">Data Pedido</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="DataPedido" name="DataPedido"  autofocus required> 
							</div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Quantidade">Quantidade</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="Quantidade" name="Quantidade" placeholder="Quantidade" autocomplete="off" required> </div>
                            <label class="control-label col-sm-3" for="ID_Produto">ID Produto</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="ID_Produto" name="ID_Produto" placeholder="ID Produto" autocomplete="off" required> </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-2" for="ID_Gerente">ID Gerente </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="ID_Gerente" name="ID_Gerente" placeholder="ID Gerente" autocomplete="off" required> </div>
                            
                        </div>
						
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Adicionar</button>
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

</script>
