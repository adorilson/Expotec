$(document).ready(function(){
	
	$("body").hide();
	$("body").fadeIn('slow');
	

	$('#matricula').hide();
	
	$('#horario_1').hide();
	$('#horario_2').hide();
	$('#horario_3').hide();
	



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

	/*  Selectiong the day and hour  */
	$("#dia").change(function() {
	 		
		var el =  document.getElementById('dia');
	 	if(el.value == "primeiro"){
	 		$('#horario_1').show('slow');
	 		$('#horario_2').hide('slow');
	 		

	 		$('#horario_3').hide('slow');
	 	}
	 	else if(el.value == "segundo"){
	 		$('#horario_2').show('slow');

	 		$('#horario_1').hide('slow');
	 		$('#horario_3').hide('slow');
	 	}	
	 	else if(el.value == "terceiro"){
	 		$('#horario_3').show('slow');

	 		$('#horario_1').hide('slow');
	 		$('#horario_2').hide('slow');
	 	}
	 	else{
	 		$('#horario_3').hide('slow');
	 		$('#horario_1').hide('slow');
	 		$('#horario_2').hide('slow');
	 		
	 	}
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


	



	