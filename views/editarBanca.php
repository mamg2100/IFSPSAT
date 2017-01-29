<form class="myForm" method="post">
  <div class="well">Banca | Editar</div>
  <div class="form-group">
    <?php foreach($banca as $bancas): ?>
    <label for="presidente">Presidente:</label>
    <!--<label for=""># idPresidente</label>-->
    <select class="form-control" id="presidente" name="presidente" placeholder="" required>
      <option value="">selecione</option>
        <?php foreach($professores as $professor): ?>
          <option value="<?php echo $professor['nome'];?>" <?php echo($bancas['presidente'] == $professor['nome'])?'selected':'';?>><?php echo $professor['nome'];?></option>
        <?php endforeach; ?>
    </select>  
  </div>  

  <div class="form-group">
    <label for="membroum">Membro 1:</label>
    <!--<label for=""># idPresidente</label>-->
    <select class="form-control" id="membroum" name="membroum" placeholder="" required>
      <option value="">selecione</option>
        <?php foreach($professores as $professor): ?>
          <option value="<?php echo $professor['nome'];?>" <?php echo($bancas['orientador'] == $professor['nome'])?'selected':'';?>><?php echo $professor['nome'];?></option>
        <?php endforeach; ?>
    </select>  
  </div>     

  <div class="form-group">
    <label for="membrodois">Membro 2:</label>
    <!--<label for=""># idPresidente</label>-->
    <select class="form-control" id="membrodois" name="membrodois" placeholder="" >
      <option value="">selecione</option>
        <?php foreach($membros as $membro): ?>
          <option value="<?php echo $membro['idPessoa'];?>" <?php echo($bancas['coorientador'] == $membro['nome'])?'selected':'';?>><?php echo $membro['nome'];?></option>
        <?php endforeach; ?>
    </select>  
  </div>   

  <div class="form-group">
    <input type="hidden" class="form-control" id="nomeMembrodois"  name="nomeMembrodois" required></input>
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" id="identMembro"  name="identMembro" required></input>
  </div>
    
  <div class="form-group">
    <label for="coorientador">Substituto:</label>
    <!--<label for=""># idPresidente</label>-->
    <select class="form-control" id="substituto" name="substituto" placeholder="" >
      <option value="">selecione</option>
        <?php foreach($professores as $professor): ?>
          <option value="<?php echo $professor['nome'];?>" <?php echo($bancas['substituto'] == $professor['nome'])?'selected':'';?>><?php echo $professor['nome'];?></option>
        <?php endforeach; ?>
    </select>  
  </div>  

  <div class="form-group">    
    <label for="tipobanca">Tipo de banca:</label>
    <select class="form-control" id="tipobanca" name="tipobanca" placeholder="" required>
      <?php foreach($Tipobanca as $tipo): ?>
        <option value="<?php echo $tipo;?>" <?php echo ($tipo == $bancas['tipobanca'])?'selected':'';?> ><?php echo $tipo;?></option>
      <?php endforeach;?>
    </select>  
  </div>

  <div class="form-group">     
    <!-- Só pode cadastrar reunião do Trabalho vinculado ao seu prontuário-->      
      <label for="tipobanca">TCC vinculado:</label>
      <input type="hidden" name="idTcc" value="<?php echo $bancas['idtcc'];?>">
      <input type="text" class="form-control" id="tccvinc" name="tccvinc" value = "<?php echo $tccbanca; ?>" readonly required>
  </div>
  
  <button type="submit" class="btn btn-primary btn-md myButton">Confirma Edição</button><br><br>
  <?php endforeach ;?>
  <!-- mensagem para informar se um cadastro ocorreu ou não -->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success">Alterada com sucesso!</div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger">Erro ao Alterar!</div>
  <?php endif;?>
</form>
<script src="<?php echo BASE; ?>assets/js/addBanca.js"></script>