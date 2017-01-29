<?php 
class recebedorController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
		$u = new pessoa();
	  	$permissao = $u->permission($_SESSION['logsat']);
	  	$ident = $u->getIdent($_SESSION['logsat']);
		if($permissao == 'usuario' && $ident == 'a'){
			header("Location: ".BASE);
		}
	}
	public function index(){
		
	}
}