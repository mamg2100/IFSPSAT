<?php 
class sobreController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}
	public function index(){
		$dados = array();
		$this->loadTemplate('sobre',$dados);
	}
}