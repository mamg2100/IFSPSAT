<?php 
class anexos extends model{

  public function getAnexos(){

     $array = array();

     $sql="SELECT * FROM arquivos";
     $sql= $this->db->query($sql);

     if($sql->rowCount()>0){
     	$array=$sql->fetchAll();
     }
     return $array;
  }
}
?>