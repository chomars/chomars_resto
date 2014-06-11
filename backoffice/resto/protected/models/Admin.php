<?php
class Admin extends CActiveRecord{
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
		return 'users';
	}
	function getAdmin($params=array()){
		 
		$sql = "select * from ".$this->tableName();
                $sql .= ' '.$params['join'].' ';
                $sql .=" where 1=1 ";
		$sql .=' '.$params['conditions'].' '; 		
		$sql .= "order by user_id desc";
                
		($params['method'])?$data = $this->connection->createCommand($sql)->queryRow():$data = $this->connection->createCommand($sql)->queryAll();
		
		return $data;
	}

	function getAdminDetail($params=array()){
		 
		$sql = "select * from detail_Admin  where 1=1 ";
		$sql .=' '.$params['conditions'].' '; 		
		
		$data = $this->connection->createCommand($sql)->queryAll();
		
		return $data;
	}
        function delete($id){
            $data = $this->connection->createCommand("delete from users where user_id='$id'")->Execute();
        }
	function save($data,$id=''){
		$DataFilter = $this->dataFilter($data);	
		if($id==''){
			$ins = $this->connection->createCommand()->insert($this->tableName(),$DataFilter);
		}else{
                    $uid = array('user_id'=>$uid);
                    $username = $data['username'];
                    $password = $data['password'];
                    $level = $data['level'];
                    $ins = $this->connection->createCommand("update  users set username='$username' ,level='$level'
                                                                password='$password' where user_id='$id'")->Execute();
		}
		return $this->connection->getLastInsertId();	
	}
	function saveDetail($data,$id=array()){		
		$ins = $this->connection->createCommand()->insert('detail_Admin',$data);	
		
	}
	function savePembayaran($data,$id=array()){		
		$ins = $this->connection->createCommand()->insert('pembayaran',$data);	
		
	}
function getPembayaran($id){
		$sql = "select bayar from pembayaran where id_Admin='$id'";
		$data = $this->connection->createCommand($sql)->queryScalar();
		return $data;
	}
	function updateBarang($data){
		$kode_barang = $data['kode_barang'];
		$sql = "select stock from barang where kode_barang='$kode_barang'";				
		$CurrentStock = $this->connection->createCommand($sql)->queryScalar();
		$stock = $CurrentStock -  $data['qty'];
		$dataUpdated= array('stock'=>$stock);		
		$upd = $this->connection->createCommand()->update('barang',$dataUpdated,"kode_barang='$kode_barang'");
	}
	

	function dataFilter($data){
		$column = $this->connection->createCommand("SHOW COLUMNS FROM {$this->tableName()}")->query();
		
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