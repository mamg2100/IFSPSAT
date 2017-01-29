<?php

/**
* @author Marco A. M. Guimarães
* @version 1.0
* 
* Classe Pai: controller
* Classe Filha: areaController
* Arquivo: areaController.php
*/

class areaController extends controller{
	public function __construct(){
		parent::__construct();
		$u = new pessoa();
		$u->isLogged();
	}
	
	public function index(){
		
		$data = array(
			'area' => array(),
			'nivel' => '',
			'nome' => ''
		);
		//Captura o nome do usuário e manda para a view
		$p = new pessoa();
		$data['nome'] = $p->getNome($_SESSION['logsat']);

        $n = new pessoa();
		$data['nivel'] = $n->getNivel($_SESSION['logsat']);

		$c = new area();
		$data['area'] = $c->getArea();
		
		$this->loadTemplate('listarArea',$data);
	}

	  // Método de Cadastro de Area
	  public function cadastrar(){
	  	//Verififca se o usuário tem permissão para acessar essa área
	  	$u = new pessoa();
	  	$permissao = $u->permission($_SESSION['logsat']);
	  	// Se for admin, cadastra a área indicada, senão vai pra tela inicial e não cadastra.
		if($permissao != 'admin'){
			header("Location: ".BASE);
		}

	  	$dados = array(
	  		'msg'=> ''
	  	);
	  	
	  	if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
	  		$descricao  = addslashes($_POST['descricao']);
	  		
	  		$a = new area();
			if($a->addArea($descricao) == true){
				$dados['msg'] =	'1'; 
			}else{
				$dados['msg'] = '0'; 
			}
	  	}
	  	//codigo que captura o nome do usuário logado e apresenta na view corrente
	  	$p = new pessoa();
		$dados['nome'] = $p->getNome($_SESSION['logsat']);
	  	
	  	//codigo para carregar o template que contém a barra de menu nessa view
	  	$this->loadTemplate('cadastrarArea',$dados);
	  	
	  }

	  // Método para editar 'Área de Interesse'
	  public function editar($id){
	  	$dados = array(
	  		'msg'=> '',
	  		'area' => array(),
	  	);

	  	//Pega area pelo id e apresentas os dados na view
	  	$c = new area();
	  	$dados['area'] = $c->getAreaById($id);

	  	//Aqui é função de edição
	  	if(isset($_POST['descricao']) && !empty($_POST['descricao'])){
	  		$descricao = addslashes($_POST['descricao']);
			$c->editarArea($descricao,$id);
			header("Location: ".BASE."area");
	  	}
	  	
	  	//codigo para pegar o nome do usuário logado e apresenta na view corrente
	  	$u = new pessoa();
		$dados['nome'] = $u->getNome($_SESSION['logsat']);
	  	
	  	$this->loadTemplate('editarArea',$dados);
	  	
	  }
	  public function excluir($id){

	  	$d = new area();
	  	$d->excluir($id);
	  	// redireciona para url 'BASE' definida no arquivo config.php + objeto em questão.
	  	header("Location: ".BASE."area");

	  }
}
?>