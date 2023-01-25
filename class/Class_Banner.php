<?php



class Class_Banner{
	
	protected $table = 'banner';
	private $link;
    private $foto;
	private $nome;
	private $posicao;
	

	public function setLink($link){
		$this->link = $link;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getLink(){
		return $this->link;
	}

	

    public function setFoto($foto){
		$this->foto = $foto;
	}

	public function setPosicao($posicao){
		$this->posicao = $posicao;
	}

	

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, foto, link, posicao) VALUES (:nome, :foto, :link, :posicao)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':foto', $this->foto);
		$stmt->bindParam(':link', $this->link);
		$stmt->bindParam(':posicao', $this->posicao);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, foto = :foto, link = :link, posicao = :posicao  WHERE idBanner= :idBanner";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':foto', $this->foto);
		$stmt->bindParam(':link', $this->link);
		$stmt->bindParam(':posicao', $this->posicao);
		$stmt->bindParam(':idBanner', $id);
		return $stmt->execute();

    }

    public function listar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarTop(){
		$sql  = "SELECT * FROM $this->table WHERE posicao = 'top' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarMeio(){
		$sql  = "SELECT * FROM $this->table WHERE posicao = 'meio' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function listarRodape(){
		$sql  = "SELECT * FROM $this->table WHERE posicao = 'rodape' ";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

    
    public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE idBanner= :idBanner";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idBanner', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
    }

	
    
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idBanner= :idBanner";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idBanner', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>