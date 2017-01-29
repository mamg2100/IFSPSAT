<?php 
class ajaxController extends controller{
	public function __construct(){
		parent::__construct();
	}

	public function getIdCurso($id){
		$c = new curso();
		$data = $c->getIdByCurso($id);		
		echo $data;
	}

	public function getIdArea($id){
		$a = new area();
		$data = $a->getIdByArea($id);
		echo $data;
	}

	public function getId($id){
		$p = new pessoa();
		$data = $p->getNome($id);
		echo $data;
	}

	public function addBanca($id){
		$sql = "SELECT nome, identificacao FROM pessoa WHERE idPessoa = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetch();
		}
		echo json_encode($array);
	}
	public function getData($idPessoa){
		$sql = "SELECT data_ingresso FROM usuario_aluno WHERE idPessoa = '$idPessoa'";
		$sql = $this->db->query($sql);
		$row = '';
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$row = $sql;
		}		
		echo $row['data_ingresso'];
	}
	public function pesquisa1(){
		$array = array();
		$dataInicio = $_POST['dataInicio'];
		$dataFim = $_POST['dataFim'];
		if($dataInicio != '' || $dataFim != ''){
			$sql = "SELECT idTcc,aluno1,aluno2,titulo,dtDefesa FROM tcc WHERE dtDefesa BETWEEN '$dataInicio' AND '$dataFim'";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}else{
			$sql = "SELECT idTcc,aluno1, aluno2, titulo, dtDefesa FROM Tcc";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}
		echo json_encode($array);
	}
	public function pesquisa2(){
		$array = array();
		$ano = $_POST['ano'];
		$professor = $_POST['professor'];
        
		$row = '';
		$sql = "SELECT idProfessor FROM usuario_professor WHERE idPessoa = $professor";

		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
		}
		$idProfessor = $row['idProfessor'];
		
		if($ano != ''){
			$sql ="SELECT * FROM tcc_has_professor as thp JOIN tcc ON thp.idTcc = tcc.idTcc WHERE data_formal_orientacao LIKE '%$ano%'";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}else{
			$sql = $sql ="SELECT * FROM tcc_has_professor as thp JOIN tcc ON thp.idTcc = tcc.idTcc WHERE idProfessor = $idProfessor";
			
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}
		echo json_encode($array);

	}

	public function pesquisa3(){
		$array = array();
		$dataInicio = $_POST['dataInicio'];
		$dataFim = $_POST['dataFim'];
		$aluno = $_POST['aluno'];

		$row = '';
		$sql = "SELECT idAluno FROM usuario_aluno WHERE idPessoa = $aluno";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
		}

		$idAluno = $row['idAluno'];
		
		if($dataInicio != '' || $dataFim != ''){
			$sql ="SELECT * FROM aluno as a JOIN tcc as t ON a.idTcc = t.idTcc WHERE dtDefesa BETWEEN '$dataInicio' AND '$dataFim' AND idAluno = $idAluno";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}else{
			$sql ="SELECT * FROM usuario_aluno as a JOIN tcc as t ON a.idTcc = t.idTcc WHERE idAluno = $idAluno";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}
		echo json_encode($array);
	}
	public function pesquisa4(){
		$array = array();
		if(isset($_POST['area']) && !empty($_POST['area'])){
			$area = $_POST['area'];
			$sql = "SELECT * FROM tcc as t JOIN area as a ON t.idarea = a.idarea WHERE a.idarea = '$area'";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
		}
		echo json_encode($array);
	}
	public function pesquisa5(){
		$array = array();
		if(isset($_POST['interval']) && !empty($_POST['interval'])){
			$interval = $_POST['interval'];
			$sql = "SELECT * FROM pessoa as p JOIN usuario_aluno as a ON p.idPessoa = a.idPessoa WHERE data_limite BETWEEN CURRENT_DATE() AND CURRENT_DATE() + INTERVAL $interval DAY ORDER BY data_limite DESC";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
			echo json_encode($array);
		}
	}
}