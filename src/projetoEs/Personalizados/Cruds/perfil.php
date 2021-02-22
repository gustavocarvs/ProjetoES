<?php
header('Content-type: text/html; charset=iso-8859-1');
//require "inc/Acesso.php";
include "../../../config.php";



$con = mysqli_connect($host,$login,$senha,$bd);
$id['id_usuario'] 		= $_POST['id_usuario'];		
$dados['NomeCliente'] 	= $_POST['nome'];
$dados['telefone'] 		= $_POST['telefone'];
$dados['logradouro'] 	= $_POST['logradouro'];
$dados['numero'] 		= $_POST['numero'];
$dados['bairro']		= $_POST['bairro'];
$dados['cidade'] 		= $_POST['cidade'];
$dados['estado'] 		= $_POST['estado'];
$dados['cep'] 			= $_POST['cep'];

$Usuario = "UPDATE cliente a INNER JOIN telefonecliente b ON b.Cod_Cliente = a.Cod_Cliente SET a.NomeCliente = '".$dados['NomeCliente']."', a.logradouro = '".$dados['logradouro']."',	a.numero = '".$dados['numero']."', a.bairro = '".$dados['bairro']."', 
				a.cidade = '".$dados['cidade']."', a.estado = '".$dados['estado']."', a.cep = '".$dados['cep']."'
					WHERE a.Cod_Cliente = '".$id['id_usuario']."' ";

$tabela = mysqli_query($con, $Usuario);

if (mysqli_query($con, $Usuario)) {
		echo "<script>alert('Dados cadastrados com sucesso!');</script>";
		echo "<script>window.location = '../../index.php?secao=Perfil_gerente';</script>";
	
}
else{
	
	echo "<script>alert('".$id['id_usuario']." ');</script>";
	echo "<script>window.location = '../../index.php?secao=Perfil_gerente';</script>";
}
?>