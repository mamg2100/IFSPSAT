 $(document).ready(function () {
            $('#paginacao').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)"
             }
     });

    $('.close').click(function(){
        $('.msg').hide();
    });
    $('.msg').fadeOut(6000);
});

 $(function(){
    $("select").change(function(){
        var value = $(this).val();
        $.ajax({
            url:'ajax/ajax.php',
            method:'post',
            data:{'id':value},
            success:function(res){
                /*$('.text').val(res);*/
                $('.text').html(res);
            }
        });
    });
    $("#dtIngresso").change(function(){
        var ingresso = $(this).val();
        var dt = new Date(ingresso).getTime();
        var limite = dt+189302400000;
        newDt = new Date(limite).toLocaleDateString();
        newData = newDt.split("/").reverse().join("-");
        $("#dataLimite").val(newData);
    });
});