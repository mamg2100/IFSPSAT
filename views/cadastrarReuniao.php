
<?php if(!empty($tcc)):?>
<form class="myForm" method="post">
    <div class="form-group">
      <label for="data">Data:</label>
      <input type="date" class="form-control" id="dataReuniao" name="dataReuniao" value="" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="assunto">Assunto:</label>
      <input type="text" class="form-control" id="assunto" name="assunto" maxlength="300" required>
    </div>
    <div class="form-group">
      <label for="metas">Metas:</label>
      <input type="text" class="form-control" id="metas" name="metas" maxlength="300">
    </div>
    <div class="form-group">
    <!-- Só pode cadastrar reunião do Trabalho vinculado ao seu prontuário-->
      <label for="tccvinc">TCC vinculado:</label>  
      <?php foreach($tcc as $tccs): ?>
      <input type="text" class="form-control" id="idtccvinc" name="idtccvinculado" value ="<?php echo $tccs['titulo']; ?>" readonly> 
      <input type="hidden" class="form-control" id="idtccvinc" name="idTcc" value ="<?php echo $tccs['idTcc']; ?>" readonly>      
    <?php endforeach;?>
      <!--
      ?php if($identificacao == 'a'): ?>
      <input type="text" class="form-control" id="tccvinc" name="tccvinculado" value="?php echo $tcc['titulo'];?>" placeholder="escolha o trabalho" readonly required>
      ?php else: ?>
        <select id="tccvinculado" name="tccvinculado" class="form-control">
        ?php foreach($tccProfessor as $tccs):?>
          <option value="?php echo $tccs['idTcc'];?>">?php echo $tccs['titulo'];?></option>
        ?php endforeach;?>
        </select>
      ?php endif;?>
    -->    
    </div>
      <button type="submit" class="btn btn-primary btn-md myButton">Confirmar</button>      
  <?php else: ?>  
        <p>Você ainda não possui nenhum TCC cadastrado, <a href="<?php echo BASE;?>tcc/cadastrar">Cadastre Aqui</a></p>
  <?php endif;?>   
  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Cadastrado com sucesso! <i class="close">x</i></div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger msg">Erro ao cadastrar!</div>
  <?php endif;?>
</form>