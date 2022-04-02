<?php
class AppGW{
    
	private $table;
	private $sql = "";
	private $pdo;

	public function __construct($table){
		$this->table = $table;
		$this->pdo = $table->getPdo();
	}
	public function delete(){
		$this->sql = "delete from " . $this->table->getTable();
		return $this;		
	}
	public function exec(){
		if(strpbrk($this->sql, "?")) {
			$stm = $this->pdo->prepare($this->sql);
			$stm->execute($this->params);
			$this->params = null;//reset parameters
			return $stm;
		}
		else{
			$result = $this->pdo->query($this->sql);
			return $result;
		}
	}
	public function where($field){
		$this->sql .= " where ";
		$this->sql .= $field;
		return $this;
	}
	public function order($field){
		$this->sql .= " ORDER BY  ";
		$this->sql .= $field;
		return $this;
	}
	public function equal($value){
		$this->sql .= "=?";
		$this->params[] = $value;
		return $this;
	}
	 
	public function select($fields=null){
		$this->sql = "select ";
		if($fields==null) 
			 $this->sql .= " * ";
		else{
			for($i=0; $i<sizeof($fields); $i++){
				if(($i < sizeof($fields)-1) || (sizeof($fields) ==1)){
					$this->sql .= $fields[$i];
					if(sizeof($fields)!=1) $this->sql .= ", ";
				}
				else $this->sql .= $fields[$i];
			}
		}
		$this->sql .= " from " . $this->table->getTable();
		return $this;
	}
	public function insert($row){
		$collumns = $this->table->getColumns();
		$this->sql = "insert into ". $this->table->getTable();
		$this->sql .= " values(";
		for($i=0; $i< sizeof($collumns);$i++){
			$this->sql .= "?";
			if($i<sizeof($collumns)-1) $this->sql .= ",";
			else $this->sql .= ")";
		}
		$stm = $this->pdo->prepare($this->sql);
		foreach($collumns as $key=>$value){
			$this->params[] = $row[$key];	
		}
		return $this;
	}
	public function update($array){
		$this->sql = "update " . $this->table->getTable() . " set ";
		foreach($array as $key=>$value){
			$this->sql .= $key . "=?";
			$this->params[] = $value;
		}
		return $this;
	}

}