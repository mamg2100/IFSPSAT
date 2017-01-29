<?php 
class pessoa extends model{
	public function __construct(){
		parent::__construct();
	}
	public function getUsers(){
		$dados = array();
		$sql = "SELECT * FROM pessoa ORDER BY nome";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
	}
	public function permission($id){
		$sql = "SELECT nivelacesso FROM pessoa WHERE idPessoa = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$array = $row['nivelacesso'];
		}
		return $array;
	}

    public function getUsersTeachers(){
    	$dados = array();
    	$sql = "SELECT * FROM pessoa WHERE identificacao='cg' ORDER BY nome ASC";
    	$sql = $this->db->query($sql);

    	if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
    }

     public function getUsersStudentsWithoutTcc(){
    	$dados = array();
    	//A query seguinte retorna somente os alunos que não tem TCC.
    	$sql ="SELECT * FROM pessoa JOIN usuario_aluno ON pessoa.idPessoa = usuario_aluno.idPessoa WHERE idTcc IS NULL ORDER BY nome ASC";
    	$sql = $this->db->query($sql);

    	if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
    }

    public function getUsersStudents(){
    	$dados = array();
    	$sql = "SELECT * FROM pessoa WHERE identificacao='a' ORDER BY nome ASC";    	
    	$sql = $this->db->query($sql);

    	if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
    }

    // metodo de acesso a tabela `Pessoa onde a Pessoa é membro_externo
    public function getMembros(){
    	$dados = array();
    	$sql = "SELECT * FROM pessoa WHERE identificacao=''";
    	$sql = $this->db->query($sql);

    	if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
    }

    // Método usado para selecionar membros da banca sendo interno (professores) e externo (membros externos) da tabela pessoa. Membros para compor a banca.
    public function getUsersMembros(){ 
    	$dados = array();
    	$sql = "SELECT * FROM pessoa WHERE identificacao='cg' OR identificacao=''";
    	$sql = $this->db->query($sql);

    	if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
    }


	public function isLogged(){
		if(!isset($_SESSION['logsat']) && empty($_SESSION['logsat'])){
			header("Location: ".BASE."login");
		}
	}
	public function login($login,$senha){
		$sql = "SELECT * FROM pessoa WHERE usuario = '$login' AND senha = '$senha'";
		$sql = $this->db->query($sql);
		$array = array(); // ESSA LINHA PODE SER DELETADA?
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			$_SESSION['logsat'] = $array['idPessoa'];
			header("Location: ".BASE);
		}else{
			return "Erro ao logar, usuario e/ou senha inválidos!";
		}
	}
	public function getNome($id){
		$sql = "SELECT nome FROM pessoa WHERE idPessoa = '$id'";
		$sql = $this->db->query($sql);
		$dados = array();
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$row = $sql['nome'];
		}
		return $row;
	}
	
	public function getNivel($id){
		$sql = "SELECT nivelacesso FROM pessoa WHERE idPessoa = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$nivel = $row['nivelacesso'];
		}
		return $nivel;
	}	

	public function getIdent($id){
		$sql = "SELECT identificacao FROM pessoa WHERE idPessoa = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$ident = $row['identificacao'];
		}
		return $ident;
	}

	public function getPessoaById($id){
		$sql = "SELECT * FROM pessoa WHERE idPessoa = '$id'";
		$sql = $this->db->query($sql);
		$array = array();
		if($sql->rowCount() > 0 ){
			$array = $sql->fetchAll();
		}
		return $array;
	}	
	

	public function addPessoa($nome = '',$dtnasc = '',$sexo = '',$endereco = '',$cep = '',$complemento = '',$bairro = '',$cidade = '',$estado = '',$pais = '',$email = '',$lattes = '',$telefone = '',$celular = '',$login = '',$senha = '',$nivelacesso = '',$identificacao = '',$instituicao = '',$funcao = '',$prontuario = '',$dataInicio = '',$dataLimite = '',$idCurso = ''){
             
            // insercao na tabela ´pessoa'
        	$sql = "INSERT INTO pessoa SET 
			nome = '$nome', 
			dtnasc = '$dtnasc', 
			sexo = '$sexo',
			endereco = '$endereco',
		    cep = '$cep',
			complemento = '$complemento',
			bairro = '$bairro',
			cidade = '$cidade',
			estado =  '$estado',
			pais = '$pais',
			email = '$email',
			lattes = '$lattes',
			telefone = '$telefone',
			celular = '$celular',
			usuario = '$login',
			senha = '$senha', 
			nivelacesso = '$nivelacesso',
			identificacao = '$identificacao',
			prontuario = '$prontuario';
			";
			
			$this->db->query($sql);
			$idPessoa = $this->db->lastInsertId();

			//Verifica se o novo usuário cadastrado é professor, aluno ou membro externo
		if($identificacao == 'a'){			
			// vamos ter que calcular o limite (jubilamento) em função da data da 1ª matrícula.
            // para efeito de teste usamos o ano abaixo, mas na realidade trata-se de data exata.
						
			$sql = "INSERT INTO usuario_aluno SET data_ingresso = '$dataInicio',data_limite= '$dataLimite',idPessoa = '$idPessoa', idCurso = '$idCurso'";
		
			$this->db->query($sql);

			if($this->db->lastInsertId()){
				return true;
			}else{
				return false;
			}
		} else {
			if($identificacao == 'cg'){
            
            $sql = "INSERT INTO usuario_professor SET lattes='$lattes',idPessoa = '$idPessoa'";
			$this->db->query($sql);

			$idProfessor = $this->db->lastInsertId();

			$sql = "INSERT INTO tcc_has_professor SET idTcc = NULL, idProfessor = '$idProfessor'";
			$this->db->query($sql);

			return true;

		}else {

            $sql = "INSERT INTO pessoa_membro_externo SET instituicao='$instituicao',funcao='$funcao',lattes='$lattes',idPessoa = '$idPessoa'";
            $this->db->query($sql);

			if($this->db->lastInsertId()){
				return true;
			}else{
				return false;
			}
		}
		}
	}

	public function excluir($id, $ident){	  	
	  	
	  	try {
	  	// Passo 1	
	  	/* 'Pessoa' é tabela pai e cada tabela filha (usuario_aluno,usuario_professor ou pessoa_membro_externo) 
	  	 possui chave estrangeira apontando para a correspondente PK da tabela Pessoa.
	  	 Primeiro devemos excluir da tabela filha e em seguida - dependendo do tipo de usuario excluímos
	  	 o correspondente na tabela Pessoa (tabela pai).
	  	 Antes é necessário fazer verificação do tipo de usuário.
        */
        if ($ident=="a"){
	  		// exclui na tabela usuario_aluno
		 	$sql="DELETE FROM usuario_aluno WHERE idPessoa='$id'";
		 	$this->db->query($sql);
		 }else {
			 if($ident=="cg"){
			 	// exclui na tabela usuario_professor
			 	$sql="DELETE FROM usuario_professor WHERE idPessoa='$id'";
			 	$this->db->query($sql);
			 }else{
			 	// exclui na tabela usuario_professor
			 	$sql="DELETE FROM pessoa_membro_externo WHERE idPessoa='$id'";
			 	$this->db->query($sql);
			 }
		}
		// Passo 2
        // Excluir a pessoa cujo idPessoa é o ID mostrado na tabela pessoa.
	  	$sql="DELETE FROM pessoa WHERE idPessoa='$id'";
   	  	$this->db->query($sql);

        return true;
		} catch (Exception $e) {
		return false;
    	}
	}

	public function editarPessoa($id,$nome,$dtnasc,$sexo,$endereco,$cep,$complemento,
            $bairro,$cidade,$estado,$pais,$email,$lattes,$telefone,$celular,$nivelacesso,$identificacao,
            $prontuario, $instituicao, $funcao, $dtingresso, $idCurso){

        //echo "Data Ingresso ".$dataIngresso." | Curso: ".$idCurso;
        //exit;

        $sql="UPDATE pessoa SET nome='$nome', dtnasc='$dtnasc', sexo='$sexo', endereco='$endereco', 
        cep='$cep',complemento='$complemento', bairro='$bairro', cidade='$cidade',estado='$estado', 
        pais='$pais',email='$email', lattes='$lattes',telefone='$telefone', celular='$celular', 
        nivelacesso='$nivelacesso',identificacao='$identificacao',prontuario='$prontuario'
        WHERE idPessoa='$id'";
        //echo $sql; exit;
        $this->db->query($sql);  

        //================================

        if($identificacao == 'a'){			
			// vamos ter que calcular o limite (jubilamento) em função da data da 1ª matrícula.
            // para efeito de teste usamos o ano abaixo, mas na realidade trata-se de data exata.
			
			//$anoLimite = '2017';			
			
			$sql = "UPDATE usuario_aluno SET data_ingresso = '$dtingresso',idCurso = '$idCurso' WHERE idPessoa = '$id'";
		    //echo $sql; exit;
			$this->db->query($sql);
			
		} else {
			if($identificacao == 'cg'){
            
            $sql = "UPDATE usuario_professor SET lattes='$lattes' WHERE idPessoa = '$id'";
			$this->db->query($sql);

			/*
			$idProfessor = $this->db->lastInsertId();

			$sql = "INSERT INTO tcc_has_professor SET idTcc = NULL, idProfessor = '$idProfessor'";
			$this->db->query($sql);


			if($this->db->lastInsertId()){
				return true;
			}else{
				return false;
			}
			*/

		}else {

            $sql = "UPDATE pessoa_membro_externo SET instituicao='$instituicao',funcao='$funcao',lattes='$lattes' WHERE idPessoa = '$id'";
            $this->db->query($sql);
		}
		}

        //================================
         
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
