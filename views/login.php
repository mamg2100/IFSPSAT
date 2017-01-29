<!DOCTYPE html>
<html lang="pt-br">
<head>
  	<meta charset="UTF-8">
    	<title>Login | SAT</title>
    	<link rel="stylesheet" href="<?php echo BASE; ?>assets/css/bootstrap.css">
    	<link rel="stylesheet" href="<?php echo BASE; ?>assets/css/template.css">
      <link rel="stylesheet" href="<?php echo BASE; ?>assets//css/signin.css">
        <style>.myForm{margin-top:100px;}</style>
</head>
<body>
  <div class="container">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Área de Acesso</h2>
      <label for="inputEmail" class="sr-only"></label>
      <input type="text" id="login" name="login" class="form-control" placeholder="Digite seu usuário" required
             autofocus><br/>
      <label for="inputPassword" class="sr-only"></label>
      <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha"
             required>
      <div class="checkbox">
      </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="logar">Entrar</button>
      <a href="">esqueceu a senha?</a>
      <?php if(isset($msg) && !empty($msg)): ?>
          <div class="alert alert-danger"><?php echo $msg;?></div>
        <?php endif;?>
    </form>
  </div>
    <script src="<?php echo BASE; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/custom.js"></script>
</body>
</html>