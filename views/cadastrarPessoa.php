<div class="well">Usuário | Cadastro</div>
<!-- inclusão de abas para escolha de perfil de usuário -->

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

<!-- todos os forms estão dentro dessa classe 'tab-content'-->

<div class="tab-content"> 
  
 <!-- formulário para dados de usuário administrador--> 
  <div role="tabpanel" class="tab-pane active" id="admin"> 
      <form class="myForm" method="post">
      <!-- form left admin -->
      <div class="col-md-4">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="digite o nome completo" name="nome" required>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" maxlength="10" placeholder="aaaa" name="datanasc">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value"Feminino">Feminino</option>
          </select>  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="11600000" pattern= "\d{5}?\d{3}" maxlength="8" name="cep">
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" placeholder="" name="endereco">
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" placeholder="" name="complemento">
        </div>       
      </div>
      <!-- fim form left admin--> 

      <!-- inicio form center admin-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" placeholder="" name="bairro">
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cidade">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" name="estado">
        </div>       
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" required>
        </div>
        <div class="form-group">
          <label for="lattes">Currículo Lattes</label>
          <input type="text" class="form-control" id="lattes" placeholder="http://lattes.cnpq.br/..." name="lattes">
        </div>                          
      </div>  
      <!-- form center admin-->

      <!-- form right admin-->
      <div class="col-md-4">  
        <div class="form-group">
           <label for="phonenum">Telefone</label>
           <input type="text" class="form-control" id="telefone" pattern="^\d{2} \d{4} \d{4}$" placeholder="12 9999 9999" name="telefone">
        </div>
        <div class="form-group">
           <label for="phonenum">Celular</label>
           <input type="text" class="form-control" id="celular" pattern="^\d{2} \d{5} \d{4}$"  placeholder="12 99999 9999" name="celular">
        </div>   
        <div class="form-group">
          <label for="prontuario">Prontuário</label>
          <input type="text" class="form-control" id="prontuario" maxlength="7" placeholder="" name="prontuario" required>
        </div>
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="" name="login" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="" name="senha" required>
        </div> 
        <!-- definindo o tipo de Nível do Usuário, no caso usuário tipo: admin, os demais serão
            todos usuários comuns os quais são denominados simplesmente como: usuários -->
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="admin">
          <input type="hidden" name="identificacao" id="identificacao" value="cg">
        </div>

        <div class="form-group">
          <input type="hidden" class="form-control" id="instituicao" name="instituicao" required>
          <input type="hidden" class="form-control" id="funcao" name="funcao" required>
        </div>
        
        <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Usuário</button><br><br>
        
        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Cadastrado com sucesso!</div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger msg">Erro ao cadastrar!</div>
        <?php endif;?>
      </div>
      <!-- form right admin-->
    </form>
  </div> <!-- fim formulário para dados de usuário administrador--> 

  <!-- formulário para dados de usuário professor--> 
  <div role="tabpanel" class="tab-pane" id="professor">  
    <!-- Formulários para perfil de usuário professor-->
    <form class="myForm" method="post">
      <!-- form left professor-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="digite o nome completo" name="nome" required>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" maxlength="10" placeholder="aaaa" name="datanasc">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value"Feminino">Feminino</option>
          </select>  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
         <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="11600000" pattern= "\d{5}?\d{3}" maxlength="8" name="cep">
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" placeholder="" name="endereco">
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" placeholder="" name="complemento">
        </div>        
      </div>
      <!-- form left professor-->

      <!-- form center professor-->
      <div class="col-md-4"> 
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" placeholder="" name="bairro">
        </div> 
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cidade">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" name="estado">
        </div>
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" required>
        </div>
        <div class="form-group">
          <label for="lattes">Currículo Lattes</label>
          <input type="text" class="form-control" id="lattes" placeholder="http://lattes.cnpq.br/..." name="lattes">
        </div>        
      </div>
      <!-- form center professor-->

      <!-- form right professor-->
      <div class="col-md-4">
        <div class="form-group">
           <label for="phonenum">Telefone</label>
           <input type="text" class="form-control" id="telefone" pattern="^\d{2} \d{4} \d{4}$" placeholder="12 9999 9999" name="telefone">
        </div>
        <div class="form-group">
           <label for="phonenum">Celular</label>
           <input type="text" class="form-control" id="celular" pattern="^\d{2} \d{5} \d{4}$"  placeholder="12 99999 9999" name="celular">
        </div>
        <div class="form-group">
          <label for="prontuario">Prontuário Professor</label>
          <input type="text" class="form-control" id="prontuario" placeholder="" maxlength="7" name="prontuario" required>
        </div>
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="" name="login" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="" name="senha" required>
        </div>
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="usuario">
          <input type="hidden" name="identificacao" id="identificacao" value="cg">
          <input type="hidden" name="instituicao" id="instituicao" value="">
          <input type="hidden" name="funcao" id="funcao" value="">          
        </div>       
        <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Usuário</button><br><br>
        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Cadastrado com sucesso!</div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger">Erro ao cadastrar!</div>
        <?php endif;?>
      </div>
      <!-- form right professor-->
    </form>
  </div> <!-- fim formulário para dados de usuário professor-->

  <!-- formulário para dados de usuário aluno--> 
  <div role="tabpanel" class="tab-pane" id="aluno">  
      <form class="myForm" method="post">
      <!-- form left aluno-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="digite o nome completo" name="nome" required>
        </div>
        <div class="form-group">
          <label for="curso">Curso</label>
          <select name="curso" class="form-control" id="curso" required>
          <option value="">escolha um curso</option>
          <?php foreach($cursos as $curso): ?>
            <option value="<?php echo $curso['idCurso'];?>"><?php echo $curso['nome_curso'];?></option>
          <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" maxlength="10" placeholder="aaaa" name="datanasc">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value"Feminino">Feminino</option>
          </select>  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="11600000" pattern= "\d{5}?\d{3}" maxlength="8" name="cep">
        </div>     
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" placeholder="" name="endereco">
        </div>        
      </div>
      <!-- form left aluno-->

      <!-- form center aluno-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" placeholder="" name="complemento">
        </div>
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" placeholder="" name="bairro">
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cidade">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" name="estado">
        </div>
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" required>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="lattes" placeholder="http://lattes.cnpq.br/..." name="lattes">
        </div>        
      </div>
      <!-- form center aluno-->

      <!-- form right aluno-->
      <div class="col-md-4">  
        <div class="form-group">
           <label for="phonenum">Telefone</label>
           <input type="text" class="form-control" id="telefone" pattern="^\d{2} \d{4} \d{4}$" placeholder="12 9999 9999" name="telefone">
        </div>
        <div class="form-group">
           <label for="phonenum">Celular</label>
           <input type="text" class="form-control" id="celular" pattern="^\d{2} \d{5} \d{4}$"  placeholder="12 99999 9999" name="celular">
        </div>     
        <div class="form-group">
          <label for="prontuario">Prontuário Aluno</label>
          <input type="text" class="form-control" id="prontuario" placeholder="" maxlength="7" name="prontuario" required>
        </div>
        <div class="form-group">
          <label for="ano">Data da 1ª Matrícula</label>
          <!-- Obrigatória essa data pois é através dela que se calcula a data limite da defesa.(data do jubilamento)-->
          <input type="date" class="form-control" id="dtIngresso" width="" maxlength="10" placeholder="entre com a data da 1ª matrícula" name="dtingresso" required>
        </div>
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" class="form-control" id="login" placeholder="" name="login" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="" name="senha" required>
        </div>  
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="usuario">
          <input type="hidden" name="identificacao" id="identificacao" value="a">
          <input type="hidden" name="instituicao" id="instituicao" value="">
          <input type="hidden" name="funcao" id="funcao" value="">
          <input type="hidden" name="dataLimite" id="dataLimite">         
        </div>        
          <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Usuário</button><br><br>
        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Cadastrado com sucesso!</div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger">Erro ao cadastrar!</div>
        <?php endif;?>
      </div>
      <!-- form right aluno-->
    </form>
  </div><!-- fim formulário para dados de usuário aluno--> 

  <!-- formulário para dados de usuário membro externo--> 
  <div role="tabpanel" class="tab-pane" id="membro">  
    <form class="myForm" method="post">
      <!-- form left membro-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="digite o nome completo" name="nome" required>
        </div>
        <div class="form-group">
          <label for="datanasc">Data Nascimento</label>
          <input type="date" class="form-control" id="data" maxlength="10" placeholder="aaaa" name="datanasc">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value"Feminino">Feminino</option>
          </select>  
          <!--<input type="text" class="form-control" id="sexo" placeholder="" name="sexo">-->
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="11600000" pattern= "\d{5}?\d{3}" maxlength="8" name="cep">
        </div>  
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" placeholder="" name="endereco">
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" id="complemento" placeholder="" name="complemento">
        </div>        
      </div>
      <!-- form left membro-->

      <!-- form center membro-->
      <div class="col-md-4">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" id="bairro" placeholder="" name="bairro">
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" id="cidade" placeholder="" name="cidade">
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <input type="text" class="form-control" id="estado" placeholder="" name="estado">
        </div>
        <div class="form-group"> 
          <label for="pais">País</label>
          <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" required>
        </div>
        <div class="form-group">
          <label for="lattes">Currículo Lattes</label>
          <input type="text" class="form-control" id="lattes" placeholder="http://lattes.cnpq.br/..." name="lattes" required>
        </div>        
      </div>
      <!-- form center membro-->

      <!-- form right membro-->
      <div class="col-md-4">
        <div class="form-group">
           <label for="phonenum">Telefone</label>
           <input type="text" class="form-control" id="telefone" pattern="^\d{2} \d{4} \d{4}$" placeholder="12 9999 9999" name="telefone">
        </div>
        <div class="form-group">
           <label for="phonenum">Celular</label>
           <input type="text" class="form-control" id="celular" pattern="^\d{2} \d{5} \d{4}$"  placeholder="12 99999 9999" name="celular">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="login" placeholder="" name="login" value="">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="senha" placeholder="" name="senha" value="">
        </div>
        <div class="form-group">
          <label for="instituicao">Instituição</label>
          <input type="text" class="form-control" id="instituicao" name="instituicao" placeholder="identificação da instituição à qual está vinculado(a)"  required>
        </div>
        <div class="form-group">
          <label for="funcao">Vínculo</label>
          <input type="text" class="form-control" id="funcao" name="funcao" placeholder="cargo, funcão..."  required>
        </div>    
        <div class="form-group">
          <input type="hidden" class="form-control" id="prontuario"  name="prontuario" placeholder=""  required>
        </div>        
        <div class="form-group">
          <input type="hidden" name="nivelacesso" id="nivelacesso" value="usuario">
          <input type="hidden" name="identificacao" id="identificacao" value="">
        </div>
        <button type="submit" class="btn btn-primary btn-md myButton">Cadastrar Usuário</button><br><br>
        
        <?php if(isset($msg) && !empty($msg) && $msg == '1'): ?>
          <div class="alert alert-success msg">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Cadastrado com sucesso!
          </div>
        <?php elseif(isset($msg) && !empty($msg) && $msg == '0'): ?>
          <div class="alert alert-danger">Erro ao cadastrar!</div>
        <?php endif;?>
      </div>
      <!-- form right membro--> 
    </form>
  </div><!-- fim formulário para dados de usuário membro externo--> 

</div> <!-- fim do tab content -->
<script src="<?php echo BASE; ?>assets/js/cadastra_pessoa.js"></script>


