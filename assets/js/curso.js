$(function(){
	$("#curso").change(function(){
		value = $(this).val();
		$.ajax({
			url: BASE+'ajax/getIdCurso/'+value,
			method: 'post',
			data:{'id':value},
			success:function(res){
			//	$("#id").html(res)
			}
		});
	});
});