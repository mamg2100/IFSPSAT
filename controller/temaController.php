<?php
class temaController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}

	  public function index(){
		$data = array(
			'temas' => array(),
			'nivel' => '',
			'nome' => ''
		);
		$c = new tema();
		$data['temas'] = $c->getTemas();

        //Captura nome do usuário e manda para a view
		$n = new pessoa();
		$data['nivel'] = $n->getNivel($_SESSION['logsat']);
        // repasse de informação para a camada de apresentação (view)
		$this->loadTemplate('listarTema',$data);
	}
      // Método Cadastro de Tema de Interesse
	  public function cadastrar(){
	  	$dados = array(
	  		'msg'=> ''
	  	);
	    // o prontuário relacionado ao tema é campo obrigatoria no BD
	  	if(isset($_POST['prontuario']) && !empty($_POST['prontuario'])){
	  		
	  		$descricao = addslashes($_POST['descricao']);
	  		$status = addslashes($_POST['status']);
	  		$prontuario = addslashes($_POST['prontuario']);
			
			$c = new tema();
			if($c->addTema($descricao,$status,$prontuario) == true){
				$dados['msg'] =	'1'; 
			}else{
				$dados['msg'] = '0'; 
			}
	  	}
        //codigo para carregar o template que contém a barra de menu.
	  	$this->loadTemplate('cadastrarTema',$dados);
	  }

	  // Método para editar 'Tema de Interesse'
	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'tema' => array(),
	  	);

	  	//Pega tema pelo id e apresenta os dados na view
	  	$c = new tema();
	  	$dados['tema'] = $c->getTemaById($id);

	  	//Aqui é função de edição
	  	if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
	  		$descricao	= addslashes($_POST['descricao']);
	  		$status 	= addslashes($_POST['status']);	  		
            $prontuario = addslashes($_POST['prontuario']);
            
			$c->editarTema($id,$descricao,$status,$prontuario);
			header("Location: ".BASE."tema");
	  	}
	  	$this->loadTemplate('editarTema',$dados);
	  	
	  }	  

	  public function excluir($id){

	  	$d = new tema();
	  	$d->excluir($id);
	  	// redireciona para url 'BASE' definida no arquivo config.php + objeto em questão.
	  	header("Location: ".BASE."tema");

	  }
}
?>