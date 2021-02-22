
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>SuperKingFood</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/pagina_main.css" rel="stylesheet" type="text/css" />
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!--<link href="assets/css/pagina_main.css" rel="stylesheet" type="text/css" />-->
	<link href="assets/css/fontawesome/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/bootstrap-social.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="assets/css/login.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->
	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	
	

	
	
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->
	<!-- Beautiful Checkboxes -->
	<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
</head>
<div class="overlay site-wrapper ">

<body class="login page-home" style="background-image: url(BG-NOVO.png);
    background-position: center;
    background-size: cover;
	background-color: rgba(14, 17, 24, 0.82);">
	<!-- Logo -->
	<div class="logo">
		<img src="assets/img/logo.png" class="animate__animated animate__backInDown" alt="SuperKingFood" />
	</div>
	<!-- /Logo -->

	<!-- Login Box -->
	<div class="box box_inicio ">
		<div class="content">
				<div >
					<img class="img-user" src="assets/img/user5.png" />
				</div>
			<!-- Login Formular -->
			<form class="form-vertical login-form" action="logar.php" method="post">
				
			   
			   <label for="pessoaFisica" >
					<div>
						<input type="radio" name="tipo" value="pessoaFisica" id="pessoaFisica" class="hidden" checked />
						<span class="labell"></span><font style="color: #999 !important;">Pessoa Física</font>
						
						
					</div>
				</label>
				 <label for="pessoaJuridica" >
					<div>
						<input type="radio" name="tipo" value="pessoaJuridica" id="pessoaJuridica"  class="hidden" />
						<span class="labell"></span><font style="color: #999 !important;">Pessoa Jurídica</font>
						
						
					</div>
				</label>
				
				<!-- Input Fields -->
				<div class="label-float campoPessoaFisica">
					<!--<label for="username">Username:</label>-->
					
						<input type="text" name="cpf" id="cpf" placeholder=" " >
						<label><font style="color: #999 !important;">CPF</font></label>
					
				</div>
				<div class="label-float campoPessoaJuridica">
					<!--<label for="username">Username:</label>-->
					
						<input type="text" name="cnpj" id="cnpj" placeholder=" " >
						<label><font style="color: #999 !important;">CNPJ</font></label>
					
				</div>
			
				<div class="label-float">
					
						
					<input type="password" name="password" id="password"  placeholder=" "  required="" data-rule-required="true"  />
					<label>Senha</label>
					<i id="showPassword" value="Mostrar" class="icon-eye-open bloco"></i>					
						
				</div>		
						
				&nbsp;
				<div align="right">
					<a href="javascript:void(0);" id="forgot" class="sign-up">Esqueceu sua senha?</a>
				</div>
				<!-- /Input Fields -->
				<!-- Form Actions -->
				<br><br><br><br>
				<div class="form-group">
					
					<button type="submit" class="submit btn-2 btn-entrar ">
						Entrar 
					</button>
				</div>
			</form>
			<!-- /Login Formular -->
		</div> <!-- /.content -->
	</div>
	
	<div class="box box_forgot animate__animated animate__flipInX ">
		<div class="content">
				
			<!-- Login Formular -->
			<form class="form-vertical login-form" action="" method="post">
			<div align="left">
					<a href="login.php" id="img_back" class="sign-up"><img class="img-button-back" src="assets/img/back.png" /></a>
			</div>	<!-- Title -->
			<br><br>
			
				<div class="redefinicao">
					<b>ESQUECEU SUA SENHA?</b>
				</div>
				<br>
				
				<br>
				  <label for="pessoaFisicaForgot" >
					<div>
						<input type="radio" name="tipoForgot" value="pessoaFisicaForgot" id="pessoaFisicaForgot" class="hidden" checked />
						<span class="labell"></span><font style="color: #999 !important;">Pessoa Física</font>
						
						
					</div>
				</label>
				 <label for="pessoaJuridicaForgot" >
					<div>
						<input type="radio" name="tipoForgot" value="pessoaJuridicaForgot" id="pessoaJuridicaForgot"  class="hidden" />
						<span class="labell"></span><font style="color: #999 !important;">Pessoa Jurídica</font>
						
						
					</div>
				</label>
				
				<!-- Input Fields -->
				<div class="label-float campoPessoaFisicaForgot">
					<!--<label for="username">Username:</label>-->
					
						<input type="text" name="cpfForgot" id="cpfForgot" placeholder=" " >
						<label><font style="color: #999 !important;">CPF</font></label>
					
				</div>
				<div class="label-float campoPessoaJuridicaForgot">
					<!--<label for="username">Username:</label>-->
					
						<input type="text" name="cnpjForgot" id="cnpjForgot" placeholder=" ">
						<label><font style="color: #999 !important;">CNPJ</font></label>
					
				</div>
				
			
				
				
				
				<!-- /Input Fields -->
				<!-- Form Actions -->
				<br>
				<div class="form-group">
					
					<button type="submit" class="submit btn-2 btn-entrar " value="Enviar">
					Enviar
					</button>
							
				</div>
			</form>
			<!-- /Login Formular -->
		</div> <!-- /.content -->
	</div>
	<!-- /Login Box -->
	<!-- Footer -->

	<!-- /Footer -->
</body>
</div>
</html>
<script src="Personalizados/js/login.js"></script>


<style>

a:link 
{ 
 text-decoration:none; 
} 
</style>