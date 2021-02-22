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
							<i class="icon-archive ic" style="display:block; margin-left: auto; margin-right: auto; width: fit-content;"></i>
								<br><br>
								
								<h4 style="margin-top: -35px ;display: block;  margin-right: auto;  margin-left: auto;" id="Cadastro"> PRODUTO</h4>
							
								<br>
								
							

						
							 
								<br>
								<table id="example" class="table table-hover" >
									<thead>
										<tr>
											
											<th scope="col" style="text-align:center;">ID</th>
											<th scope="col" style="text-align:center;">NOME</th>
											<th scope="col" style="text-align:center;">MARCA</th>
											<th scope="col" style="text-align:center;">ESTOQUE</th>
											<th scope="col" style="text-align:center;">VALOR DE COMPRA</th>
											<th scope="col" style="text-align:center;">VALOR DE VENDA</th>
											<th scope="col" style="text-align:center;">FORNECEDOR</th>
											<th scope="col" style="text-align:center;">CLIENTE</th>
											<th scope="col" style="text-align:center;">ACAO</th>
										</tr>
									</thead>
									
									<tbody>
                <?php 
                    $sql = "SELECT c.*, d.ID_Fornecedor, d.NomeFornecedor, b.Cod_Cliente, b.NomeCliente
								FROM produto c
									LEFT JOIN cliente b ON b.Cod_Cliente = c.Cod_Cliente
									LEFT JOIN fornecedor d ON d.ID_Fornecedor = c.ID_Fornecedor
										WHERE c.Cod_Cliente = '".$id_usuario."'
									
										";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0 ){
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['ID_Produto'];
							$item_name = $row['NomeProduto'];
							$item_category = $row['Marca'];
							$item_sell = $row['ValorDeVenda'];
							$item_buy = $row['ValorDeCompra'];
							$qty = $row['qntdEstoque'];
							$nome_forn = $row['NomeFornecedor'];
							$id_forn = $row['ID_Fornecedor'];
							$id_cliente = $row['Cod_Cliente'];
							$nome_cliente = $row['NomeCliente'];


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
                        <?php echo $item_name; ?>
                    </td >
                    <td align="center">
                        <?php echo $item_category; ?>
                    </td >
                    <td align="center">
                        <?php echo $alert; ?>
                    </td>
                    <td align="center">
                        <?php echo $item_buy; ?>
                    </td>
					<td align="center">
                        <?php echo $item_sell; ?>
                    </td>
					<td align="center">
                        <?php echo $nome_forn; ?>
                    </td>
					<td align="center">
                        <?php echo $nome_cliente; ?>
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
                                        <h4 class="modal-title">Editar Produto</h4>
                                    </div>
                                    <div class="modal-body">
                                       <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>"> 
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="ID_Produto">ID Produto</label>
                                            <div class="col-sm-3">
                                                <input type="text" readonly class="form-control" id="ID_Produto" name="ID_Produto" value="<?php echo $id; ?>" placeholder="ID Produto"  required autofocus> </div>
                                            <label class="control-label col-sm-3" for="NomeProduto">Nome Produto</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="NomeProduto" name="NomeProduto" value="<?php echo $item_name; ?>"  required> </div>
                                        
                                            <label class="control-label col-sm-3" for="Marca">Marca</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="Marca" name="Marca" value="<?php echo $item_category; ?>" placeholder="Marca" required> 
											</div>
											<label class="control-label col-sm-3" for="ValorDeVenda">Valor de Venda</label>
                                            <div class="col-sm-3">
                                                <input type="number" step="0.01" readonly class="form-control" id="ValorDeVenda" name="ValorDeVenda" value="<?php echo $item_sell; ?>" placeholder="R$" required> 
											</div>
											<label class="control-label col-sm-3" for="ValorDeCompra">Valor de Compra</label>
                                            <div class="col-sm-3">
                                                <input type="number" step="0.01" class="form-control" id="ValorDeCompra" name="ValorDeCompra" value="<?php echo $item_buy; ?>" placeholder="R$" required> 
											</div>
											<label class="control-label col-sm-3" for="qntdEstoque">Qntd Estoque</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="qntdEstoque" name="qntdEstoque" value="<?php echo $qty; ?>" placeholder="Estoque" required> 
											</div>
											<label class="control-label col-sm-3" for="ID_Fornecedor">ID Fornecedor</label>
                                            <div class="col-sm-3">
                                                <input type="text"readyonly class="form-control" id="ID_Fornecedor" name="ID_Fornecedor" value="<?php echo $id_forn; ?>" placeholder="ID " required> 
											</div>
											<label class="control-label col-sm-3" for="Cod_Cliente">ID Cliente</label>
                                            <div class="col-sm-3">
                                                <input type="text" readyonly class="form-control" id="Cod_Cliente" name="Cod_Cliente" value="<?php echo $id_cliente; ?>" placeholder="ID " required> 
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
											<div class="alert alert-danger">Tem certeza que deseja excluir  <strong>
													<?php echo $item_name; ?>?</strong> 
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
							$id = $_POST['ID_Produto'];
							$item_name = $_POST['NomeProduto'];
							$item_category = $_POST['Marca'];
							$item_sell = $_POST['ValorDeVenda'];
							$item_buy = $_POST['ValorDeCompra'];
							$qty = $_POST['qntdEstoque'];
							//$nome_forn = $_POST['NomeFornecedor'];
							
							//$nome_cliente = $_POST['NomeCliente'];
							
							
												
							$sql = "UPDATE produto SET NomeProduto = '$id', Marca = '$item_category', ValorDeVenda = '$item_sell' , ValorDeCompra = '$item_buy',
									qntdEstoque = '$qty'	
											WHERE ID_Produto= '$id' ";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>alert('Produto alterado com sucesso!');</script>";
								echo "<script>window.location = 'index.php?secao=Produto_gerente';</script>";
                            } else {
                                echo "<script>alert('Erro ao editar!');</script>";
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM produto WHERE ID_Produto='$delete_id' ";
                            if (mysqli_query($con, $sql)) {
                              		echo "<script>alert('Produto DELETADO com sucesso!');</script>";
									echo "<script>window.location = 'index.php?secao=Produto_gerente';</script>";
							} else {
										echo "<script>alert('Erro ao deletar!');</script>";
							}
                          
                        }
                    }
							
                    //Add Item        
                    if(isset($_POST['add_item'])){
							$id = $_POST['ID_Produto'];
							$item_name = $_POST['NomeProduto'];
							$item_category = $_POST['Marca'];
							$item_sell = $_POST['ValorDeVenda'];
							$item_buy = $_POST['ValorDeCompra'];
							$qty = $_POST['qntdEstoque'];
							$id_forn = $_POST['ID_Fornecedor'];
							$id_cliente = $_POST['Cod_Cliente'];
							
							$sql = "INSERT INTO produto (ID_Produto,NomeProduto,Marca,qntdEstoque,ValorDeCompra,ValorDeVenda,ID_Fornecedor,Cod_Cliente)
									VALUES ('$id','$item_name','$item_category','$qty','$item_buy','$item_sell','$id_forn','$id_cliente')";
                        if (mysqli_query($con, $sql)) {
                            

                           			echo "<script>alert('Produto ADICIONADO com sucesso!');</script>";
									echo "<script>window.location = 'index.php?secao=Produto_gerente';</script>";
                           
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
                <button style="display:block; margin-left: auto; margin-right: auto;" type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Inserir Produto</button>
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
                        <h4 class="modal-title">Adicionar Produto<h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            
                            <label class="control-label col-sm-2" for="ID_Produto">ID</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="ID_Produto" name="ID_Produto" placeholder="ID Produto" autocomplete="off" required> 
							</div>
							
							<label class="control-label col-sm-3" for="NomeProduto">Nome</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="NomeProduto" name="NomeProduto" placeholder="Nome" autofocus required> 
							</div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Marca">Marca</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca" autocomplete="off" required> </div>
                            <label class="control-label col-sm-3" for="qntdEstoque">Estoque</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="qntdEstoque" name="qntdEstoque" placeholder="Estoque" autocomplete="off" required> </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-sm-2" for="ValorDeCompra">Valor de Compra </label>
                            <div class="col-sm-2">
                                <input type="number" step="0.01" class="form-control" id="ValorDeCompra" name="ValorDeCompra" placeholder="R$" autocomplete="off" required> </div>
                            <label class="control-label col-sm-3" for="ValorDeVenda">Valor de Venda </label>
                            <div class="col-sm-3">
                                <input type="number" step="0.01" class="form-control" id="ValorDeVenda" name="ValorDeVenda" placeholder="R$ " autocomplete="off" required> </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="ID_Fornecedor">ID Fornecedor </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="ID_Fornecedor" name="ID_Fornecedor" placeholder="ID Fornecedor" autocomplete="off" required> </div>
                            <label class="control-label col-sm-3" for="Cod_Cliente">ID Cliente </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="Cod_Cliente" name="Cod_Cliente" placeholder="ID Cliente" autocomplete="off" required> </div>
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
    text-decoration: none !important;
}

</style>

<script>
.form-control: disabled {
	background-color: #cccccc;
    opacity: 1;
}

</script>
