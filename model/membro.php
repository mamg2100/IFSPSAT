<?php 
class membro extends model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getInstFuncaoMembro($id){

			$array = array();
            $sql = "SELECT instituicao, funcao FROM pessoa_membro_externo WHERE idPessoa='$id'"; 
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }
            return $array;
    }

}
