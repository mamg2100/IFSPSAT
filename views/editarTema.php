<form class="myForm" method="post">
  <div class="form-group"> 
    <?php foreach($tema as $temas): ?>
     <label for="descricao">Descrição</label>
     <label for=""> #<?php echo $temas['idTema'];?></label>
     <input type="text" class="form-control" id="descricao" name="descricao" value = "<?php echo $temas['descricao']; ?>" required>
  </div>
  <div class="form-group">  
     <label for="status">Status</label> 

     <input type="text" class="form-control" id="status" name="status" value = "<?php echo $temas['status']; ?>" required>
  </div>   
  <div class="form-group">  
      <label for="prontuario">Prontuário Vinculado</label>
      <input type="text" class="form-control" id="prontuario" name="prontuario" value = "<?php echo $temas['prontuario']; ?>" required>
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

