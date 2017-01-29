<?php 
class tcc extends model{

    public function addTcc($titulo,$orientador,$coorientador,$status,$observacao,$idarea,$idcurso,$idOrientador,$idCoorientador){
    //Verificar se já existe TCC para o aluno...
    //$sql = "SELECT * FROM tcc WHERE idTcc ="
    $sql = "INSERT INTO tcc SET 
		        titulo                    ='$titulo',
		        orientador 	          	  ='$orientador',
            coorientador              ='$coorientador',
            aluno1              		  ='$aluno1',
            aluno2	            		  ='$aluno2',
            status  	                ='$status',
            dtQualif                  ='$dtQualif',
            dtDefesa   		            ='$dtDefesa',
            dtMaxDefesa               ='$dtMaxDefesa',
            observacao                ='$observacao',
            idarea                    ='$idarea',
            idcurso                   ='$idcurso'";        
        /*
          Método addTcc() segue algumas etapas:
          1 - Seleciona idProfessor da tabela 'usuário_professor' 
          2 - Atualiza na linha 39 a tabela tcc_has_professor com esse idProfessor
          3 - Atualiza na linha 44 o idTcc na tabela tcc onde o idPessoa for igual ao
          idAluno1 
          4 - Atualiza, caso houver um segundo aluno no TCC, a tabela usuario_aluno com o 
          idAluno2 
        */                  
    		$this->db->query($sql);	
        $idTcc = $this->db->lastInsertId();
        
        /*$sql = "SELECT idAluno FROM usuario_aluno WHERE idPessoa = '$idAluno1'";
        $sql = $this->db->query($sql);
        $a = '';
        if($sql->rowCount() > 0){
          $row = $sql->fetch();
          $a = $row['idAluno'];
        }*/
        /*$sql = "SELECT ua.idAluno, t.idTcc FROM usuario_aluno AS ua JOIN tcc AS t ON ua.idTcc = t.idTcc WHERE ua.idAluno = '$a'";       
        $sql = $this->db->query($sql);*/
        
        if($sql->rowCount() == 0){
        //Verifica se aluno já possui TCC
        $sql = "SELECT idProfessor FROM usuario_professor WHERE idPessoa = '$idOrientador'";
        $row = '';
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
          $row = $sql->fetch();
        }
        $idProfessor = $row['idProfessor'];

        //Pega o idProfessor do Coorientador 
        $sql = "SELECT idprofessor FROM usuario_professor WHERE idPessoa = '$idCoorientador'";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
          $row = $sql->fetch();
          $idCoorientador = $row['idprofessor'];
        }
 
        $sql = "SELECT idTcc FROM tcc_has_professor WHERE idprofessor = '$idProfessor'";
        
        $sql = $this->db->query($sql);
        /*
        1 - Verifica se houve algum retorno da query acima 
        2 - se sim verifica se id_exists é NULL ou se está vazio, se não estiver NULL ou VAZIO 
        então insere senão atualiza
        */
        if($sql->rowCount() > 0){ 
          $row = $sql->fetch();
          $id_exists = $row['idTcc'];
            if(!is_null($id_exists) || !empty($id_exists)){         
              $sql = "INSERT INTO tcc_has_professor SET idProfessor = '$idProfessor', idTcc = '$idTcc'";
              $this->db->query($sql);
              if(isset($idCoorientador) && !empty($idCoorientador)){
                $sql = "INSERT INTO tcc_has_professor SET idProfessor = '$idCoorientador', idTcc = '$idTcc'";
                $this->db->query($sql);
              }
            }else{
              $sql = "UPDATE tcc_has_professor SET idTcc = '$idTcc' WHERE idProfessor = '$idProfessor'";
              $this->db->query($sql);
              $sql = "UPDATE tcc_has_professor SET idTcc = '$idTcc' WHERE idProfessor = '$idCoorientador'";
              $this->db->query($sql);
          }
      }
        //Atualizando a tabela de 'usuario_aluno' quando um TCC é definido pra ele.
        /*$sql = "UPDATE usuario_aluno SET idTcc = '$idTcc' WHERE idPessoa = '$idAluno1'";
        $this->db->query($sql);

        if(isset($aluno2) && !empty($aluno2)){
          $sql = "UPDATE usuario_aluno SET idTcc = '$idTcc' WHERE idPessoa = '$idAluno2'";
          $this->db->query($sql);
       } 
         return true;
        }else{
         return false;
        }*/
	}}
        public function getTcc(){
                $sql = "SELECT * FROM tcc";
                $sql = $this->db->query($sql);
                $array = array();
                if($sql->rowCount() > 0){
                  $array = $sql->fetchAll();
                }
                return $array;
        }
        
        public function excluir($id){

              $sql= "SELECT a.idAluno FROM usuario_aluno as a JOIN tcc as t on a.idTcc=t.idTcc where t.idTcc='$id'";
            

              $sql = $this->db->query($sql);

              if ($sql->rowCount()>0){
                $row = $sql->fetch();
              }

              $idAluno = $row['idAluno'];

              $sql="UPDATE usuario_aluno SET idTcc = null WHERE idTcc='$id'";
              $this->db->query($sql);
              
              $sql="UPDATE tcc_has_professor SET idTcc = null WHERE idTcc = '$id'";
              $this->db->query($sql);

              $sql ="DELETE FROM reuniao WHERE fk_idTcc = '$id'";
              $this->db->query($sql);

              $sql = "DELETE FROM banca WHERE idtcc = '$id'";
              $this->db->query($sql);
          
              $sql="DELETE FROM tcc WHERE idTcc='$id'";
              $this->db->query($sql);     
                                          
        }        

      /*
       public function editarTcc($id,$orientador,$coorientador,$aluno1,$aluno2,$status,
              $dtQualif="",$dtdefesa="",$dtMaxDefesa,$nota,$observacao,$data_anexo_um,
              $data_anexo_dois,$data_anexo_tres,$data_anexo_quatro,$data_anexo_cinco,
              $data_anexo_seis,$data_anexo_sete,$data_anexo_oito, $data_anexo_nove){
      */

      public function editarTcc($id,$titulo,$status,$observacao,$sitQualif,$sitDefesa,$dtMinDefesa,$dtMaxDefesa,$data_formal_orientacao,$data_proposta_tcc,$data_nomeacao_banca_qualif,$data_ata_banca_qualif,$dt_nomeacao_banca_defesa,$dt_ata_banca_defesa,$data_entrega_recibo_biblioteca,$nota){      

        $sql="UPDATE tcc SET 
              titulo='$titulo',
              status='$status',
              observacao='$observacao',
              sitQualif='$sitQualif',
              sitDefesa = '$sitDefesa',                            
              dtMinDefesa='$dtMinDefesa',
              dtMaxDefesa='$dtMaxDefesa',                            
              data_formal_orientacao='$data_formal_orientacao',
              data_prop_tcc='$data_proposta_tcc',
              data_nomeacao_banca_qualif='$data_nomeacao_banca_qualif',
              data_ata_banca_qualif='$data_ata_banca_qualif',
              data_nomeacao_banca_defesa = '$dt_nomeacao_banca_defesa',
              data_ata_banca_defesa='$dt_ata_banca_defesa',
              data_entrega_recibo_biblioteca='$data_entrega_recibo_biblioteca',
              nota='$nota'
              WHERE idTcc='$id'";
              $this->db->query($sql);
        }        
        public function vincular($idTcc,$aluno1,$aluno2,$nomeAluno1,$nomeAluno2,$dtMaxDefesa){
          $sql = "UPDATE tcc SET aluno1 = '$nomeAluno1', aluno2 = '$nomeAluno2',status='1',data_formal_orientacao = NOW(), dtMaxDefesa = '$dtMaxDefesa' WHERE idTcc = '$idTcc'";

          $sql = $this->db->query($sql);


          $sql = "UPDATE usuario_aluno SET idTcc = $idTcc WHERE idPessoa = '$aluno1'";
          $sql = $this->db->query($sql);

          if(isset($aluno2)){
            $sql = "UPDATE usuario_aluno SET idTcc = $idTcc WHERE idPessoa = '$aluno2'";
            $sql = $this->db->query($sql);
          }
        }
        public function getTccById($id){
            $sql = "SELECT * FROM tcc WHERE idTcc = '$id'";
            $sql = $this->db->query($sql);
            $array = array();
            if($sql->rowCount() > 0 ){
                $array = $sql->fetchAll();
            }
            return $array;
        }
        public function getTccByName($id){
          $sql = "SELECT titulo FROM tcc WHERE idTcc = '$id'";
          $sql = $this->db->query($sql);

          if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $row = $sql['titulo'];
          }
          return $row;
        }
        public function getTccFromLoggedUser($id){
            $array = array();
            $sql = "SELECT * FROM tcc JOIN usuario_aluno ON usuario_aluno.idTcc = tcc.idTcc WHERE idPessoa = '$id'";
          
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }
            return $array;
        }
        public function getTccFromLoggedAluno($idPessoa){
          $array = array();
          $sql = "SELECT * FROM tcc as t join usuario_aluno as a ON t.idTcc = a.idTcc WHERE idPessoa = '$idPessoa'";        
          $sql = $this->db->query($sql);
          if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
          }
          return $array;
        }
        public function getTccFromIdTcc($id){
          $array = array();
          $sql = "SELECT * FROM tcc WHERE idTcc = '$id'";
          $sql = $this->db->query($sql);
          if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
          }
          return $array;
        }
        public function getTccFromLoggedProfessor($idPessoa){
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
            $array = $sql->fetchAll();
          }
          return $array;
        }

        /*
        public function getIdTccFromLoggedUser($id){
            $array = array();
            $sql = "SELECT tcc.idTcc FROM tcc JOIN usuario_aluno ON usuario_aluno.idTcc = tcc.idTcc WHERE idPessoa = '$id'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $array = $row['idTcc'];
            }
            return $array;
        }
        */
        public function getIdTccFromLoggedUser($id){
            $array = array();
            $sql = "SELECT tcc.idTcc FROM tcc JOIN usuario_aluno ON usuario_aluno.idTcc = tcc.idTcc WHERE idPessoa = '$id'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $array = $row['idTcc'];
            }
            return $array;
        }

         public function getIdTccFromLoggedAluno($id){
            $array = array();
            $sql = "SELECT tcc.idTcc FROM tcc JOIN usuario_aluno ON usuario_aluno.idTcc = tcc.idTcc WHERE idPessoa = '$id'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $array = $row['idTcc'];
            }
            return $array;
        }
         public function getIdTccFromLoggedProfessor($id){
          
            $array = array();
            $sql = "SELECT * FROM tcc WHERE idTcc = $id";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $array = $row['idTcc'];
            }
            return $array;
        }
}