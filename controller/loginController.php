<?php 
class loginController extends controller{
	public function index(){
		$dados = array(
			'msg'=> ''
		);
		if(isset($_POST['login']) && !empty($_POST['login'])){
			$login = addslashes($_POST['login']);
			$senha = md5(addslashes($_POST['senha']));

			$l = new pessoa();

			$dados['msg'] = $l->login($login,$senha);

		}
		
		$this->loadView('login',$dados);
	}
	public function logout(){
		unset($_SESSION['logsat']);
		header("Location: ".BASE);
	}
}