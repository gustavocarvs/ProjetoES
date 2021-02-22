<?php
session_start();

include ("../config.php");
$con = mysqli_connect($host,$login,$senha,$bd);

$CaracteresInvalidos = [';', ',', '"', "'", '\\'];
$Usu = str_replace($CaracteresInvalidos, '', addslashes(strip_tags(trim($_POST['cpf']))));
$Usu2 = str_replace($CaracteresInvalidos, '', addslashes(strip_tags(trim($_POST['cnpj']))));
$pass = crypt(str_replace($CaracteresInvalidos, '', addslashes(strip_tags(trim($_POST['password'])))),'UF');
//print_r($pass); exit;


if($Usu and !$Usu2){
	$Usu2 = "1";
}else if (!$Usu and $Usu2){
	$Usu = "1";
}else if (!$Usu and !$Usu2){
	$Usu = "";
	$Usu2 = "";
}

$Usuario = "SELECT a.* FROM cliente a 
						WHERE (a.cpfcnpj = '".$Usu."' OR a.cpfcnpj = '".$Usu2."') AND a.senha = '".$pass."' LIMIT 1 ";
$tabela = mysqli_query($con, $Usuario);
if ( $Usu == "" or $Usu2 == ""){
	$res = null;
}else{
	if(mysqli_num_rows($tabela) !=0 ){
			$res = mysqli_fetch_array($tabela);
	}
}


if ($res != null) {

	$_SESSION['LogadoCliente'] = true;
	$_SESSION['id_cliente'] = $res['Cod_Cliente'];
	$_SESSION['NomeCliente'] = $res['NomeCliente'];
	$_SESSION['cpfcnpj'] = $res['cpfcnpj'];
	header("Location:index.php");

} else {
	unset($_SESSION['LogadoCliente'], $_SESSION['NomeCliente'], $_SESSION['cpfcnpj']);
	$_SESSION['ErroMsg'] = true;
	header("Location:login.php");
	
	exit;
}