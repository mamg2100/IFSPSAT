$(function(){
	$("#anexo1").change(function(){
		alert("Você alterou a situação da defesa, altere o status.");
		$(".well").after('<div class="alert alert-warning" id="alert">Atualize o status para :"Formalizado"</div>');
		$("#status").focus();
	});

	$("#sitQualif").change(function(){
		var sit = $("#sitQualif").val();
		if(sit == 0){
			alert("Você alterou a situação da defesa, altere o status.");
			$(".well").after('<div class="alert alert-warning" id="alert">Atualize o status para :"Qualificado"</div>');
			$("#status").focus();
		}
	});
	$("#sitDefesa").change(function(){
		var sit = $("#sitDefesa").val();
		if(sit == 0 || sit == 1){
			alert("Você alterou a situação da defesa, altere o status.");
				$(".well").after('<div class="alert alert-warning" id="alert">Atualize o status para :"Aprovado"</div>');
				$("#status").focus();
		}
	});

	$("#status").change(function(){
		$("#alert").hide();
	});
	$("#aluno1").change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getData/'+value,
			method:'post',
			data:{'id':value},
			success:function(res){
   				//189302400000  = 6 anos em millisegundos
   					$("#data_aluno1").val(res);
   					var dt = new Date(res).getTime();
   					var limite = dt+189302400000;
   					newDt = new Date(limite).toLocaleDateString();
   					newData = newDt.split("/").reverse().join("-");
   				$("#dtMaxDefesa").val(newData);
			}
		});
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(nome){
				$("#nomeAluno1").val(nome);
			}
		});
	});
	$("#aluno2").change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getData/'+value,
			method:'post',
			data:{'id':value},
			success:function(res){
   				//189228171115  = 6 anos em millisegundos]
   				var dt1 = $("#data_aluno1").val();
				var dt2 = res;

				var newDt1 = new Date(dt1).getTime();
				var newDt2 = new Date(dt2).getTime();
				if(newDt2 < newDt1){
	   				var limite = newDt2+189302400000;
	   				newDtLimite = new Date(limite).toLocaleDateString();
	   				newData2 = newDtLimite.split("/").reverse().join("-");
	   				$("#dtMaxDefesa").val(newData2);
	   			}else{
	   				var limite = newDt1+189302400000;
	   				newDtLimite = new Date(limite).toLocaleDateString();
	   				newData2 = newDtLimite.split("/").reverse().join("-");
	   				$("#dtMaxDefesa").val(newData2);
	   			}
   			}
		});
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(nome){
				$("#nomeAluno2").val(nome);
			}
		});
	});
	$("#orientador").change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(nome){
				$("#nomeOrientador").val(nome);
			}
		});
	});
	$("#coorientador").change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(nome){
				$("#nomeCoorientador").val(nome);
			}
		});
	});
});