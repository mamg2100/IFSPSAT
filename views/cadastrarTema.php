<form class="myForm" method="post">
  
<!-- Código para fazer a conexão com o BD e popular os selects abaixo -->
<?php
$conexao   = mysql_connect("localhost","root","");
mysql_select_db('tcc',$conexao);
?>

  <div class="form-group">
    <label for="descricao">Descrição:</label>
    <input type="text" class="form-control" id="descricao" placeholder="faça uma breve descricao do tema" name="descricao" required>
  </div>
  
  <!--
  <div class="form-group">
    <label for="status">Status:</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="situação do tema: disponível, bloqueado, ..." required>
  </div>
  -->

  <div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status" placeholder="" required>
      <option value="">selecione</option>
      <option value="">disponível</option>
      <option value="">bloqueado</option>
    </select>  
  </div>

  <!-- Ao escolher o proponente, entre professores cadastrados e alunos, o 'input name=prontuário' recebe o nr do prontuario respectivo -->
  <div class="form-group">
    <label for="proponente">Proponente:</label>
      <select class="form-control" name="proponente" required>
        <option value="">Selecione</option>
              <?php 
                $sql = "SELECT * FROM pessoa order by nome";
                $resultado = mysql_query($sql,$conexao);
                while ($dados = mysql_fetch_array ($resultado)){
                  $idpessoa = $dados['idpessoa'];
                  $nome = $dados['nome'];
                  echo "<option value='$nome'>$nome</option>";
                  }
              ?>            
    </select>  
  </div>

  <div class="form-group">
    <label for="prontuario">Prontuário:</label>
    <input type="text" class="form-control" id="prontuario" value="111111X" readonly name="prontuario" placeholder="" required>
  </div>    
  
  <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Tema</button><br><br>
  
  <!-- mensagem para informar se um cadastro ocorreu ou não -->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success">Cadastrado com sucesso!</div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger">Erro ao cadastrar!</div>
  <?php endif;?>
</form>
