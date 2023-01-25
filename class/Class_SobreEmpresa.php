<?php



class Class_SobreEmpresa{
	
	protected $table = 'empresa';
	private $nome;
	private $descricao;
    private $contacto1;
    private $contacto2;
    private $email;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

    public function setContacto1($contacto1){
		$this->contacto1 = $contacto1;
    }
    
    public function setContacto2($contacto2){
		$this->contacto2 = $contacto2;
    }
    
    public function setEmail($email){
		$this->email = $email;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (empresaNome, empresaDescricao, empresaContacto1, empresaContacto2, empresaEmail) VALUES (:empresaNome, :empresaDescricao, :empresaContacto1, :empresaContacto2, :empresaEmail)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':empresaNome', $this->nome);
		$stmt->bindParam(':empresaDescricao', $this->descricao);
        $stmt->bindParam(':empresaContacto1', $this->contacto1);
        $stmt->bindParam(':empresaContacto2', $this->contacto2);
        $stmt->bindParam(':empresaEmail', $this->email);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET empresaNome = :empresaNome, empresaDescricao = :empresaDescricao, empresaContacto1 = :empresaContacto1, empresaContacto2 = :empresaContacto2, empresaEmail = :empresaEmail  WHERE idEmpresa = :idEmpresa";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':empresaNome', $this->nome);
        $stmt->bindParam(':empresaDescricao', $this->descricao);
        $stmt->bindParam(':empresaContacto1', $this->contacto1);
        $stmt->bindParam(':empresaContacto2', $this->contacto2);
        $stmt->bindParam(':empresaEmail', $this->email);
		$stmt->bindParam(':idEmpresa', $id);
		return $stmt->execute();

    }

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
    public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE idEmpresa = :idEmpresa";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idEmpresa', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }
    
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idEmpresa = :idEmpresa";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idEmpresa', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>