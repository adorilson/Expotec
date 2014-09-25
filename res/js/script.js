$(document).ready(function(){
	
	$("body").hide();
	$("body").fadeIn('slow');
	
	$('#matricula').hide();

	$("#btn_cancel").click(function(){
			window.location="../../";
	});
	$("#btn_cadastrar").click(function(){
			window.location="../../view/cadastro/";
	});


	/* Actions - submissões de atividades */
	$("#btn_cancel_palestra").click(function(){
			window.location="../../../";
	});
	
	/* Actions - admin login */
	$("#admin_cancel").click(function(){
			window.location="../";
	});
	


	/* VERIFYING if type is aluno or teacher  */
	 	$("#tipo").change(function() {
	 		
	 		var el =  document.getElementById('tipo');
	 		if(el.value == "aluno" || el.value == "professor" ){
	 			$('#matricula').show('slow');
	 		}
	 		else{
	 			$('#matricula').hide('slow');
	 		}	
	 	});	



	 	
 	
});


	



	