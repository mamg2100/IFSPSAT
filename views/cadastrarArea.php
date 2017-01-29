<form class="myForm" method="post">
  <div class="well">Área | Cadastro</div>
  <div class="form-group">
    <label for="descricao">Área</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="" required>
  </div>
  <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Área</button><br><br>
  
  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Cadastrado com sucesso! <i class="close">x</i></div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger msg">Erro ao cadastrar!</div>
  <?php endif;?>
</form>