<div class="well">Formulário de Contato
</div>
    <?php 
    if (!empty($aviso)){
	    var_dump($aviso);
	}
	?>
<form method='POST'>
	<div class="form-group">
      <label>Nome</label><span class="val"></span>
      
      <input type="text" class="form-control" id="nome" name="nome" value="" placeholder="">
    </div>
    <div class="form-group">
      <label>Email</label><span class="val"></span>
      
      <input type="text" class="form-control" id="email" name="email" value="" placeholder="">
    </div>
    <div class="form-group">
      <label>Mensagem</label><span class="val"></span>
      
      <textarea type="text" class="form-control" id="mensagem" name="mensagem" value="" >
      </textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-md">Enviar Mensagem</button> 
</form>
