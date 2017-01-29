<form class="myForm" method="post">
  <div class="well">Curso | Cadastro</div>
  
  <div class="form-group">
    <label for="sigla">Sigla</label>
    <input type="text" class="form-control" id="sigla" maxlength="3" name="sigla" placeholder="ABC" required>
  </div>
  <div class="form-group">
    <label for="nome">Nome do Curso</label>
    <input type="text" class="form-control" id="nome" placeholder="Digite o nome do curso" name="nome" required>
  </div>
  <div class="form-group">
    <label for="data">Ano de criação</label>
    <input type="text" class="form-control" id="data" maxlength="4" placeholder="aaaa" name="data" required>
  </div>

  <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Curso</button><br><br>
  <hr>
  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success">Cadastrado com sucesso!</div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger">Erro ao cadastrar!</div>
  <?php endif;?>

</form>