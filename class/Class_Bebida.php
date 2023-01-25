<?php



class Class_Bebida{
	
	protected $table = 'bebidas';
	private $nome;
	private $preco;
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

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, preco, descricao, foto) VALUES (:nome, :preco, :descricao, :foto)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':preco', $this->preco);
		$stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, preco = :preco, descricao = :descricao, foto = :foto  WHERE idBebidas = :idBebidas";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
		$stmt->bindParam(':idBebidas', $id);
		return $stmt->execute();

    }

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
    public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE idBebidas = :idBebidas";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idBebidas', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }

	
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idBebidas = :idBebidas";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idBebidas', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>