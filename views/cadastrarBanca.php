<form class="myForm" method="post">
  <div class="well">Banca | Cadastro</div>
  <div class="form-group">
    <label for="presidente">Presidente:</label>
    <select class="form-control" id="presidente" name="presidente" placeholder="" required>
      <option value="">selecione</option>
        <?php foreach($professores as $professor): ?>
          <option value="<?php echo $professor['nome'];?>"><?php echo $professor['nome'];?></option>
        <?php endforeach; ?>
    </select>  
  </div>
  <!-- necessariamente um dos membros tem que ser o orientador do trabalho e professor-->
  <div class="form-group">
    <label for="membroum">Membro 1:</label>
    <select class="form-control" id="membroum" name="membroum" placeholder="" required>
      <option value="">selecione</option>
      <?php foreach($professores as $professor): ?>
          <option value="<?php echo $professor['nome'];?>"><?php echo $professor['nome'];?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <!-- membro 2 pode ser membro interno da instituição (professor) ou membro externo-->
  <!-- se for 'pessoa' do tipo 'professor', a inclusão vai envolver as tabelas 'banca' e 'professor_has_banca' e se for 'pessoa' do tipo 'membro_externo', o cadastro vai envolver 
  somente a tabela 'banca' portanto é necessária verificação. Observar que o select incluirá
  a relação de 'pessoa' do tipo 'membro_externo' na relação.-->

  <div class="form-group">
    <label for="membrodois">Membro 2:</label>
    <!--<label for="idmembrodois"># id</label>-->
    <select class="form-control" id="membrodois" name="membrodois" placeholder="" required>
      <option value="">selecione</option>
      <?php foreach($membros as $membro): ?>
          <option value="<?php echo $membro['idPessoa'];?>"><?php echo $membro['nome'];?></option>
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
    <label for="membrosubs">Substituto:</label>
    <select class="form-control" id="substituto" name="substituto" placeholder="" >
      <option value="">selecione</option>
      <?php foreach($professores as $professor): ?>
          <option value="<?php echo $professor['nome'];?>"><?php echo $professor['nome'];?></option>
      <?php endforeach; ?>      
    </select>
  </div>
    
  <div class="form-group">
    <label for="tipobanca">Tipo de Banca</label>
    <select class="form-control" id="tipobanca" name="tipobanca" placeholder="" required>
      <option value="">selecione</option>
      <option value="Qualificação">Qualificação</option>
      <option value="Defesa">Defesa</option>
    </select>
  </div>
  <div class="form-group">
    <label for="tccvinc">TCC vinculado</label>  
    <!--<label for=""> #<?php echo $tccs['idTcc'];?></label>-->
    <!--<input type="text" class="form-control" id="tccvinc" name="idTcc" value="" placeholder="# TCC vinculado"  required>-->
    <select class="form-control" id="idTcc" name="idTcc" placeholder="" required>
      <option value="">selecione</option>
      <?php foreach($titulos as $titulo): ?>
          <option value="<?php echo $titulo['idTcc'];?>"><?php echo $titulo['titulo'];?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Banca</button><br><br>
  
  <!-- mensagem para informar se um cadastro ocorreu ou não -->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Cadastrado com sucesso!</div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger">Erro ao cadastrar!</div>
  <?php endif;?>
</form>
<script type="text/javascript" src="<?php echo BASE; ?>assets/js/addBanca.js"></script>
