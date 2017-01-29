<?php 

class contatoController extends controller{

	public function __contruct(){
		parent::construct();
	}
	
	public function index(){

      $dados = array(
      	'aviso' => ''
      	);

      if (isset($_POST['nome']) && !empty($_POST['nome'])) {

      	$nome = addslashes($_POST['nome']);
      	$email = addslashes($_POST['email']);
      	$msg = addslashes($_POST['mensagem']);

      	$para = "admin@ifspsat.com.br";
      	$assunto = "Dúvida do Site";
      	$mensagem = "Nome: ".$nome."</br>Email: ".$email."</br>Mensagem: ".$msg;

      	$cabecalho = 'From: admin@ifspsat.com.br'."\r\n". 'Reply-to: '.$email."\r\n".
      	'X-Mailer: PHP/'.phpversion();

      	//print_r($_POST); exit;
  

        $dados['aviso'] = mail($para, $assunto, $mensagem, $cabecalho);
        var_dump($dados);
      }

      $this->loadTemplate('contato', $dados);

	}

}
?>