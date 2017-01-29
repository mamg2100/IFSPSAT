$(function(){
	$('input[name=cep]').on('blur',function(){
		var cep = $(this).val();
		$.ajax({
			url:'https://viacep.com.br/ws/'+cep+'/json/',
			data: 'GET',
			dataType: 'json',
			success:function(json){
				for(var i in json){
					$('input[name=endereco]').val(json.logradouro);
					$('input[name=bairro]').val(json.bairro);
					$('input[name=cidade]').val(json.cidade);
					$('input[name=cidade]').val(json.localidade);
					$('input[name=estado]').val(json.uf);
					$('input[name=pais]').val('Brasil');
				}
			}
		})
	});
});