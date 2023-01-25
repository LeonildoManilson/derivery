<?php



class Class_Mensagem{
	
	protected $table = 'mensagem';
	private $nomeP;
	private $nomeU;
	private $mensagem;
    private $contacto;
    private $sessao;
    private $email;
	private $origem;

	public function setNomeP($nomeP){
		$this->nomeP = $nomeP;
	}

	public function setNomeU($nomeU){
		$this->nomeU = $nomeU;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setMensagem($mensagem){
		$this->mensagem = $mensagem;
	}

    public function setContacto($contacto){
		$this->contacto = $contacto;
    }
    
    public function setSessao($sessao){
		$this->sessao = $sessao;
    }
    
    public function setEmail($email){
		$this->email = $email;
	}

	public function setOrigem($origem){
		$this->origem = $origem;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nomeP, nomeU, mensagemAssunto, mensagemEmail, mensagemContacto, sessao, origem) VALUES (:nomeP, :nomeU, :mensagemAssunto, :mensagemEmail, :mensagemContacto, :sessao, :origem)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nomeP', $this->nomeP);
		$stmt->bindParam(':nomeU', $this->nomeU);
        $stmt->bindParam(':mensagemAssunto', $this->mensagem);
        $stmt->bindParam(':mensagemEmail', $this->email);
        $stmt->bindParam(':mensagemContacto', $this->contacto);
		$stmt->bindParam(':sessao', $this->sessao);
		$stmt->bindParam(':origem', $this->origem);
		return $stmt->execute(); 

	}

	

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
   
    
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idMensagem = :idMensagem";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idMensagem', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>