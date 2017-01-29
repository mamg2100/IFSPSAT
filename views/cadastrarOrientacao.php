<form class="myForm" method="post">
  
  <div class="form-group">
    <label for="orientador"></label>
    <input type="text" class="form-control" id="orientador" name="orientador" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="orientado"></label>
    <input type="text" class="form-control" id="orientado" name="orientado" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="descricao"></label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="data"></label>
    <input type="data" class="form-control" id="data" name="data" placeholder="" required>
  </div>
  <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Área</button><br><br>
  
  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Cadastrado com sucesso! <i class="close">x</i></div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger msg">Erro ao cadastrar!</div>
  <?php endif;?>
</form>