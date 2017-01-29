
<?php
class reuniaoController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}
	  public function index(){}
	  
	public function consultar($id){
		$data = array();
		$r = new reuniao();


		$data['reunioes'] = $r->getReunioesFromIdTcc($id);
		$this->loadTemplate('listarReuniao',$data);		
	}
      // Método Cadastro de Reuniao
	  public function cadastrar($idTcc = ''){
	  	$dados = array(
	  		'msg'=> '',
	  		'reuniao' => array(),
	  	);
	  	$t = new tcc();
	    // uma reunião deve ter pelo menos um assunto da pauta
	  	if(isset($_POST['assunto']) && !empty($_POST['assunto'])){
	  		
	  		$dtReuniao = addslashes($_POST['dataReuniao']);
	  		$assunto   = addslashes($_POST['assunto']);
	  		$metas	   = addslashes($_POST['metas']);
	  		//$tcc	   = $t->getIdTccFromLoggedUser($_SESSION['logsat']);
	  		$tcc	   = addslashes($_POST['idTcc']);
	  			  		      
			$r = new reuniao();
			if($r->addReuniao($dtReuniao,$assunto,$metas,$tcc) == true){
				$dados['msg'] =	'1'; 
			}else{
				$dados['msg'] = '0'; 
			}
	  	}

	  	//codigo para pegar o nome do usuário logado e apresenta na view corrente
	  	$u = new pessoa();
	  	
		$dados['nome'] = $u->getNome($_SESSION['logsat']);
		//$dados['tcc'] recebe o retorno vindo do model tcc, pela função getTccFromLoggedUser
		$n = new pessoa();
		$ident = $n->getIdent($_SESSION['logsat']);
		$nivel = $n->getNivel($_SESSION['logsat']);
		if($ident == 'cg' && $nivel == 'usuario'){
			$dados['tcc']  = $t->getTccFromIdTcc($idTcc);
		}else{
			$dados['tcc'] = $t->getTccFromLoggedUser($_SESSION['logsat']);
		}

		$dados['identificacao'] = $u->getIdent($_SESSION['logsat']);
		$r = new reuniao();
		$dados['reuniao'] = $r->getReunioes();
	  	//codigo para carregar o template que contém a barra de menu.
	  	$this->loadTemplate('cadastrarReuniao',$dados);
	  }

	  // Método para editar 'Reuniao'
	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'reunioes' => array(),
	  		'tccs'=> array(),
	  	);

	  //Pega reuniao pelo id e apresenta os dados na view
	  	$c = new reuniao();
	  	$dados['reunioes'] = $c->getReuniaoById($id);

	  //Aqui é função de edição
	  	if(isset($_POST['assunto']) && !empty($_POST['assunto'])){
	  		$dtReuniao = addslashes($_POST['dataReuniao']);
	  		$assunto = addslashes($_POST['assunto']);
	  		$metas = addslashes($_POST['metas']);
	  		$tcc = addslashes($_POST['tccvinculado']);
	  		$idtcc = addslashes($_POST['idtccvinculado']);
	  		//echo $idtcc; exit;
			$c->editarReuniao($id,$dtReuniao,$assunto,$metas,$idtcc);
			header("Location: ".BASE."reuniao");
	  	}

	  //codigo para pegar o nome do usuário logado e apresenta na view corrente (editar reunião)
	  	$u = new pessoa();
	  	$t = new tcc();
		$dados['nome'] = $u->getNome($_SESSION['logsat']);
		$dados['tccs'] = $t->getTccFromLoggedUser($_SESSION['logsat']);
		$dados['tccreuniao'] = $c->getReuniaoTcc($id);
        /*        
		var_dump($dados);
		exit;
        */
		$this->loadTemplate('editarReuniao',$dados); 	       	  	
	  }	  

	  public function excluir($id){

	  	$d = new reuniao();
	  	$d->excluir($id);
	  	// redireciona para url 'BASE' definida no arquivo config.php + objeto em questão.
	  	header("Location: ".BASE."reuniao");

	  }
}
?>
