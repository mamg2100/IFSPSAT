$(function(){
	$("#sub1").click(function(){
		$("tr td").hide();
		var dataInicio = $("#dataInicio").val();
		var dataFim = $("#dataFim").val();
		$.ajax({
			url: BASE+'ajax/pesquisa1',
			method:'post',
			data:{'dataInicio':dataInicio,'dataFim':dataFim},
			dataType:'json',
			success:function(res){
				if(res.length > 0){
					for(var i in res){
						if(res[i].aluno1 != ''){
						var dataFinal = res[i].dtDefesa;
						newDtFinal = dataFinal.split("-").reverse().join("/");
						$(".p1").after('<tr><td>'+res[i].aluno1+'</td><td>'+res[i].aluno2+'</td><td>'+res[i].titulo+'</td><td><a href="'+BASE+'relatorio/listarTcc/pesquisa1/'+res[i].idTcc+'"><button type="button" class="btn btn-sm btn-info">Detalhes</button></a></td></tr>');
						}
					}	
				}else{
					$(".p1").after("Nenhum dado encontrado");
				}
			}
		});
	});

	$("#sub2").click(function(){
		$("tr td").hide();
		var professor = $("#professor").val();
		var ano       = $("#ano").val();

		$.ajax({
			url: BASE+'ajax/pesquisa2',
			method:'post',
			data:{'professor':professor,'ano':ano},
			dataType:'json',
			success:function(res){
				if(res.length > 0){
					for(var i in res){
						var dataFinal = res[i].dtMaxDefesa;
						newDtFinal = dataFinal.split("-").reverse().join("/");
						$(".p2").after('<tr><td>'+res[i].aluno1+'</td><td>'+res[i].aluno2+'</td><td>'+res[i].orientador+'</td><td><a href="'+BASE+'relatorio/ver/'+res[i].idTcc+'"><button type="button" class="btn btn-sm btn-info">Detalhes</button></a></td></tr>');
					}	
				}else{
					$(".p2").after("Nenhum dado encontrado");
				}
			}
		});
	});

	$("#sub3").click(function(){
		$("tr td").hide();
		$(".p3").html("");
		var aluno = $("#aluno").val();
		var dataInicio = $("#dataInicio3").val();
		var dataFim = $("#dataFim3").val();

		$.ajax({
			url: BASE+'ajax/pesquisa3',
			method:'post',
			data:{'aluno':aluno,'dataInicio':dataInicio,'dataFim':dataFim},
			dataType:'json',
			success:function(res){
				if(res.length > 0){
					for(var i in res){

						if(res[i].status == 0){
							var status = 'Disponível';
						}else if(res[i].status == 1){
							var status = 'Formalizado';
						}else if(res[i].status == 2){
							var status = 'Qualificado';
						}else if(res[i].status == 3){
							var status = 'Aprovado';
						}else{
							var status = 'Jubilado';
						}



						var dataFinal = res[i].dtMaxDefesa;
						newDtFinal = dataFinal.split("-").reverse().join("/");
						$(".p3").after('<tr><td>'+res[i].aluno1+'</td><td>'+res[i].titulo+'</td><td>'+status+'</td><td><a href="'+BASE+'relatorio/ver/'+res[i].idTcc+'"><button type="button" class="btn btn-sm btn-info">Detalhes</button></a></td></tr>');
					}	
				}else{
					$(".p3").html("Nenhum dado encontrado");
				}
			}
		});
	});

	$("#sub4").click(function(){
		$("tr td").hide();
		$(".p4").html("");
		var area = $("#area").val();
		var dataInicio = $("#dataInicio4").val();
		var dataFim = $("#dataFim4").val();

		$.ajax({
			url: BASE+'ajax/pesquisa4',
			method:'post',
			data:{'area':area,'dataInicio':dataInicio,'dataFim':dataFim},
			dataType:'json',
			success:function(res){
				if(res.length > 0){
					for(var i in res){
						$(".p4").after('<tr><td>'+res[i].descricao+'</td><td>'+res[i].titulo+'</td><td><a href="'+BASE+'relatorio/ver/'+res[i].idTcc+'"><button type="button" class="btn btn-sm btn-info">Detalhes</button></a></td></tr>');
					}	
				}else{
					$(".p4").html("Nenhum dado encontrado");
				}
			}
		});
	});
	$("#sub5").click(function(){
		$("tr td").hide();
		$(".p5").html("");
		var interval = $("#interval").val();

		$.ajax({
			url: BASE+'ajax/pesquisa5',
			method:'post',
			data:{'interval':interval},
			dataType:'json',
			success:function(res){
				if(res.length > 0){
					for(var i in res){
						var dt = new Date(res[i].data_limite).getTime();
   						newDt = new Date(dt).toLocaleDateString();
   						newData = newDt.split("-").reverse().join("/");
						$(".p5").after('<tr><td>'+res[i].nome+'</td><td>'+newData+'</td><td><a href="'+BASE+'relatorio/ver/'+res[i].idTcc+'"><button type="button" class="btn btn-sm btn-info">Detalhes</button></a></td></tr>');
					}	
				}else{
					$(".p5").html("Nenhum dado encontrado");
				}
			}
		});
	});

});