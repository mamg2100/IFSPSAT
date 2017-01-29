<?php 
class controller{
	protected $db;
	public function __construct(){
		//$this->db = new PDO("mysql:host=amysql.f1.k8.com.br/;dbname=ifspsat","ifspsat","m@rco3255");

		$this->db = new PDO("mysql:host=localhost;dbname=TCC","root","");
	}
	public function loadView($viewName, $viewData){
		extract($viewData);		
		require_once 'views/'.$viewName.'.php';
	}
	public function loadTemplate($viewName, $viewData){
		extract($viewData);			
		$u = new pessoa();
		$nivel = $u->getNivel($_SESSION['logsat']);
		$nome = $u->getNome($_SESSION['logsat']);
		require_once 'views/template.php';
	}
	public function loadViewInTemplate($viewName, $viewData){
		extract($viewData);
		require_once 'views/'.$viewName.'.php';
	}
}