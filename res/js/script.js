$(document).ready(function(){
	
	$("body").hide();
	$("body").fadeIn('slow');
	

	$('#matricula').hide();
	$("#pre-requisitos").hide();	




	$("#btn_cancel").click(function(){
			window.location="../../";
	});
	$("#btn_cadastrar").click(function(){
			window.location="../../view/cadastro/";
	});


	/* Actions - submissões de atividades */
	$(".btn_cancel_atividade").click(function(){
			window.location="../../../";
	});

	/*  Requisitos (yes or no)   */
	$("#sim").click(function(){
		$("#escolha-pre-requisitos").hide('slow');
		$("#pre-requisitos").fadeIn('slow');
	});
	
	$("#cancel_submission_activity").click(function(){
		$("#pre-requisitos").fadeOut('slow');
		$("#escolha-pre-requisitos").show('slow');
		$("#nao").click();
		
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
			
	 	
	 	
	 	/* TOOLTIPS */
	 	$('#minicurriculo').mouseover(function(){
	 		$('#minicurriculo').tooltip('show');
	 	});
	 	$('#extras').mouseover(function(){
	 		$('#extras').tooltip('show');
	 	});
	 













	 /*TEAM  -----*/


	 	

	 	$(".team").mouseover(function(){
	 		$(".team").tooltip();				
		});
		

		
	 	
});


	



	