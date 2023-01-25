<?php



class Class_Cliente{
	
	protected $table = 'cliente';
	private $nome;
	private $email;
    private $senha;
	private $telefone;
	

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

    public function setSenha($senha){
		$this->senha = $senha;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':telefone', $this->telefone);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha, telefone = :telefone WHERE idCliente = :idCliente";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':idCliente', $id);
		return $stmt->execute();

	}

    public function login($senha,$email){

		$sql  = "SELECT * FROM $this->table WHERE email = :email LIMIT 1";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();


		if($stmt->rowCount() != 0){
            $row_usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($row_usuario);
            if(password_verify($senha, $row_usuario['senha'])){
				session_start();
                $_SESSION["clienteid"] = $row_usuario["idCliente"];
				$_SESSION["clienten"] = $row_usuario["nome"];
				
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/'>
				<script type=\"text/javascript\">
					alert(\"Logado com sucesso.\");
				</script>
				";
            }else{
                echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/'>
				<script type=\"text/javascript\">
					alert(\"Email ou senha erradas.\");
				</script>
				";
            }
        }else{
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/index.php'>
				<script type=\"text/javascript\">
					alert(\"Email ou senha erradas.\");
				</script>
				";
        }
		return $stmt->fetch();

	}

	public function listar(){
		$sql  = "SELECT * FROM $this->table LIMIT 3";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function listarQtd(){
		$sql  = "SELECT idCliente FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return count($result);

    }

	

	/*public function verificarDica($email, $dica){
		
		$sql  = "SELECT * FROM $this->table WHERE email = :email LIMIT 1";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();


		if($stmt->rowCount() != 0){
            $row_usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($row_usuario);
            if(password_verify($dica, $row_usuario['dica'])){
				session_start();
                $_SESSION["usuario"] = array($row_usuario["nome"], $row_usuario["idCliente"]);
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/fotografo/admin/inicio.php'>
				<script type=\"text/javascript\">
					alert(\"Logado com sucesso. Faça alteração da senha\");
				</script>
				";
            }else{
                echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/fotografo/admin/Recuperar_Senha.php'>
				<script type=\"text/javascript\">
					alert(\"Essa dica não existe.\");
				</script>
				";
            }
        }else{
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/fotografo/admin/Recuperar_Senha.php'>
				<script type=\"text/javascript\">
					alert(\"Esse email não existe.\");
				</script>
				";
        }
		return $stmt->fetch();


	}*/

	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idCliente = :idCliente";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idCliente', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}