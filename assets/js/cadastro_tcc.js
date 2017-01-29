$(function(){
	$('#aluno1').change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(res){
				$("#nome_usuario_selecionado").val(res);
			}
		});
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
	});
	$('#aluno2').change(function(){
		if($("#aluno1").val() == ''){
			alert("Preencha o campo: Aluno 1");
			$(this).val("");	
			$("#aluno1").focus();

		}
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(res){
				$("#nome_usuario_selecionado2").val(res);
			}
		});
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
	});

	$('#orientador').change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(res){
				$("#nome_professor_selecionado").val(res);
			}
		});
	});

	$('#coorientador').change(function(){
		var value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getId/'+value,
			method:'post',
			data:{'id':value},
			success:function(res){
				$("#nome_professor_selecionado2").val(res);
			}
		});
	});
	$('#aluno1').change(function(){
		var valor = $("#aluno1").val();
		if(valor != ''){
			$('#status').html('<option value="0">Disponível</option><option selected="selected" value="1">Formalizado</option><option value="2">Qualificado</option><option value="3">Aprovado</option><option value="4">Reprovado</option><option value="5">Jubilado</option>');
		}else{
			$('#status').html('<option selected="selected" value="0">Disponível</option><option value="1">Formalizado</option><option value="2">Qualificado</option><option value="3">Aprovado</option><option value="4">Reprovado</option><option value="5">Jubilado</option>');
		}
	})
	$("aluno1").change(function(){
	var idPessoa = $(this).val();
	alert(idPessoa);
	/*var data = new Date().getTime();
	console.log(data+189228171115);
   	//189228171115  = 6 anos em millisegundos

   	var d = new Date(1673748091426).toUTCString();

   	var dataa = new Date().toLocaleDateString();
   	newDt = dataa.split("/").reverse().join("-");
   	$("#ddd").val(newDt);*/	
	});
});