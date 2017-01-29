<?php 
class curso extends model{
	
    public function addCurso($sigla, $nome, $data){
		$sql = "INSERT INTO curso SET sigla = '$sigla', nome_curso = '$nome', ano_criacao = '$data'";
		$this->db->query($sql);
		
		if($this->db->lastInsertId()){
			return true;
		}else{
			return false;
		}
	}   

	public function getCursos(){
		$sql = "SELECT * FROM curso";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	
	public function excluir($id){
	  	$sql="DELETE FROM curso WHERE idCurso='$id'";
	  	$this->db->query($sql);	  	 	  	
	}

	public function editarCurso($id,$sigla, $nome, $data){
        $sql="UPDATE curso SET sigla='$sigla', nome_curso='$nome', ano_criacao='$data' WHERE idCurso='$id'";
        $this->db->query($sql);
	}
	
	public function getCursoById($id){
		$sql = "SELECT * FROM curso WHERE idCurso = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getIdByCurso($id){

		$sql = "SELECT idCurso FROM curso WHERE idCurso = '$id'";
		$sql = $this->db->query($sql);

		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			$id = $array['idCurso'];
		}
		return $id;
	}

	public function getCursoAluno($id){

            $array = array();
            $sql = "SELECT c.idCurso,nome_curso FROM usuario_aluno as a join curso as c ON a.idCurso = c.idCurso 
            where idPessoa='$id';";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            return $array;
        }

        public function getNomeCursoByIdTcc($id)
        {        
            $array = array();
            $sql = "SELECT nome_curso FROM curso as c JOIN tcc as t ON c.idcurso = t.idcurso WHERE idTcc='$id'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            return $array;
        }    

}