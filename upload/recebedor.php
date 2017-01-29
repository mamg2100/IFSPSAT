<?php
$arquivo = $_FILES['arquivo'];

if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
	    //$ext = explode(".", $_FILES['arquivo']['name']);
		//$ext = end($ext);
		$nomedoarquivo = md5(time().rand(0,99)).'.png';
		//$nomedoarquivo = md5($arquivo['name'].time().rand(0,99)).'.png';
    	move_uploaded_file($arquivo['tmp_name'], 'arquivos/'.$arquivo['name']);
	    echo 'Arquivo enviado com sucesso!';
	    }
/* 
class recebedorController extends controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		
		$data = array();
			if(isset($_FILES{'arquivo'})){

			$arquivo = $_FILES['arquivo'];

	    	if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
	    		$ext = explode(".", $_FILES['arquivo']['name']);

				$ext = end($ext);
				$nomedoarquivo = md5(time().rand(0,99)).'.'.$ext;
				echo $nomedoarquivo; exit;
	        //$nomedoarquivo = md5($arquivo['name'].time().rand(0,99)).'.png';
	    	move_uploaded_file($arquivo['tmp_name'], 'localhost:8088/mvc/assets/arquivos/'.$nomedoarquivo);
	        echo 'Arquivo enviado com sucesso!';
	    	}
    	}

		$this->loadTemplate('envioarquivos',$data);	
	}
}
*/
?>