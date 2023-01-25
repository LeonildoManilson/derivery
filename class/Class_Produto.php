<?php



class Class_Produto{
	
	protected $table = 'produto';
	private $nome;
	private $preco;
	private $descricao;
    private $foto;
	private $categoria;
	private $estado;
	

	public function setNome($nome){
		$this->nome = $nome;
	}


	public function getNome(){
		return $this->nome;
	}

	public function setEstado($estado){
		$this->estado = $estado;
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

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, preco, descricao, foto, categoria, estado) VALUES (:nome, :preco, :descricao, :foto, :categoria, :estado)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':preco', $this->preco);
		$stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
		$stmt->bindParam(':categoria', $this->categoria);
		$stmt->bindParam(':estado', $this->estado);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, preco = :preco, descricao = :descricao, foto = :foto, categoria = :categoria, estado = :estado  WHERE idProduto= :idProduto";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':foto', $this->foto);
		$stmt->bindParam(':categoria', $this->categoria);
		$stmt->bindParam(':estado', $this->estado);
		$stmt->bindParam(':idProduto', $id);
		return $stmt->execute();

    }

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }



	public function listarHamburguer(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Hamburguer' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function listarHamburguerE(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Hamburguer' AND estado = 'visivel'";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarPizza(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Pizza' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function listarPizzaE(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Pizza' AND estado = 'visivel'";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarBolo(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Bolo' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function listarBoloE(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Bolo' AND estado = 'visivel'";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarSoverte(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Soverte' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    public function listarSoverteE(){
		$sql  = "SELECT * FROM $this->table WHERE categoria = 'Soverte' AND estado = 'visivel'";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
    public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE idProduto= :idProduto";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idProduto', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }

	
    
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idProduto= :idProduto";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idProduto', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>