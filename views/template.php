<!DOCTYPE html>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema SAT</title>
	<link rel="stylesheet" href="<?php echo BASE; ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo BASE; ?>assets/css/template.css">

  <!--scripts do projeto -->
<script src="<?php echo BASE; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo BASE; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo BASE; ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE; ?>assets/js/custom.js"></script>
<script>var BASE = '<?php echo BASE; ?>'</script>

</head>
<body>
<!-- menu navegação -->
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SAT</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo BASE;?>">Home <span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar <span class="caret"></span></a>
          <ul class="dropdown-menu">

              <li><a href="<?php echo BASE; ?>user/cadastrar">Usuário</a></li>
              <li><a href="<?php echo BASE; ?>curso/cadastrar">Curso</a></li>
              <li><a href="<?php echo BASE; ?>area/cadastrar">Área</a></li>
              <!--<li><a href="<?php echo BASE; ?>tema/cadastrar">Tema</a></li>-->
              <li><a href="<?php echo BASE; ?>banca/cadastrar">Banca</a></li>  
              <li><a href="<?php echo BASE; ?>tcc/cadastrar">TCC</a></li>  
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pesquisar <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE; ?>user">Usuário</a></li>
            <li><a href="<?php echo BASE; ?>curso">Curso</a></li>
            <li><a href="<?php echo BASE; ?>area">Área</a></li>
            <!--<li><a href="<?php echo BASE; ?>tema">Tema</a></li>-->
            <li><a href="<?php echo BASE; ?>tcc">TCC</a></li>
            <li><a href="<?php echo BASE; ?>banca">Banca</a></li>
          </ul>
        </li>
        <!--
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reuniões <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE;?>reuniao/cadastrar">Cadastrar</a></li>
            <li><a href="<?php echo BASE;?>reuniao">Consultar</a></li>   
          </ul>
        </li>
      -->
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentos <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-01-regimento-tcc-ads.docx">I   - Formalização de Orientação de T.C.C</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-02-regimento-tcc-ads.docx">II  - Proposta de T.C.C</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-03-regimento-tcc-ads.docx">III - Nomeação de Banca de Qualificação</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-04-regimento-tcc-ads.docx">IV  - Relatório de Reunião de Orientação</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-05-regimento-tcc-ads.docx">V   - Ata da Banca de Qualificação/Defesa de T.C.C</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-06-regimento-tcc-ads.docx">VI  - Recibo de Entrega do T.C.C à Biblioteca</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-07-regimento-tcc-ads.docx">VII - Autorização de Depósito de T.C.C</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-08-regimento-tcc-ads.docx">VIII - Autorização de Reprodução do T.C.C</a></li>
             <li><a href="<?php echo BASE;?>assets/anexos/20160419-anexo-09-regimento-tcc-ads.docx">IX - Projeto de Estágio</a></li>
             <hr>
             <li><a href="http://www.ifspcaraguatatuba.edu.br/wp-content/uploads/2016/09/regimento-tcc-ads.pdf">Regimento Trabalho Conclusão de Curso | ADS</a></li>
             
          </ul>
        </li>        
        <li><a href="<?php echo BASE;?>relatorio">Relatórios</a></li>
        <li><a href="<?php echo BASE;?>recebedor">Upload</a></li>
        <!--<li><a href="#">Configurações</a></li>-->
        <li><a href="<?php echo BASE;?>contato">Contacte-nos</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo @$nome; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
         	<li><a href="<?php echo BASE;?>login/logout">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<!-- fim menu navegação-->

<div class="container mycontainer">
	<?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>
<div style="clear:both"></div>
 <footer class="footer container" id="footer">
      <div class="container">
        <p >
          SAT - &copy; IFSP - Instituto Federal de Educação, Ciência e Tecnologia de São Paulo Campus<br> Caraguatatuba Avenida Bahia, 1739 - Indaiá - Caraguatatuba SP - CEP: 11665-071 - Telefone: 55 (12) 3885-2130</p>
      </div>
 </footer>
</body>
</html>