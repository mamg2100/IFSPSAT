<?php 
class banca extends model{
	
	public function addBanca($presidente = '',$orientador = '',$coorientador = '',$nomecoorientador = '', $substituto = '', $tipobanca = '', $idTcc = '',$identMembro = ''){

		$sql = "SELECT idMembro from pessoa_membro_externo WHERE idPessoa = $coorientador";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$idMembro = $row['idMembro'];
		}else{
			$idMembro = null;
		}

		if(empty($identMembro)){
			$sql="UPDATE tcc SET idmembro='$idMembro' WHERE idTcc='$idTcc'";
       	    $this->db->query($sql);
		}
		$sql = "INSERT INTO banca SET presidente='$presidente', orientador='$orientador', 
		coorientador='$nomecoorientador',substituto='$substituto', tipobanca='$tipobanca', idMembro='$idMembro',idTcc='$idTcc'";
		
		//echo $sql;exit;
	
		$this->db->query($sql);	
		if($this->db->lastInsertId()){
			return true;
		}else{
			return false;
		}

	}
		
	public function getBanca(){
		$sql = "SELECT * FROM banca";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function excluir($id){
	  	$sql="DELETE FROM banca WHERE idBanca='$id'";
	  	$this->db->query($sql);
	  		
	}

	public function editarBanca($id, $presidente = '',$orientador = '',$coorientador = '',$nomecoorientador = '', $substituto = '', $tipobanca = '', $idTcc = '',$identMembro = ''){

		$sql = "SELECT idMembro from pessoa_membro_externo WHERE idPessoa = $coorientador";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$idMembro = $row['idMembro'];
		}else{
			$idMembro = '';
		}

		if(empty($identMembro)){
			$sql="UPDATE tcc SET idmembro='$idMembro' WHERE idTcc='$idTcc'";
       	    $this->db->query($sql);
		}

		$sql = "UPDATE banca SET presidente='$presidente', orientador='$orientador', 
		coorientador='$nomecoorientador',substituto='$substituto', tipobanca='$tipobanca', idMembro='$idMembro',idTcc='$idTcc' WHERE idbanca = '$id'";	
		//echo $sql;exit;
		$this->db->query($sql);	

	}
	
	public function getBancaById($id){
		$sql = "SELECT * FROM banca WHERE idBanca = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getBancaTcc($id){
		$sql = "SELECT titulo FROM tcc as t join banca as b ON t.idTCC = b.idTCC WHERE idBanca='$id'";
		$sql = $this->db->query($sql);
        $array = array();
        if($sql->rowCount() > 0){
        	$array = $sql->fetch();
        }
        return $array['titulo'];
	}

}