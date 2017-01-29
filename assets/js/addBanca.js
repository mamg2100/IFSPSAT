$(function(){
	$('#membrodois').change(function(){
		var val = $(this).val();
		$.ajax({
			url: BASE+'ajax/addBanca/'+val,
			method: 'post',
			data:{'id':val},
			dataType: 'json',
			success:function(res){
				for(var i in res){
					$('input[name=nomeMembrodois]').val(res.nome);
					$('input[name=identMembro]').val(res.identificacao);
				}
			}
		});
	});
});