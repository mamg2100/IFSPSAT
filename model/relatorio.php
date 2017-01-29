<?php class relatorio extends model{
	public function __construct(){
		parent::__construct();
	}
	public function pesquisaAvancada($aluno1,$aluno2 = '',$professor,$dataInicio,$dataFim,$dias){
		
		$array = array();
		$sql = "SELECT '$aluno1','$aluno2' FROM tcc WHERE dtDefesa BETWEEN '$dataInicio' AND '$dataFim'";	
		echo $sql; exit;
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;		

	}

}