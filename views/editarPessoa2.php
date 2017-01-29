<!-- inclusão de abas para escolha de perfil de usuário 
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">Administrador</a>
  </li>
  <li role="presentation"><a href="#professor" aria-controls="professor" role="tab" data-toggle="tab">Professor</a>
  </li>
  <li role="presentation"><a href="#aluno" aria-controls="aluno" role="tab" data-toggle="tab">Aluno</a></li>
  <li role="presentation"><a href="#membro" aria-controls="membro" role="tab" data-toggle="tab">Membro
  Externo</a></li>
</ul>
<br>
-->
<!-- todos os forms estão dentro dessa classe 'tab-content'
<div class="tab-content"> -->

 <!-- formulário para dados de usuário administrador 
  <div role="tabpanel" class="tab-pane active" id="admin">  -->
    <form class="myForm" method="post">
      <!-- form left -->
      <div class="col-md-4">
        <div class="form-group">
        <?php foreach($pessoa as $pessoas): ?>
          <label for="nome">Nome</label>  
          <label for="ident"><?php echo $pessoas['idPessoa'];?></label>    
          <input type="text" class="form-control" id="nome" name="nome" value = "<?php echo $pessoas['nome']; ?>" required>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" maxlength="10" name="datanasc" value = "<?php echo $pessoas['dtnasc']; ?>" placeholder="aaaa" >
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <input type="text" class="form-control" id="sexo" placeholder="" name="sexo" value = "<?php echo $pessoas['sexo']; ?>" >
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" placeholder="" name="endereco" value = "<?php echo $pessoas['endereco']; ?>" >
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" placeholder="" name="complemento" value = "<?php echo $pessoas['complemento']; ?>" >
        </div>
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" placeholder="" name="bairro" value = "<?php echo $pessoas['bairro']; ?>" >
        </div>
      </div>
      <!-- form left -->
 
      <!-- form center -->
      <div class="col-md-4">        
        <div class="form-group">
          <label for="cidade">CEP</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cep" value = "<?php echo $pessoas['cep']; ?>" >
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cidade" value = "<?php echo $pessoas['cidade']; ?>" >
        </div>        
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" name="estado" value = "<?php echo $pessoas['estado']; ?>" >
        </div>
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais" value = "<?php echo $pessoas['pais']; ?>" >
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" value = "<?php echo $pessoas['email']; ?>"  required>
        </div>
        <div class="form-group">
          <label for="lattes">Currículo Lattes</label>
          <input type="lattes" class="form-control" id="lattes" placeholder="exemplo@email.com" name="lattes" value = "<?php echo $pessoas['lattes']; ?>" >
        </div>
      </div>       
      <!-- form center -->

      <!-- form right -->
      <div class="col-md-4">        
        <div class="fone">
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" placeholder="(12) 9999-9999" name="telefone" value = "<?php echo $pessoas['telefone']; ?>" >
          </div>
          <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular"  placeholder="(12) 9999-9999" name="celular" value = "<?php echo $pessoas['celular']; ?>" >
          </div>
        </div>
        <div class="form-group">
          <label for="prontuario">Prontuário</label>
          <input type="text" class="form-control" id="prontuario" maxlenght="8" placeholder="" name="prontuario" value = "<?php echo $pessoas['prontuario']; ?>"  required>
        </div>
        <!--
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="" value = "<?php echo $pessoas['login']; ?>" name="login" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="" value = "<?php echo $pessoas['senha']; ?>" name="senha" required>
        </div> 
        -->
        <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br>
        <?php endforeach ;?>  
      </div>
      <!-- mensagem para informar se um cadastro ocorreu ou não-->      
      <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
        <div class="alert alert-success">Alterado com sucesso!</div>
      <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
        <div class="alert alert-danger">Erro ao alterar!</div>
      <?php endif;?>
  </form>

