<?php



class Class_Depoimento{
	
	protected $table = 'depoimento';
	private $nome;
	private $descricao;
    private $foto;
	

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

    public function setFoto($foto){
		$this->foto = $foto;
	}

	
	public function insert(){

		$sql  = "INSERT INTO $this->table (titular, descricao, foto) VALUES (:titular, :descricao, :foto)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':titular', $this->nome);
		$stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET titular = :titular, descricao = :descricao, foto = :foto  WHERE id_depoimento = :id_depoimento";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':titular', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
		$stmt->bindParam(':id_depoimento', $id);
		return $stmt->execute();

    }

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
    public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE id_depoimento = :id_depoimento";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':id_depoimento', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }
    
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE id_depoimento = :id_depoimento";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':id_depoimento', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>