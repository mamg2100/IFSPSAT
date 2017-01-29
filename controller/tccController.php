<?php
class tccController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}

	public function index(){
		$data = array(
			'tcc' => array(),
			'nivel' => '',
			'nome' => ''
		);
		$n = new pessoa();
		$ident = $n->getIdent($_SESSION['logsat']);
		$nivel = $n->getNivel($_SESSION['logsat']);

		$c = new tcc();

        /* Se logado como admin carrega todos os TCC cadstrados*/
		if($nivel == 'admin'){
			$data['tccs'] = $c->getTcc();
        /* Se logado como professor carrega somente os TCC dele*/
		}elseif($ident == 'cg' && $nivel == 'usuario'){
			$data['tccs'] = $c->getTccFromLoggedProfessor($_SESSION['logsat']);
		}else{
		/* Se logado como aluno carrega somente o seu TCC */
			$data['tccs'] = $c->getTccFromLoggedUser($_SESSION['logsat']);
		}

		$data['nivel'] = $n->getNivel($_SESSION['logsat']);
		$data['ident'] = $ident;		

		$this->loadTemplate('listarTcc',$data);
	}
	
	  public function cadastrar(){
	  
	  	$dados = array(
	  		'msg'=> ''
	  	);
	  	$u = new pessoa();
	  	$permissao = $u->permission($_SESSION['logsat']);
	  	$ident = $u->getIdent($_SESSION['logsat']);
		if($permissao == 'usuario' && $ident == 'a'){
			header("Location: ".BASE);
		}
	  	$dados = array(
	  		'msg'=> ''
	  	);
	  	// Cadastro TCC
	  	if(isset($_POST['titulo']) && !empty($_POST['titulo'])){			
	        
	        $idcurso           = addslashes($_POST['curso']);
			$idarea            = addslashes($_POST['area']);
	        $titulo            = addslashes($_POST['titulo']);
			$orientador		   = addslashes($_POST['orientador']);
			$idOrientador 	   = addslashes($_POST['idOrientador']);
			$coorientador	   = addslashes($_POST['coorientador']);
			$idCoorientador    = addslashes($_POST['idCoorientador']);
			#$aluno1		 	   = addslashes($_POST['nomeAluno1']);
	        #$idAluno1		   = addslashes($_POST['aluno1']);
	        #$aluno2            = addslashes($_POST['nomeAluno2']);
	        #$idAluno2		   = addslashes($_POST['aluno2']);
	        $status			   = addslashes($_POST['status']);  
	        #$dtQualif          = addslashes($_POST['dtQualif']);
	        #$dtDefesa          = addslashes($_POST['dtDefesa']);
	        #$dtMaxDefesa       = addslashes($_POST['dtMaxDefesa']);
	        $observacao        = addslashes($_POST['observacao']);  
			
			$c = new tcc();
			$dados['msg'] = $c->addTcc($titulo,$orientador,$coorientador,$status,$observacao,$idarea,$idcurso,$idOrientador,$idCoorientador);
			
	  	}
	  	$c = new curso();
	  	$a = new area();
	  	$p = new pessoa();
	  	//$s = new pessoa();
	  
	  	$dados['cursos'] = $c->getCursos();
	  	$dados['areas'] = $a->getArea();
	  	$dados['orientadores'] = $p->getUsersTeachers();
	  	// coorientador pode ser membro interno ou membro externo ao IFSP, logo 
	  	// vamos utilizar o método getUsersMembros();
	  	$dados['coorientadores'] = $p->getUsersMembros();	  	
	  	$dados['alunos'] = $p->getUsersStudentsWithoutTcc();

	  	$this->loadTemplate('cadastrarTcc',$dados);
	  }

	  // Início do Método para editar 'TCC' escolhido
	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'tcc' => array(),
	  	);

		//Pega area pelo id e apresentas os dados na view
	  	$t = new tcc();
	  	$dados['tcc'] = $t->getTccById($id);

        //usado para usar na comparação em editarTcc para comparação
	  	$dados['titulo'] = $t->getTccById($id);

	  	$c = new curso();
	  	$dados['curso'] = $c->getNomeCursoByIdTcc($id);

	  	$a = new area();
	  	$dados['area'] = $a->getDescricaoAreaByIdTcc($id);
	  	//var_dump($dados);exit;

	  	$p = new pessoa();
	  	$dados['orientador'] =  $p->getUsersTeachers();
	  	$dados['coorientador'] =  $p->getUsersTeachers();
	  	$dados['professor'] =  $p->getUsersTeachers();
	  	$dados['aluno'] = $p->getUsersStudents();
	  	$p = new pessoa();
	  	//Aqui é função de edição
	  	if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
	  		$titulo            = addslashes($_POST['titulo']);	
	        $status			   = addslashes($_POST['status']);  
	        $observacao        = addslashes($_POST['observacao']);
	        $sitQualif	       = addslashes($_POST['sitQualif']);
	        $sitDefesa         = addslashes($_POST['sitDefesa']);
	        $dtMinDefesa       = addslashes($_POST['dtMinDefesa']);
	        $dtMaxDefesa       = addslashes($_POST['dtMaxDefesa']);	        
	        //$dtQualif          = addslashes($_POST['dtQualif']);
	        $data_formal_orientacao     = addslashes($_POST['data_formal_orientacao']);
	        $data_proposta_tcc   = addslashes($_POST['data_prop_tcc']);
	        $data_nomeacao_banca_qualif   = addslashes($_POST['data_nomeacao_banca_qualif']);
	        //$dtDefesa          = addslashes($_POST['dtDefesa']);
	        
	        $data_ata_banca_qualif  = addslashes($_POST['data_ata_banca_qualif']);
	        //$data_anexo_quatro = addslashes($_POST['anexo4']);
	        $dt_nomeacao_banca_defesa = addslashes($_POST['data_nomeacao_banca_defesa']);
	        $dt_ata_banca_defesa = addslashes($_POST['data_ata_banca_defesa']);

	        //$data_anexo_seis   = addslashes($_POST['anexo6']);
	        //$data_anexo_sete   = addslashes($_POST['anexo7']);
	        //$data_anexo_oito   = addslashes($_POST['anexo8']);
	        //$data_anexo_nove   = addslashes($_POST['anexo9']);
	        //$idarea            = addslashes($_POST['areavinculada']);	        
	        //$idmembrodois      = addslashes($_POST['idmembrodois']);
			//$idtema            = addslashes($_POST['idtema']);
			
			$data_entrega_recibo_biblioteca = addslashes($_POST['data_entrega_recibo_biblioteca']);
			$nota              = addslashes($_POST['nota']);
			


			$t->editarTcc($id,$titulo,$status,$observacao,$sitQualif,$sitDefesa,$dtMinDefesa,$dtMaxDefesa,$data_formal_orientacao,$data_proposta_tcc,$data_nomeacao_banca_qualif,$data_ata_banca_qualif,$dt_nomeacao_banca_defesa,$dt_ata_banca_defesa,$data_entrega_recibo_biblioteca,$nota);          
            /*
			$t->editarTcc($id,$orientador,$coorientador,$aluno1,$aluno2,$status,
              $dtQualif="",$dtdefesa="",$dtMaxDefesa,$nota,$observacao,$data_anexo_um,
              $data_anexo_dois,$data_anexo_tres,$data_anexo_quatro,$data_anexo_cinco,
              $data_anexo_seis,$data_anexo_sete,$data_anexo_oito, $data_anexo_nove);
            */
			header("Location: ".BASE."tcc");
	  	}
	  	
	  	$this->loadTemplate('editarTCC',$dados);
	  	
	  } 
	  // Fim Método para editar 'TCC' escolhido	  
	  
	  public function excluir($id)
	  {   

	      //para excluir tcc tem-se que editar o idTcc='' na tabela aluno obrigatoriamente
	      //para eliminar a referência. 

	      $t = new tcc;	
			$t->excluir($id);
			header("Location: ".BASE."tcc");
		  
		  	// redireciona para url 'BASE' definida no arquivo config.php + objeto em questão.	  	
	  }
	  public function vincular($id){
	  	$data = array(
	  		'alunos' => array(),
	  		'tcc' => '',
	  	);
	  	$p = new pessoa();
	  	$t = new tcc();


	  	$data['alunos'] = $p->getUsersStudentsWithoutTcc();
	  	$data['tcc'] = $t->getTccByName($id);

	  	if(isset($_POST['aluno1'])){
	  		$aluno1 = addslashes($_POST['aluno1']);
	  		$aluno2 = addslashes($_POST['aluno2']);
	  		$dtMaxDefesa = addslashes($_POST['dtMaxDefesa']);


	  		$nomeAluno1 = $p->getNome($aluno1);
	  		if(isset($aluno2) && !empty($aluno2)){
	  			$nomeAluno2 = $p->getNome($aluno2);
	  			
	  		}
	  		$t->vincular($id,$aluno1,$aluno2,$nomeAluno1,$nomeAluno2,$dtMaxDefesa);

	  		header("Location: ".BASE."tcc");

	  	}

	  	$this->loadTemplate('vincular',$data);
	  }
}
?>
<script src="<?php echo BASE; ?>assets/js/editar_tcc.js"></script>