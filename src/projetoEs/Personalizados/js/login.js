$(document).ready(function(){
 
  // Click event of the showPassword button
  $('#showPassword').on('click', function(){
     
    // Get the password field
    var passwordField = $('#password');
 
    // Get the current type of the password field will be password or text
    var passwordFieldType = passwordField.attr('type');


   // Check to see if the type is a password field
    if(passwordFieldType == 'password')
    {	
        // Change the password field to text
        passwordField.attr('type', 'text');
		
	   // Change the Text on the show password button to Hide
      $(this).addClass('icon-eye-open-Hover');
		
		
    } else {
		
        // If the password field type is not a password field then set it to password
        passwordField.attr('type', 'password');
		$(this).removeClass('icon-eye-open-Hover');
        // Change the value of the show password button to Show
      
		
	}
	
  });
  $('#showNovaSenha').on('click', function(){
     
    // Get the password field
    var passwordField = $('#novasenha');
 
    // Get the current type of the password field will be password or text
    var passwordFieldType = passwordField.attr('type');


   // Check to see if the type is a password field
    if(passwordFieldType == 'password')
    {	
        // Change the password field to text
        passwordField.attr('type', 'text');
		
	   // Change the Text on the show password button to Hide
      $(this).addClass('icon-eye-open-Hover');
		
		
    } else {
		
        // If the password field type is not a password field then set it to password
        passwordField.attr('type', 'password');
		$(this).removeClass('icon-eye-open-Hover');
        // Change the value of the show password button to Show
      
		
	}
	
  });
  
 
});

$( document ).ready(function() {
     $(".campoPessoaFisica").show();
	 $(".campoPessoaJuridica").hide();
});
$( document ).ready(function() {
     $(".campoPessoaFisicaForgot").show();
	 $(".campoPessoaJuridicaForgot").hide();
});


$( document ).ready(function() {
     $(".box_inicio").show();
	 $(".box_forgot").hide();
});

$("input:radio[name=tipo]").on("change", function () {   
    if($(this).val() == "pessoaFisica")
    {
    	$(".campoPessoaFisica").show();
		
		
        $(".campoPessoaJuridica").hide();
 
    }
    else if($(this).val() == "pessoaJuridica")
    {
    	$(".campoPessoaFisica").hide(); 
        $(".campoPessoaJuridica").show();    
    }
});

$("input:radio[name=tipoForgot]").on("change", function () {   
    if($(this).val() == "pessoaFisicaForgot")
    {
    	$(".campoPessoaFisicaForgot").show(); 
        $(".campoPessoaJuridicaForgot").hide();
    }
    else if($(this).val() == "pessoaJuridicaForgot")
    {
    	$(".campoPessoaFisicaForgot").hide(); 
        $(".campoPessoaJuridicaForgot").show();   
    }
});

$("#forgot").on('click', function () {
	$(".box_inicio").hide();
	$(".box_forgot").show(); 
 
});
$("#img_back").on('click', function () {
    $(".box_inicio").show();
	$(".box_forgot").hide();
 
});



$(document).ready(function(){
	$("#cpf").mask("999.999.999-99");
});

$(document).ready(function(){
	$("#cnpj").mask("999.999.999/9999-99");
});

$(document).ready(function(){
			$("#cnpjForgot").mask("999.999.999/9999-99");
});

$(document).ready(function(){
			$("#cpfForgot").mask("999.999.999-99");
});

