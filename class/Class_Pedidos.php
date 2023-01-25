<?php



class Class_Pedidos{
	
	protected $table = 'pedidos';
	


	public function insert($nome,$preco,$qtd,$precototal,$cliente){

		$sql  = "INSERT INTO $this->table (produto, preco, qtd, precototal, cliente) VALUES (:produto, :preco, :qtd, :precototal, :cliente)";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':preco', $preco);
		$stmt->bindParam(':qtd', $qtd);
        $stmt->bindParam(':precototal', $precototal);
        $stmt->bindParam(':cliente', $cliente);
		return $stmt->execute(); 

	}

	

    public function listar(){
		$sql  = "SELECT DISTINCT * FROM $this->table WHERE qtd >=6 GROUP BY produto LIMIT 5";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

     public function listarP(){
		$sql  = "SELECT DISTINCT * FROM $this->table GROUP BY produto DESC";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }


    public function listarQtd(){
		$sql  = "SELECT SUM(precototal) FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();

    }


    public function listarQtdP(){
		$sql  = "SELECT idPedidos FROM $this->table";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return count($result);

    }
    
   

	
    public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE idBebidas = :idBebidas";
		$stmt = Class_Conexao::prepare($sql);
		$stmt->bindParam(':idBebidas', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

}
    
    ?>