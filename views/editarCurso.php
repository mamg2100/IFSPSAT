<form class="myForm" method="post">
  <div class="form-group">
    <?php foreach($curso as $cursos): ?>
     <label for="descricao">Sigla</label>   
     <input type="text" class="form-control" id="sigla" maxlength="3" name="sigla" text-transform="uppercase" placeholder="ABC" value="<?php echo $cursos['sigla']; ?>" required>
  </div> 
  <div class="form-group"> 
     <label for="descricao">Curso</label>
     <!--<label for="ident"><?php echo $cursos['idCurso'];?></label>-->
     <input type="text" class="form-control" id="nome_curso" name="nome_curso" value = "<?php echo $cursos['nome_curso']; ?>" required>
  </div>
  <div class="form-group">  
      <label for="descricao">Ano</label>
      <input type="text" class="form-control" id="ano_criacao" name="ano_criacao" value = "<?php echo $cursos['ano_criacao']; ?>" required>
  </div>    
      <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br>
    <?php endforeach ;?>  
      <!-- mensagem para informar se um cadastro ocorreu ou não-->      
      <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
        <div class="alert alert-success">Alterado com sucesso!</div>
      <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
        <div class="alert alert-danger">Erro ao alterar!</div>
      <?php endif;?>
</form>
