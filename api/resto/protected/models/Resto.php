<?php
class Resto extends CActiveRecord{
	public $connection;
	function __construct(){

		$this->connection = Yii::app()->db;
		
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'resto';
	}
	function getResto($params=array()){
			
		$sql = "select * from resto where 1=1 ";
		$sql .=' '.$params['conditions'].' '; 
		$sql .=" order by resto_id desc ";
		$data = $this->connection->createCommand($sql)->queryAll();
		return $data;
	}
	function getRowResto($id){
		$sql = "select * from resto where id='$id'";
		$data = $this->connection->createCommand($sql)->queryRow();
		return $data;
	}

	
	function save($data,$id=array()){
		$DataFilter = $this->dataFilter($data);	
		if($id==''){
			$ins = $this->connection->createCommand()->insert($this->tableName(),$DataFilter);
		}else{
			$ins = $this->connection->createCommand()->update($this->tableName(),$DataFilter,$id);
		}
			
	}
	

	function dataFilter($data){
		$column = $this->connection->createCommand("SHOW COLUMNS FROM resto")->query();
		
		$Tabfields = array();
		$DataFilter = array();
		
		foreach($column as $Tabfield){
			$Tabfields[] = $Tabfield['Field'];
		}
		
		foreach($data as $field => $val){
			if(in_array($field ,$Tabfields)){
				$DataFilter[$field] = $val;
			}
		}
		
		return $DataFilter;
	}

}