<?php



class Class_Foto{
	
	protected $table = 'foto';
	private $nome;
	private $categoria;
    private $foto;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

    public function setFoto($foto){
		$this->foto = $foto;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, foto, fotoCategoria) VALUES (:nome, :foto, :fotoCategoria)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':fotoCategoria', $this->categoria);
		return $stmt->execute(); 

	}

	

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarF(){
		$sql  = "SELECT * FROM $this->table ORDER BY idFoto LIMIT 18";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
    public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE idFoto = :idFoto";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idFoto', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }

	public function categoria($categoria){
		$sql  = "SELECT * FROM $this->table WHERE fotoCategoria = :fotoCategoria";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':fotoCategoria', $categoria, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
    }
    
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idFoto = :idFoto";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idFoto', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>