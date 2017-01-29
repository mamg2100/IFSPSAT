<?php 
class tema extends model{
	public function addTema($descricao,$status,$prontuario){
		$sql = "INSERT INTO tema SET descricao='$descricao', status = '$status', prontuario='$prontuario'";
		$this->db->query($sql);	
		if($this->db->lastInsertId()){
			return true;
		}else{
			return false;
		}
	}

	public function getTemas(){
		$sql = "SELECT * FROM tema";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function excluir($id){
	  	$sql="DELETE FROM tema WHERE idTema='$id'";
	  	$this->db->query($sql);	  		  	  	
	}

	public function editarTema($id,$descricao,$status,$prontuario){
        $sql="UPDATE tema SET descricao='$descricao', status= '$status', prontuario='$prontuario' 
        WHERE idTema='$id'";
        $this->db->query($sql);
        
	}

	public function getTemaById($id){
		$sql = "SELECT * FROM tema WHERE idTema = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}
		return $array;
	}
}