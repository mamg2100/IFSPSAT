<?php 
class area extends model
{
    public function getArea(){
		$sql = "SELECT * FROM area";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function addArea($descricao)
	{
		$sql = "INSERT INTO area SET descricao = '$descricao'";
		//echo $sql;exit;
		$this->db->query($sql);
		
		if($this->db->lastInsertId()){
			return true;
		}else{
			return false;
		}
	}

	public function excluir($id){
	  	$sql="DELETE FROM area WHERE idArea='$id'";
	  	$this->db->query($sql);
	  	  	  	
	}

	public function editarArea($descricao,$idarea){
        $sql="UPDATE area SET descricao='$descricao' WHERE idArea='$idarea'";
        $this->db->query($sql);
	}

	public function getAreaById($id){
		$sql = "SELECT * FROM area WHERE idArea = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getDescricaoAreaByIdTcc($id)
        {        
            $array = array();
            $sql = "SELECT descricao FROM area as a JOIN tcc as t ON a.idarea = t.idarea WHERE idTcc='$id'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            return $array;
        }    

}