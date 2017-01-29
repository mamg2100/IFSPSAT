<input type="hidden" id="data_aluno1">

<form class="myForm" method="post">
<input type="hidden" id="nomeOrientador" name="nomeOrientador">
<input type="hidden" id="nomeCoorientador" name="nomeCoorientador">
<input type="hidden" id="nomeAluno1" name="nomeAluno1">
<input type="hidden" id="nomeAluno2" name="nomeAluno2">


<div class="well">TCC | Editar</div>

<div class="form-group">   
<?php foreach($tcc as $tccs): ?>
  <!-- inicio form left-->
  <div class="col-md-4">
    <div class="form-group">
        <label>Título:</label><span class="val"></span>
        <input type="text" class="form-control" id="titulo" name="titulo" value = "<?php echo $tccs['titulo'];?>" required>
    </div>   
    <div class="form-group">
      <label>Curso:</label><span class="val"></span>
        <!--<label for="idCurso"><?php echo $tccs['idcurso'];?></label>-->
        <input type="text" class="form-control" id="cursovinc" name="cursovinculado" value = "<?php echo $curso['nome_curso']; ?>" readonly required>
    </div>
    <div class="form-group">
      <label>Área:</label><span class="val"></span>
      <!--<label for="idArea"><?php echo $tccs['idarea']; ?></label>-->
      <input type="text" class="form-control" id="areavinc" name="areavinculada" value="<?php echo $area['descricao'];?>" placeholder="" readonly required>
    </div>    
    <div class="form-group">
      <label>Orientador:</label><span class="val"></span>
      <input type="text" class="form-control" value="<?php echo $tccs['orientador'];?>" readonly>
    </div>      
      <div class="form-group">
        <label>Corientador:</label><span class="val"></span>
        <input type="text" class="form-control" value="<?php echo $tccs['coorientador'];?>" readonly>
      </div>  
     <div class="form-group">
      <label>Aluno 1:</label><span class="val"></span>
      <input type="text" class="form-control" value="<?php echo $tccs['aluno1'];?>" readonly>
    </div>  
   <div class="form-group">
      <label>Aluno 2:</label><span class="val"></span>
      <input type="text" class="form-control" value="<?php echo $tccs['aluno2'];?>" readonly>
    </div>     
  </div> 
  <!-- fim form left-->

  <!-- inicio form center-->
  <div class="col-md-4">

      <div class="form-group">
      <!--<input type="text" class="form-control" id="status" name="status" value="<?php echo $tccs['status'];?>" placeholder="" required>-->
        <label>Status:</label>
          <select class="form-control" id="status" name="status">
          <?php 
          if($tccs['status'] == 0){
            echo '<option value="0" selected="selected">Disponível</option>';
            echo '<option value="1" >Formalizado</option>';
            echo '<option value="2" >Qualificado</option>';
            echo '<option value="3" >Aprovado</option>';
            echo '<option value="4" >Jubilado</option>';
          }elseif($tccs['status'] == 1){
            echo '<option value="0">Disponível</option>';
            echo '<option value="1" selected="selected">Formalizado</option>';
            echo '<option value="2" >Qualificado</option>';
            echo '<option value="3" >Aprovado</option>';
            echo '<option value="4" >Jubilado</option>';
          }elseif($tccs['status'] == 2){
            echo '<option value="0">Disponível</option>';
            echo '<option value="1">Formalizado</option>';
            echo '<option value="2" selected="selected">Qualificado</option>';
            echo '<option value="3">Aprovado</option>';
            echo '<option value="4">Jubilado</option>';
          }elseif($tccs['status'] == 3){
             echo '<option value="0">Disponível</option>';
            echo '<option value="1">Formalizado</option>';
            echo '<option value="2">Qualificado</option>';
            echo '<option value="3" selected="selected">Aprovado</option>';
            echo '<option value="4">Jubilado</option>';
          }else{
            echo '<option value="0">Disponível</option>';
            echo '<option value="1">Formalizado</option>';
            echo '<option value="2">Qualificado</option>';
            echo '<option value="3">Aprovado</option>';
            echo '<option value="4">Jubilado</option>';      }
          ?>
          </select>
      </div>

      <div class="form-group">
        <label>Observacao:</label><span class="val"></span>
        <input type="text" class="form-control" id="observacao" name="observacao" value="<?php echo $tccs['observacao'];?>" placeholder="" >
      </div>
     
     <!--
      <div class="form-group">
        <label>Previsão Data Qualificação:</label><span class="val"></span>
        <input type="date" class="form-control" id="dtQualif" name="dtQualif" value="<?php echo $tccs['dtQualif'];?>" placeholder="" >
      </div> -->

      <!--
      <div class="form-group">
        <label>Previsão da Data Defesa:</label><span class="val"></span>
        <input type="date" class="form-control" id="dtDefesa" name="dtDefesa" value="<?php echo $tccs['dtDefesa'];?>" placeholder="" >
      </div> -->

      <div class="form-group">
      <label>Situação Qualificação:</label>
            <select class="form-control" id="sitQualif" name="sitQualif">
      
            <?php 
              if($tccs['sitQualif'] == 0){
                echo '<option value="">Escolha a situação</option>';
                echo '<option value="0" selected="selected">Aprovado</option>';
                echo '<option value="1" >Reprovado</option>';        
              }elseif($tccs['sitQualif'] == 1){
                echo '<option value="">Escolha a situação</option>';
                echo '<option value="0" >Aprovado</option>';
                echo '<option value="1" selected="selected">Reprovado</option>';    
              }      
            ?>
            '</select>      
      </div>
      
      <div class="form-group">
        <label title="">Data Formalização de Orientação (Anexo I):</label><span class="val"></span>
        <input type="date" class="form-control" id="data_formal_orientacao" name="data_formal_orientacao" value="<?php echo $tccs['data_formal_orientacao'];?>" placeholder="" >
      </div>
      <!--<button class="btn btn-primary btn-sm myButton">x</button>-->
      
      <div class="form-group">
        <label title="Proposta de TCC">Data Proposta de TCC (Anexo II):</label><span class="val"></span>
        <input type="date" class="form-control" id="data_prop_tcc" name="data_prop_tcc" value="<?php echo $tccs['data_prop_tcc'];?>" placeholder="" >
      </div>

      <div class="form-group">
      <label title=""> Data Nomeação Banca de Qualificação (Anexo III): </label><span class="val"></span>
      <input type="date" class="form-control" id="data_nomeacao_banca_qualif" name="data_nomeacao_banca_qualif" value="<?php echo $tccs['data_nomeacao_banca_qualif'];?>" placeholder="" >
    </div>
    <div class="form-group">
         <label>Data Ata Banca de Qualificação (Anexo V): </label><span class="val"></span>
         <input type="date" class="form-control" id="data_ata_banca_qualif" name="data_ata_banca_qualif"  value="<?php echo $tccs['data_ata_banca_qualif'];?>" placeholder="" >
    </div>
    
  
  </div> 
  <!-- fim form center-->
  
  <!-- inicio form right-->  
  <div class="col-md-4">      

    <div class="form-group">
        <label>Data Mínima da Defesa:</label><span class="val"></span>
        <input type="date" class="form-control" id="dtMinDefesa" name="dtMinDefesa"value="<?php echo $tccs['dtMinDefesa'];?>"  placeholder="" readonly >
      </div>          

    <div class="form-group">
        <label>Data Máxima Defesa:</label><span class="val"></span>
        <input type="date" class="form-control" id="dtMaxDefesa" name="dtMaxDefesa"value="<?php echo $tccs['dtMaxDefesa'];?>"  placeholder="" readonly >
      </div>
             
    <div class="form-group">
      <label title=""> Data Nomeação Banca de Defesa: (Anexo III)</label><span class="val"></span>
      <input type="date" class="form-control" id="data_nomeacao_banca_defesa" name="data_nomeacao_banca_defesa" value="<?php echo $tccs['data_nomeacao_banca_defesa'];?>" placeholder="" >
    </div>    
    <div class="form-group">
      <label>Data da Ata da Banca de Defesa: (Anexo V)</label><span class="val"></span>
      <input type="date" class="form-control" id="data_ata_banca_defesa" name="data_ata_banca_defesa"  value="<?php echo $tccs['data_ata_banca_defesa'];?>" placeholder="" >
    </div>
    <div class="form-group">
      <label>Situação Defesa:</label>
      <select class="form-control" id="sitDefesa" name="sitDefesa">
        <?php 
        if($tccs['sitDefesa'] == 0){
          echo '<option value="0" selected>Aprovado</option>';
          echo '<option value="1">Aprovado Condicionalmente</option>';
          echo '<option value="2">Reprovado</option>';        
        }else if($tccs['sitDefesa'] == 1){
          echo '<option value="0">Aprovado</option>';
          echo '<option value="1" selected>Aprovado Condicionalmente</option>';
          echo '<option value="2" >Reprovado</option>';
        }else if($tccs['sitDefesa'] == 2){
          echo '<option value="0">Aprovado</option>';
          echo '<option value="1">Aprovado Condicionalmente</option>';
          echo '<option value="2" selected>Reprovado</option>';
        }      
        ?>
      </select>
    </div>
    <div class="form-group">
      <label>Data Entrega | Recibo à Biblioteca: (Anexo VI)</label><span class="val"></span>
      <input type="date" class="form-control" id="data_entrega_recibo_biblioteca" name="data_entrega_recibo_biblioteca"  value="<?php echo $tccs['data_entrega_recibo_biblioteca'];?>" placeholder="" >
    </div> 
    <div class="form-group">
      <label>Nota:</label><span class="val"></span>
      <input type="number" class="form-control" id="nota" name="nota" min='0' max='10.00' step='0.10' maxlength="4" value="<?php echo $tccs['nota'];?>" placeholder="" >
    </div>
      <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br> 
  </div> 
  <!-- form right-->
  <?php endforeach ;?>  
  <!-- mensagem para informar se um cadastro ocorreu ou não-->
  <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
    <div class="alert alert-success msg">Alterado com sucesso!</div>
  <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
    <div class="alert alert-danger">Erro ao alterar!</div>
  <?php endif;?>
  </form>
<script src="<?php echo BASE;?>assets/js/editar_tcc.js"></script>

