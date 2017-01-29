<form class="myForm" method="post">
  <div class="form-group">
    <?php foreach($area as $areas): ?>
      <label for="descricao">Área</label>
      <label for="ident"><?php echo $areas['idarea'];?></label>
      <input type="text" class="form-control" id="descricao" name="descricao" value = "<?php echo $areas['descricao']; ?>" required>
  </div>
      <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br>
  <?php endforeach ;?> 
      <!-- mensagem para informar se um cadastro ocorreu ou não-->
      <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
        <div class="alert alert-success">Alterada com sucesso!</div>
      <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
        <div class="alert alert-danger">Erro ao Alterar!</div>
      <?php endif;?>
</form>