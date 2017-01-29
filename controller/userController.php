<?php
class userController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}

	public function index(){
		$data = array(
			'pessoas' => array(),
			'nivel' => '',
			'nome' => ''
		);	
		//Captura o nome do usuário logado e manda para a view
		$p = new pessoa();
		$data['nome']= $p->getNome($_SESSION['logsat']);
		//Captura todos os usuários e manda para a view
		$data['pessoas'] = $p->getUsers();
		//Captura o nível do usuário para manipulação
		$data['nivel'] = $p->getNivel($_SESSION['logsat']);
		//Captura a identificação do usuário: Professor=cg, Aluno=a, Membro Externo=''
		$data['identificao'] = $p->getIdent($_SESSION['logsat']);

		$this->loadTemplate('listarPessoa',$data);
	}	

	  public function cadastrar(){
	  	$u = new pessoa();
	  	$permissao = $u->permission($_SESSION['logsat']);
		if($permissao == 'usuario' || $permissao == 'professor'){
			header("Location: ".BASE);
		}
	  	$dados = array(
	  		'msg'=> ''
	  	);
		// Cadastro de Usuários
	  	if(isset($_POST['nome']) && !empty($_POST['nome'])){
	  		
	  	    $nome 	     	= addslashes($_POST['nome']);
		    $dtnasc		 	= addslashes($_POST['datanasc']);
		    $sexo		 	= addslashes($_POST['sexo']);
		    $endereco    	= addslashes($_POST['endereco']);
			$cep            = addslashes($_POST['cep']);
		    $complemento	= addslashes($_POST['complemento']);
		    $bairro 		= addslashes($_POST['bairro']);
		    $cidade 		= addslashes($_POST['cidade']);
		    $estado 		= addslashes($_POST['estado']);
		    $pais 			= addslashes($_POST['pais']);
		    $email 			= addslashes($_POST['email']);
		    $lattes			= addslashes($_POST['lattes']);
		    $telefone 		= addslashes($_POST['telefone']);
		    $celular 		= addslashes($_POST['celular']);
		    $login     		= addslashes($_POST['login']);
		    $senha     		= md5(addslashes($_POST['senha']));
		    $nivelacesso	= addslashes($_POST['nivelacesso']);
		    $identificacao	= addslashes($_POST['identificacao']);
		    $instituicao    = addslashes($_POST['instituicao']);
		    $funcao         = addslashes($_POST['funcao']);
		    $prontuario		= addslashes($_POST['prontuario']);

		    if(!empty($_POST['dataLimite'])){
		    	$dataLimite 	= addslashes($_POST['dataLimite']);
			}else{
				$dataLimite = '';
			}

		    if(!empty($_POST['dtingresso'])){
		    	$dataInicio 	= addslashes($_POST['dtingresso']);
			}else{
				$dataInicio = '';
			}

			//var_dump($_POST); exit;

			if(!empty($_POST['curso'])){
		    	$idCurso 		= addslashes($_POST['curso']);
		    }else{
		    	$idCurso = '';
		    }
		    
        	$p = new pessoa();
			if($p->addPessoa($nome,$dtnasc,$sexo,$endereco,$cep,$complemento,$bairro,$cidade,$estado,$pais,$email,$lattes,$telefone,$celular,$login,$senha,$nivelacesso,$identificacao,$instituicao,$funcao,$prontuario,$dataInicio,$dataLimite,$idCurso) == true){
				$dados['msg'] =	'1'; 
			}else{
				$dados['msg'] = '0'; 
			}
	  	}
	  	//codigo para capturar o nome do usuário logado e apresenta na view corrente
	  	$u = new pessoa();
	  	$c = new curso();

		$dados['nome'] = $u->getNome($_SESSION['logsat']);
		
		$dados['cursos'] = $c->getCursos();
	  	
        //carregar a view com o template que contém a barra de menu e envia os dados.
	  	$this->loadTemplate('cadastrarPessoa',$dados);
	  }

	  	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'pessoa' => array(),

	  	);

	  	//Pega user pelo id e apresentas os dados na view
	  	$p = new pessoa();
	  	$c = new curso();
	  	$me= new membro();
	  	$a = new aluno();
	  	
	  	$dados['cursoAluno'] = $c->getCursoAluno($id);
	  	$dados['cursos'] = $c->getCursos($id);
	  	$dados['pessoa'] = $p->getPessoaById($id);
	  	$dados['identificacao'] = $p->getIdent($id);
	  	$dados['vinculo'] = $me->getInstFuncaoMembro($id);
	  	$dados['dataingresso'] = $a->getDataIngressoAluno($id);

		//$idCurso=$dados['cursoAluno'][0];          
        
     	  	if(!empty($_POST['curso'])){
		    	$idCurso=addslashes($_POST['curso']);
		    }else{
		    	$idCurso='';
		    }
		
	  	//Aqui é função de edição
	  	if(isset($_POST['nome']) && !empty($_POST['nome'])){
	  		//$id             = addslashes($_POST['idPessoa']);
	  		$nome 	     	= addslashes($_POST['nome']);
		    $dtnasc		 	= addslashes($_POST['datanasc']);
		    $sexo		 	= addslashes($_POST['sexo']);
		    $endereco    	= addslashes($_POST['endereco']);
		    $cep            = addslashes($_POST['cep']);
		    $complemento	= addslashes($_POST['complemento']);
		    $bairro 		= addslashes($_POST['bairro']);
		    $cidade 		= addslashes($_POST['cidade']);
		    $estado 		= addslashes($_POST['estado']);
		    $pais 			= addslashes($_POST['pais']);
		    $email 			= addslashes($_POST['email']);
		    $lattes			= addslashes($_POST['lattes']);
		    $telefone 		= addslashes($_POST['telefone']);
		    $celular 		= addslashes($_POST['celular']);
		    $nivelacesso	= addslashes($_POST['nivelacesso']);
		    $identificacao	= addslashes($_POST['identificacao']);
		    $prontuario		= addslashes($_POST['prontuario']);
		    $instituicao    = addslashes($_POST['instituicao']);
		    $funcao         = addslashes($_POST['funcao']);
		    $dtingresso 	= (isset($_POST['dtingresso']))?addslashes($_POST['dtingresso']):'';
		    $idcurso        = (isset($_POST['curso']))?addslashes($_POST['curso']):'';	

		    //var_dump($_POST); exit;
		    //$idCurso=$dados['cursoAluno'][0];  
		       	
			$p->editarPessoa($id,$nome,$dtnasc,$sexo,$endereco,$cep,$complemento,
            $bairro,$cidade,$estado,$pais,$email,$lattes,$telefone,$celular,$nivelacesso,$identificacao,
            $prontuario, $instituicao, $funcao, $dtingresso, $idcurso);

			header("Location: ".BASE."user");
	  	}
		$dados['nome'] = $p->getNome($_SESSION['logsat']);
        
	  	$this->loadTemplate('editarPessoa',$dados);
	  	//codigo para pegar o nome do usuário logado e apresenta na view corrente	  		  	
	  }

	  public function excluir($id){
	  	$d = new pessoa();
	  	$ident = $d->getIdent($id);
	  	$d->excluir($id,$ident);
	  	// redireciona para url 'BASE' definida no arquivo config.php + objeto em questão.
	  	header("Location: ".BASE."user");
	  }
}
?>