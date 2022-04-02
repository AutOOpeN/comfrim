<?php
class Table {
   private $pdo; 
   private $table;
   private $key = 'id';
   private $columns = array();

   function __construct($pdo, $table, $key='id') {   
		$this->pdo = $pdo; 
		$this->table = $table;
		$this->key = $key;
		$this->setColumnName();
   }

   public function getPdo(){return $this->pdo;}   
   public function getTable(){ return $this->table;}
   public function getColumns(){return $this->columns;}
   public function getKey(){return $this->key;}
   
   private function fetchMetadata(){
        $sql = "select * from " . $this->table . " limit 1";
        $query = $this->pdo->query($sql);
        $columnCount = $query->columnCount();
        $meta = array();
        for($i=0; $i<$columnCount; $i++){
	     $col = $query->getColumnMeta($i);
            $meta[] = $col['name'];
        }
        return $meta;
    }

    public function setColumnName(){
        $meta = $this->fetchMetadata();
        foreach($meta as $m){
            $this->columns[$m] = null;
        }
        //var_dump($this->columns);
    }
}
