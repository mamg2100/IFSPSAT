
<?php  if($identificacao == 'cg'):?>
    <form class="myForm" method="post">
      <!-- form left admin/professor-->
      <div class="col-md-4">
        <div class="form-group">
          <?php foreach($pessoa as $pessoas): ?>
          <label for="nome">Nome</label>
           <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $pessoas['nome']; ?>" required>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" name="datanasc" value="<?php echo $pessoas['dtnasc']; ?>" maxlength="10" placeholder="aaaa" >
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select name="sexo" class="form-control" id="sexo">
            <?php if($pessoas['sexo'] == 'Masculino' || $pessoas['sexo'] == 'masculino'): ?>
              <option value="Masculino" selected>Masculino</option>
              <option value="Feminino" >Feminino</option>
            <?php else: ?>
              <option value="Masculino" >Masculino</option>
              <option value="Feminino" selected>Feminino</option>
            <?php endif;?>
          </select>  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
         <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $pessoas['cep']; ?>" placeholder="11600-000" maxlength="9" >
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $pessoas['endereco']; ?>" placeholder="" >
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $pessoas['complemento']; ?>" placeholder="" >
        </div>       
      </div>
      <!-- fim form left admin/professor--> 

      <!-- inicio form center admin/professor-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" placeholder="" name="bairro" value="<?php echo $pessoas['bairro']; ?>">
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cidade" value="<?php echo $pessoas['cidade']; ?>">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" maxlength='2' name="estado" value="<?php echo $pessoas['estado']; ?>">
        </div>
       
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais" value="<?php echo $pessoas['pais']; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" value="<?php echo $pessoas['email']; ?>" required>
        </div>
        <div class="form-group">
          <label for="lattes">Currículo Lattes</label>
          <input type="text" class="form-control" id="lattes" placeholder="exemplo@email.com" name="lattes" value="<?php echo $pessoas['lattes']; ?>">
        </div>                          
      </div>  
      <!-- form center admin/professor-->

      <!-- form right admin/professor-->
      <div class="col-md-4">  
        <div class="form-group">
           <label for="telefone">Telefone</label>
           <input type="text" class="form-control" id="telefone" placeholder="(12) 9999-9999" name="telefone" value="<?php echo $pessoas['telefone']; ?>">
        </div>
        <div class="form-group">
           <label for="celular">Celular</label>
           <input type="text" class="form-control" id="celular"  placeholder="(12) 9999-9999" name="celular" value="<?php echo $pessoas['celular']; ?>">
        </div>   
        <div class="form-group">
          <label for="prontuario">Prontuário</label>
          <input type="text" class="form-control" id="prontuario" maxlength="7" placeholder="" name="prontuario" value="<?php echo $pessoas['prontuario']; ?>" required>
        </div>
        <!--
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="" name="login" value="<?php echo $pessoas['usuario']; ?>" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="" name="senha" value="<?php echo $pessoas['senha']; ?>"required>
        </div> 
      -->
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="admin">
          <input type="hidden" name="identificacao" id="identificacao" value="cg">
        </div>

        <div class="form-group">
          <input type="hidden" class="form-control" id="instituicao" name="instituicao" required>
          <input type="hidden" class="form-control" id="funcao" name="funcao" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br>
        <?php endforeach ?>

        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success">Alterado com sucesso!</div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger">Erro ao alterar!</div>
        <?php endif;?>
      </div>
      <!-- form right admin /professor-->
    </form>

    <?php elseif($identificacao == 'a'): ?>   
     <form class="myForm" method="post">
      <!-- form left aluno-->
      <div class="col-md-4">
        <div class="form-group">
          <?php foreach($pessoa as $pessoas): ?>
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $pessoas['nome']; ?>" placeholder="digite o nome completo" required>
        </div>
        <div class="form-group">
          <label for="curso">Curso</label>
          <select name="curso" class="form-control" id="curso">
          <?php foreach($cursos as $curso): ?>
            <option value="<?php echo $curso['idCurso'];?>" <?php echo ($curso['nome_curso'] == $curso['nome_curso'])?'selected="selected"':'';?>><?php echo $curso['nome_curso'];?></option>
          <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" name="datanasc" value="<?php echo $pessoas['dtnasc']; ?>" maxlength="10" placeholder="aaaa" >
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select name="sexo" class="form-control" id="sexo">
          <?php if($pessoas['sexo'] == 'Masculino' || $pessoas['sexo'] == 'masculino'): ?>
              <option value="Masculino" selected>Masculino</option>
              <option value="Feminino" >Feminino</option>
            <?php else: ?>
              <option value="Masculino" >Masculino</option>
              <option value="Feminino" selected>Feminino</option>
            <?php endif;?>
          </select>  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
        <div class="form-group">
           <label for="cep">CEP</label>
           <input type="text" class="form-control" id="cep" name="cep" c placeholder="11600-000" maxlength="9" >
        </div>     
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $pessoas['endereco']; ?>" placeholder="" >
        </div>        
      </div>
      <!-- form left aluno-->

      <!-- form center aluno-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" name="complemento"  value="<?php echo $pessoas['complemento']; ?>" placeholder="" >
        </div>
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $pessoas['bairro']; ?>"placeholder="" >
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade"  name="cidade" value="<?php echo $pessoas['cidade']; ?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $pessoas['estado']; ?>" maxlength='2' placeholder="">
        </div>
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais"name="pais" value="<?php echo $pessoas['pais']; ?>" placeholder="Brasil" >
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $pessoas['email']; ?>" placeholder="exemplo@email.com"  required>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="lattes" name="lattes" value="<?php echo $pessoas['email']; ?>" placeholder="exemplo@email.com" >
        </div>        
      </div>
      <!-- form center aluno-->

      <!-- form right aluno-->
      <div class="col-md-4">  
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $pessoas['telefone']; ?>" placeholder="(12) 9999-9999" >
        </div>        
        <div class="form-group">
          <label for="celular">Celular</label>
          <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $pessoas['celular']; ?>" placeholder="(12) 9999-9999" >
        </div>     
        <div class="form-group">
          <label for="prontuario">Prontuário Aluno</label>
          <input type="text" class="form-control" id="prontuario" name="prontuario" value="<?php echo $pessoas['prontuario']; ?>" placeholder="" maxlength="7" required>
        </div>
        <!-- Puxa da tabela usuario_aluno -->
        <div class="form-group">
          <label for="ano">Data da 1ª Matrícula</label>
          <input type="date" class="form-control" id="dtingresso" width="" maxlength="10" placeholder="entre com a data da 1ª matrícula" name="dtingresso" value="<?php echo $dataingresso['data_ingresso']; ?>" required>
        </div>
        <!--
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="" name="login" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="" name="senha" required>
        </div>  
      -->
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="usuario">
          <input type="hidden" name="identificacao" id="identificacao" value="a">
          <input type="hidden" name="instituicao" id="instituicao" value="">
          <input type="hidden" name="funcao" id="funcao" value="">         
        </div>        
          <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br>
          <?php endforeach ?>

        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success">Cadastrado com sucesso!</div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger">Erro ao cadastrar!</div>
        <?php endif;?>
      </div>
      <!-- form right aluno-->
    </form>
    <?php else: ?>   
    
    <!-- Membro externo-->
    <form class="myForm" method="post">
      <!-- form left membro-->
      <?php foreach($pessoa as $pessoas): ?>
      <div class="col-md-4">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $pessoas['nome']; ?>" required>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" name="datanasc" value="<?php echo $pessoas['dtnasc']; ?>" maxlength="10" placeholder="aaaa" >
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select name="sexo" class="form-control" id="sexo">
             <?php if($pessoas['sexo'] == 'Masculino' || $pessoas['sexo'] == 'masculino'): ?>
                  <option value="Masculino" selected>Masculino</option>
                  <option value="Feminino" >Feminino</option>
              <?php else: ?>
                  <option value="Masculino" >Masculino</option>
                  <option value="Feminino" selected>Feminino</option>
             <?php endif;?>
          </select>  
  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $pessoas['cep']; ?>" placeholder="11600-000" maxlength="9" >
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $pessoas['endereco']; ?>" placeholder="" >
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $pessoas['complemento']; ?>"placeholder="" >
        </div>        
      </div>
      <!-- form left membro-->

      <!-- form center membro-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $pessoas['bairro']; ?>" placeholder="" >
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade"name="cidade" value="<?php echo $pessoas['cidade']; ?>" placeholder="" >
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $pessoas['estado']; ?>" maxlength='2' placeholder="" >
        </div>
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $pessoas['pais']; ?>" placeholder="Brasil" >
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $pessoas['email']; ?>" placeholder="exemplo@email.com"  required>
        </div>
        <div class="form-group">
          <label for="lattes">Currículo Lattes</label>
          <input type="text" class="form-control" id="lattes" name="lattes" value="<?php echo $pessoas['lattes']; ?>" placeholder="exemplo@email.com"  required>
        </div>        
      </div>
      <!-- form center membro-->

      <!-- form right membro-->
      <div class="col-md-4">
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone"  name="telefone"value="<?php echo $pessoas['telefone']; ?>" placeholder="(12) 9999-9999" >
        </div>
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular"value="<?php echo $pessoas['celular']; ?>" placeholder="(12) 9999-9999">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="login" name="login"value="<?php echo $pessoas['usuario']; ?>" placeholder="" >
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="senha" placeholder="" name="senha"value="<?php echo $pessoas['senha']; ?>">
        </div>
        <div class="form-group">
          <label for="instituicao">Instituição</label>
          <input type="text" class="form-control" id="instituicao" name="instituicao" value="<?php echo (!empty($vinculo))?$vinculo['instituicao']:''; ?>" placeholder="identificação da instituição à qual está vinculado(a)"  required>
        </div>
        <div class="form-group">
          <label for="funcao">Vínculo</label>
          <input type="text" class="form-control" id="funcao" name="funcao" value="<?php echo (!empty($vinculo))?$vinculo['funcao']:''; ?>" placeholder="cargo, funcão..."  required>
        </div>    
        <div class="form-group">
          <input type="hidden" class="form-control" id="prontuario" name="prontuario" maxlength="7" placeholder=""  required>
        </div>        
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="usuario">
          <input type="hidden" name="identificacao" id="identificacao" value="">
        </div>
        <button type="submit" class="btn btn-primary btn-md myButton">Confirmar Edição</button><br><br>
        <?php endforeach ?>

        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success">Cadastrado com su
            cesso!</div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger">Erro ao cadastrar!</div>
        <?php endif;?>
      </div>
      <!-- form right membro--> 
    </form>
  
    <?php endif;?>
    
  