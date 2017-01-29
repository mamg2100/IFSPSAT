<?php 
class relatorioController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}	
	public function index(){
		$dados = array();

		$u = new pessoa();
		$r = new relatorio();
		$a = new area();

	  	$permissao = $u->permission($_SESSION['logsat']);
		if($permissao == 'usuario' || $permissao == 'professor'){
			header("Location: ".BASE);
		}
		if(isset($_POST['aluno1']) && !empty($_POST['aluno1'])){
			$aluno1     = addslashes($_POST['aluno1']);
			$aluno2     = addslashes($_POST['aluno2']);
			$dataInicio = addslashes($_POST['dataInicio']);
			$dataFim    = addslashes($_POST['dataFim']);
			$dias       = addslashes($_POST['dias']);
			$professor  = addslashes($_POST['professor']);
			$dados['relatorio'] = $r->pesquisaAvancada($aluno1,$aluno2,$dataInicio,$dataFim,$dias,$professor);
		}
        $dados['alunos'] = $u->getUsersStudents();
        $dados['professores'] = $u->getUsersTeachers();
        $dados['areas'] = $a->getArea();

		$this->loadTemplate("relatorio",$dados);
	}
	public function listarTcc($pesquisa,$id){
		$data = array();
		$t = new tcc();
		if($pesquisa == 'pesquisa1'){
			
		}
		$this->loadTemplate($pesquisa,$data);
	}
}