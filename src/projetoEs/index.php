<?php

session_start();

if(!isset($_SESSION['cpfcnpj'])){
	header("Location:login.php");
}
//require "inc/Funcoes.php";
require "inc/Acesso.php";

include("../config.php");
$con = mysqli_connect($host, $login, $senha, $bd);


$nome =  $_SESSION['NomeCliente'];
$id_cliente = $_SESSION['id_cliente'];
$id_gerente = $_SESSION['id_gerente'];
?>


<head>
	<title> SuperKingFood</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
	
	<!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
	<link href="assets/css/pagina_main_two.css" rel="stylesheet" type="text/css" />
	<script src="assets/js/jquery-3.5.1.js" type="text/javascript"></script>
	<link href="assets/css/fontawesome/font-awesome.css" rel="stylesheet" type="text/css" />
	<!--<link href="bootstrap/css/bootstrap-social.css" rel="stylesheet" type="text/css" /> -->
	<!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->

	<!--<script type="text/javascript" src="js/pagina_main_two.js"></script>-->
</head>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'> 
  
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="overlay site-wrapper ">
<body class="login page-home" style="background-image: url(BG-NOVO.png);
						background-position: center;
						background-size: cover; line-height: 1;">
						
						<!-- Logo -->
	
<?php 
if($id_cliente != 1){
?>					

	
<nav class="social">	
	<ul>
	
		<li><a href="?secao=Perfil_cliente">CLIENTE <i class="fa fa-user"></i></a></li>
		<li><a href="?secao=Vendas_cliente">VENDAS <i class="fa fa-shopping-cart"></i></a></li>
		<li><a href="?secao=Produto_cliente">PRODUTO <i class="fa fa-archive"></i></a></li>
		<li><a href="?secao=Senha_cliente">SENHA <i class="fa fa-unlock"></i></a></li>
		<li><a href="?secao=Sair_cliente">SAIR <i class="fa fa-sign-out"></i></a></li>
	</ul>
</nav>
	
	<?php
	
	$validas = array('Perfil_cliente','Vendas_cliente','Produto_cliente','Senha_cliente','Sair_cliente');
	if (in_array($_GET['secao'], $validas)) {
		require ($_GET['secao'] . '.php');
	} 
	
	
}else{
	?>
<nav class="social">
	<ul>
	
		<li><a href="?secao=Perfil_gerente">GERENTE <i class="fa fa-user"></i></a></li>
		<li><a href="?secao=Pedido_gerente">PEDIDO <i class="fa fa-file-text"></i></a></li>
		<li><a href="?secao=Produto_gerente">PRODUTO <i class="fa fa-archive"></i></a></li>
		<li><a href="?secao=Fornecedor_gerente">FORNECEDOR <i class="fa fa-truck"></i></a></li>
		<li><a href="?secao=Senha_gerente">SENHA <i class="fa fa-unlock"></i></a></li>
		<li><a href="?secao=Sair_gerente">SAIR <i class="fa fa-sign-out"></i></a></li>
	</ul>
</nav>
	
	
<?php
	
	$validas2 = array('Perfil_gerente','Pedido_gerente','Produto_gerente','Senha_gerente','Fornecedor_gerente','Sair_gerente');
	if (in_array($_GET['secao'], $validas2)) {
		require ($_GET['secao'] . '.php');
	} 
		
}
	

	?>

	
</body>
</div>
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
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="Personalizados/js/sair.js?<?= filemtime('Personalizados/js/sair.js'); ?>"></script>