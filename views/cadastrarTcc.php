<input type="hidden" name="data_aluno2" id="data_aluno1">
<form class="myForm" method="post">
  <!-- inicio form left -->
  <div class="well">TCC | Cadastro</div>
  <div class="col-md-6">    
    <div class="form-group">
        <label for="curso">Curso:</label>
        <label for="idcurso" name="idcurso" id="id"></label>
          <select class="form-control" id="curso" name="curso" placeholder="" required>
            <option value="">escolha um curso</option>
             <?php foreach($cursos as $curso):  ?>
                  <option value="<?php echo $curso['idCurso'];?>"><?php echo $curso['nome_curso'];?></option>
              <?php endforeach; ?>
          </select>  
    </div>
    <div class="form-group">
        <label for="area">Área:</label>
          <select class="form-control" id="area" name="area" placeholder="" required >
            <option value="">escolha uma área</option>
             <?php foreach($areas as $area): ?>
                <option value="<?php echo $area['idarea'];?>"><?php echo $area['descricao'];?></option>
              <?php endforeach; ?> 
          </select>  
    </div>
    <div class="form-group">
      <label>Título:</label><span class="val"></span>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="defina um título para o trabalho"  required>
    </div>
    
    <div class="form-group">
      <label>Observações:</label><span class="val"></span>
      <input type="text" class="form-control" id="observacao" name="observacao" placeholder="" >
    </div>
  </div>
  <!-- fim form left -->

  <!--inicio do form center -->
  <div class="col-md-6">
      
    <div class="form-group">
        <label for="orientador">Orientador:</label>
          <select class="form-control" id="orientador" name="idOrientador" placeholder="" required >
            <option value="">selecione um orientador </option>
              <?php foreach($orientadores as $orientador): ?>
                <option value="<?php echo $orientador['idPessoa'];?>"><?php echo $orientador['nome'];?></option>
              <?php endforeach; ?> 
          </select>  
    </div>

    <div class="form-group">
        <label for="coorientador">Coorientador:</label>
          <select class="form-control" id="coorientador" name="idCoorientador" placeholder="" >
            <option value="">selecione um coorientador, se necessário</option>
              <?php foreach($coorientadores as $Coorientador): ?>
                <option value="<?php echo $Coorientador['idPessoa'];?>"><?php echo $Coorientador['nome'];?></option>
              <?php endforeach; ?> 
          </select>  
    </div>
    <input type="hidden" id="nome_professor_selecionado" name="orientador" value="">
    <input type="hidden" id="nome_professor_selecionado2" name="coorientador" value="">   

    <!--<div class="form-group">
        <label for="aluno1">Aluno 1:</label>
          <select class="form-control" id="aluno1" name="aluno1" placeholder="">
            <option value="">selecione um aluno</option>
              <?php foreach($alunos as $aluno): ?>
                <option value="<?php echo $aluno['idPessoa'];?>"><?php echo $aluno['nome'];?></option>
              <?php endforeach; ?> 
          </select>  
    </div> -->

    <!--<div class="form-group">
        <label for="aluno1">Aluno 2:</label>
          <select class="form-control" id="aluno2" name="aluno2">
            <option value="">selecione um aluno</option>
              <?php foreach($alunos as $aluno): ?>
                <option value="<?php echo $aluno['idPessoa'];?>"><?php echo $aluno['nome'];?></option>
              <?php endforeach; ?>
          </select>  
    </div> -->
    <input type="hidden" id="nome_usuario_selecionado" name="nomeAluno1" value="">
    <input type="hidden" id="nome_usuario_selecionado2" name="nomeAluno2" value="">
 </div>
  <!-- fim form center -->

  <!--inicio do form rigth -->
  <div class="col-md-6">     
  
    <div class="form-group">
       <label for="status" >Status:</label>
       <select class="form-control" id="status" name="status" disabled>
        <option value="0">Disponível</option>
        <option value="1">Formalizado</option>
        <option value="2">Qualificado</option>
        <option value="3">Aprovado</option>
        <option value="4">Reprovado</option>
        <option value="5">Jubilado</option>
      </select>  
    </div>
   <!-- <div class="form-group">
      <label>Data Qualificação:(previsão)</label><span class="val"></span>
      <input type="date" class="form-control" id="dtQualif" name="dtQualif" placeholder="" >
    </div>

    <div class="form-group">
      <label>Data Defesa: (previsão)</label><span class="val"></span>
      <input type="date" class="form-control" id="dtDefesa" name="dtDefesa" placeholder="" >
    </div>

    <div class="form-group">
      <label>Data Limite Defesa: </label><span class="val"></span>
      <input type="date" class="form-control" id="dtMaxDefesa" name="dtMaxDefesa" placeholder="" >
    </div>-->
    </br>
    <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar TCC</button> 
    
    <a href="" data-toggle="modal" data-target="#ajuda">ajuda?</a>  

  </div>     

  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <div style="clear:both;"></div>

  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Cadastrado com sucesso!</div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger msg">Erro ao cadastrar!</div>
  <?php endif;?>
</form>

<!--- modal inicio -->
    <div class="modal fade" id="ajuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center" id="myModalLabel" >Orientações</h3>
        </div>
        <div class="modal-body">
          <p><b> Campo 'Curso' :</b> obrigatório</p>
          <p><b> Campo 'Área' : </b> obrigatório</p>
          <p><b>Campo 'Título' : </b> obrigatório</p>
          <p><b> Campo 'Observação' :</b> não obrigatório</p>
          <p> <b>Campo 'Orientador':</b><br>Todo trabalho deve ter um orientador para ser formalizado. Obrigatório</p>
          <p> <b>Campo 'Coorientador':</b> <br>Indicado quando há necessidade de profissional proficiente<br> no assunto para auxiliar o orientador e o aluno. Não obrigatório.</p>
          <p> <b>Campo 'Aluno 1':</b><br> Todo trabalho deve ser desenvolvido por ao menos um aluno. Obrigatorio.</p>
          <p> <b>Campo 'Aluno 2': </b><br> Todo trabalho pode ser desenvolvido no máximo por 2 alunos. <br>Obrigatório somente quando há um segundo aluno desenvolvendo o mesmo trabalho.</p>
          <p> 
           <b>Campo 'Status':</b> obrigatório<br>
           <b> 'disponível'</b> (valor padrão, quando ainda não foi formalizada a orientação).<br>
           <b> 'formalizado'</b>  (quando vira TCC e foi assinado o anexo obrigatório, com indicação da orientação). <br>
           <b> 'qualificado'</b> (quando foi submetido a uma Banca de Qualificação e aprovado). <br>
           <b> 'defendido' </b>(quando foi submetido à Banca de Defesa e aprovado). <br>
           <b> 'jubilado'</b> (quando ultrapassa o prazo máximo de defesa: dia correspondente ao 1º dia de matrícula no curso 6 anos depois)
           </p>
           <p><b>Campo 'Data da Qualificação' : </b> Data prevista que só fica disponível após receber o Status de Formalizado. Não obrigatório.</p> 
           <p><b>Campo 'Data da Defesa' :</b> Data prevista obedecendo o prazo de no mínimo 60 dias após a qualificação. Não obrigatório.</p> 
           <p><b>Campo 'Data Limite da Defesa' :</b> Data prevista obedecendo o prazo de no máximo 18 meses após a formalização do trabalho. Não obrigatório.</p> 
           <h6><b><i>fonte: regimento</i></b></h6>
          </div>          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
       </div>
      </div>
    </div>                   
<!-- modal fim -->   

<script src="<?php echo BASE; ?>assets/js/curso.js"></script>
<script src="<?php echo BASE; ?>assets/js/area.js"></script>
<script src="<?php echo BASE; ?>assets/js/cadastro_tcc.js"></script>
