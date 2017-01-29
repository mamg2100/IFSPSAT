<?php 
class reuniao extends model
{
	    public function getReunioes(){
		$sql = "SELECT * FROM reuniao ORDER BY data desc";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getReuniaoById($id){
		$sql = "SELECT * FROM reuniao WHERE idReuniao = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getReuniaoTcc($id){
		$sql = "SELECT titulo FROM tcc as t join reuniao as r ON t.idTcc = r.fk_idTcc WHERE idReuniao='$id'";
		$sql = $this->db->query($sql);
        $array = array();
        if($sql->rowCount() > 0){
        	$array = $sql->fetch();
        }
        return $array['titulo'];
	}

	public function addReuniao($dtReuniao,$assunto,$metas,$tcc)
	{
		$sql = "INSERT INTO reuniao SET data = '$dtReuniao', assunto='$assunto', metas='$metas', fk_idTcc='$tcc'";
		//echo $sql; exit;
		$this->db->query($sql);
		
		if($this->db->lastInsertId()){
			return true;
		}else{
			return false;
		}
	}

	public function excluir($id){
	  	$sql="DELETE FROM reuniao WHERE idReuniao='$id'";
	  	$this->db->query($sql);	  	  	  	
	}

	public function editarReuniao($id,$dtReuniao,$assunto,$metas,$tcc){

        $sql="UPDATE reuniao SET data='$dtReuniao', assunto='$assunto', metas='$metas', fk_idTcc='$tcc' WHERE idReuniao='$id'";
        //echo $sql;exit;
        $this->db->query($sql);
        
	}
	public function getReunioesFromLoggedUser($idPessoa){
		
		$t = new tcc();
		$sql = "SELECT nivelacesso,identificacao FROM pessoa WHERE idPessoa = '$idPessoa'";
		$sql=$this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		if($array['identificacao'] == 'a' && $array['nivelacesso'] == 'usuario'){
			$array = array();
            $sql = "SELECT * FROM tcc JOIN usuario_aluno ON usuario_aluno.idTcc = tcc.idTcc WHERE idPessoa = '$idPessoa'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            $idTcc = $array['idTcc'];

			$array = array();
			$sql = "SELECT * FROM reuniao WHERE fk_idTcc = $idTcc";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
			return $array;

		}elseif($array['identificacao'] == 'cg' && $array['nivelacesso'] == 'usuario'){
		  
		  $idProfessor = '';
          $sql = "SELECT idprofessor FROM usuario_professor WHERE idPessoa = '$idPessoa'";
          $sql = $this->db->query($sql);
          if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $idProfessor = $row['idprofessor'];
          }
          $array = array();
          $sql = "SELECT * FROM tcc_has_professor as tp JOIN tcc as t ON tp.idTcc = t.idTcc WHERE idprofessor = '$idProfessor'";
          $sql = $this->db->query($sql);
          if($sql->rowCount() > 0){
            $arraytwo = $sql->fetchAll();
          }
            foreach($arraytwo as $tccs){
           	$idTccs[] = $tccs['idTcc'];
           	$i = implode(',', $idTccs); 
           	}
         	$sql = "SELECT * FROM reuniao WHERE fk_idTcc IN($i)";
           	$sql = $this->db->query($sql);
          	if($sql->rowCount() > 0){
          		$array = $sql->fetchAll();
          	}
          }
          return $array;
		}
		public function getReunioesFromIdTcc($id){
			$array = array();
			$sql = "SELECT * FROM reuniao WHERE fk_idTcc = '$id'";
			$sql=$this->db->query($sql);
			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}
			return $array;
		}
	}
	