<?php
class cursoController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}
	
	public function index(){
		$data = array(
			'cursos' => array(),
			'nivel' => '',
			'nome' => ''
		);
		$c = new curso();
		$data['cursos'] = $c->getCursos();

		//Captura nome do usuário e manda para a view
		$n = new pessoa();
		$data['nivel'] = $n->getNivel($_SESSION['logsat']);

		$this->loadTemplate('listarCurso',$data);
	}
	  // Método de Cadastro de Cursos
	  public function cadastrar(){
	  	$dados = array(
	  		'msg'=> ''
	  	);
	  	$u = new pessoa();
	  	$permissao = $u->permission($_SESSION['logsat']);
		if($permissao == 'usuario' || $permissao == 'professor'){
			header("Location: ".BASE);
		}
	  	$dados = array(
	  		'msg'=> ''
	  	);
	  	
	  	if(isset($_POST['sigla']) && !empty($_POST['sigla'])){
	  		$sigla       = addslashes($_POST['sigla']);
	  		$nome_curso  = addslashes($_POST['nome']);
	  		$ano_criacao = addslashes($_POST['data']);

			$c = new curso();
			if($c->addCurso($sigla,$nome_curso,$ano_criacao) == true){
				$dados['msg'] =	'1'; 
			}else{
				$dados['msg'] = '0'; 
			}
	  	}
	  	//codigo para carregar o template que contém a barra de menu.
	  	$this->loadTemplate('cadastrarCurso',$dados);
	  }

	  // Método para editar 'Curso' escolhido
	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'curso' => array(),
	  	);

	  	//Pega area pelo id e apresentas os dados na view
	  	$c = new curso();
	  	$dados['curso'] = $c->getCursoById($id);

	  	//Aqui é função de edição
	  	if(isset($_POST['sigla']) && !empty($_POST['sigla'])){
	  		$sigla = addslashes($_POST['sigla']);
			$nome_curso = addslashes($_POST['nome_curso']);
			$ano_criacao = addslashes($_POST['ano_criacao']);
				
			$c->editarCurso($id,$sigla,$nome_curso,$ano_criacao);
			
			header("Location: ".BASE."curso");
	  	}
	  	//codigo para pegar o nome do usuário logado e apresentar na view corrente
	  	$u = new pessoa();
		$dados['nome'] = $u->getNome($_SESSION['logsat']);

		$this->loadTemplate('editarCurso',$dados);
	  	
	  }	  

	  public function excluir($id){

	  	$d = new curso();
	  	$d->excluir($id);
	  	header("Location: ".BASE."curso");

	  }
}
?>