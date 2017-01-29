<form class="myForm" method="post">
    <div class="form-group">
      <?php foreach($reunioes as $reuniao): ?>
      <label for="data">Data:</label>
      <input type="date" class="form-control" id="dataReuniao" name="dataReuniao" value = "<?php echo $reuniao['data']; ?>" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="assunto">Assuntos:</label>
      <input type="text" class="form-control" id="assunto" name="assunto" value = "<?php echo $reuniao['assunto']; ?>" maxlength="300" required>
    </div>
    <div class="form-group">
      <label for="metas">Metas:</label>
      <input type="text" class="form-control" id="metas" name="metas" value = "<?php echo $reuniao['metas']; ?>" maxlength="300">
    </div>
    <div class="form-group">     
    <!-- Só pode cadastrar reunião do Trabalho vinculado ao seu prontuário-->      
      <label for="tccvinc">TCC vinculado: <?php echo $reuniao['fk_idTcc']; ?></label>
      <input type="text" class="form-control" id="tccvinc" name="tccvinculado" value = "<?php echo $tccreuniao; ?>" readonly required>
      <input type="hidden" class="form-control" id="idtccvinc" name="idtccvinculado" value = "<?php echo $reuniao['fk_idTcc']; ?>">
    </div>     
  <button type="submit" class="btn btn-primary btn-md myButton">Alterar</button><br><br>
      <?php endforeach;?>
  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Alterada com sucesso! <i class="close">x</i></div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger msg">Erro ao alterar!</div>
  <?php endif;?>
</form>