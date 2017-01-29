<?php 
class aluno extends model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getDataIngressoAluno($id){

			$array = array();
            $sql = "SELECT data_ingresso FROM usuario_aluno WHERE idPessoa='$id'"; 
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            return $array;
    }

}
