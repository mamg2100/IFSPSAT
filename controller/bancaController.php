<?php
class bancaController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}
	
	public function index(){
		$data = array(
			'banca' => array(),
			'nivel' => '',
			'nome' => ''
		);
		$c = new banca();
		$data['bancas'] = $c->getBanca();
		
		$n = new pessoa();
		$data['nivel'] = $n->getNivel($_SESSION['logsat']);
		$this->loadTemplate('listarBanca',$data);

	}
	
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
	  	// Cadastro de Banca
	  	if(isset($_POST['presidente']) && !empty($_POST['presidente'])){
	  		$presidente      = addslashes($_POST['presidente']);
	  		$orientador  	 = addslashes($_POST['membroum']);
	  		$coorientador 	 = addslashes($_POST['membrodois']);//id do membro 2
	  		$nomecoorientador= addslashes($_POST['nomeMembrodois']);//nome do membro 2 
	  		$substituto 	 = addslashes($_POST['substituto']);
	  		$tipobanca       = addslashes($_POST['tipobanca']);
	  		$idTcc           = addslashes($_POST['idTcc']);
	  		$identMembro     = addslashes($_POST['identMembro']);//identficação do membro 2
	  		//var_dump($_POST); exit;
	  		//$idmembro 		 = addslashes($_POST['idmembro']);
	  		//$idBanca 		 = addslashes($_POST['idBanca']);	  		
			$c = new banca();
			if($c->addBanca($presidente,$orientador,$coorientador,$nomecoorientador, $substituto, $tipobanca, $idTcc,$identMembro) == true){
				$dados['msg'] =	'1'; 
			}else{
				$dados['msg'] = '0'; 
			}
	  	}
	  	//codigo para pegar o nome do usuário logado e apresenta na view corrente
	  	$u = new pessoa();
		$dados['nome'] = $u->getNome($_SESSION['logsat']);
		$dados['professores'] = $u->getUsersTeachers();
		$dados['membros'] = $u -> getUsersMembros();
		
		$t = new tcc();
		$dados['titulos']=$t->getTcc();

		//var_dump($dados); exit;
		
	  	$this->loadTemplate('cadastrarBanca',$dados);
	  }
	  
	  // Método para editar 'Banca' escolhido
	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'banca' => array(),
	  		'Tipobanca' => array(
	  			0 => 'Defesa',
	  			1 => 'Qualificação'
	  		),
	  	);

	  	//Pega banca pelo id e apresentas os dados na view
	  	$c = new banca();
	  	$dados['banca'] = $c->getBancaById($id);

	  	//Aqui é função de edição
	  	if(isset($_POST['presidente']) && !empty($_POST['presidente'])){
	  		$presidente      = addslashes($_POST['presidente']);
	  		$orientador  	 = addslashes($_POST['membroum']);
	  		$coorientador 	 = addslashes($_POST['membrodois']);//id do membro 2
	  		$nomecoorientador= addslashes($_POST['nomeMembrodois']);//nom do membro 2 
	  		$substituto 	 = addslashes($_POST['substituto']);
	  		$tipobanca       = addslashes($_POST['tipobanca']);
	  		$idTcc           = addslashes($_POST['idTcc']);
	  		$identMembro     = addslashes($_POST['identMembro']);//identficação do membro 2

			$c->editarBanca($id,$presidente,$orientador,$coorientador,$nomecoorientador, $substituto, $tipobanca, $idTcc,$identMembro);
			header("Location: ".BASE."banca");

	  	}
	  	//codigo para pegar o nome do usuário logado e apresentar na view corrente
	  	$p = new pessoa();
	  	$t = new tcc();
	  	$b = new banca();

		$dados['nome'] = $p->getNome($_SESSION['logsat']);

		//$u = new pessoa();
		$dados['nome'] = $p->getNome($_SESSION['logsat']);
		$dados['professores'] = $p->getUsersTeachers();
		$dados['membros'] = $p -> getUsersMembros();
        $dados['tccbanca'] = $b->getBancaTcc($id);
		
	  	$this->loadTemplate('editarBanca',$dados);

	  	
	  }	  

	  public function excluir($id){

	  	$d = new banca();
	  	$d->excluir($id);
	  	header("Location: ".BASE."banca");

	  }
}
?>