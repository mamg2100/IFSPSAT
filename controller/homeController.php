<?php 
class homeController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}	
	public function index(){
		$dados = array(
			'usuarios' => array(),
			'nome' => ''
		);
		$u = new pessoa();
		$data = '2017-02-02';
		$data = strtotime($data);
		//echo gmdate($data,'Y-m-d');
		
		$dados['nome'] = $u->getNome($_SESSION['logsat']);

		$arquivos = new anexos();
		$dados['arquivos'] = $arquivos->getAnexos();

		$this->loadTemplate('home',$dados);
	}
}
