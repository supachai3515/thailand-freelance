<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Owner_model extends CI_Model{
	
    	function __construct(){
	       	 parent::__construct();
		$this->db->query("SET NAMES 'utf8'");
		$this->load->model('utilities');
	}

	function getOwnerAllLimit($limit=6,$offset=0){
		
		
		$this->db->select('*');
		$this->db->from('owner');
		$this->db->where('owner_logo!=""');
		$this->db->order_by("owner_id", "random");
		$this->db->limit($limit,$offset);
		$query  = $this->db->get();
		$result = $query->result_array();

		return $result;		
	}	
	
	function add($table="owner",$data=array()){
		if (is_array($data)){
			try {
				$sql=$this->utilities->genSQLInsert($table,$data);
				$stmt=$this->db->conn_id->prepare($sql);
				$stmt->execute();
				//$stmt->debugDumpParams();
				return $this->db->insert_id()?$this->db->insert_id() : false;
				
			} catch (PDOException $e) {
      			return false;
			}		
		}else{
			return false;
		}		
	}

	function insertArray($tableName="owner", $data) {
		$keys = array_keys($data);
  		$values = array_values($data);

		$numColumns = count($keys);
		$columnListString = implode(",", $keys);

		$placeHolders = array();

		$params  = str_repeat("?,", $numColumns);
		$placeHolders=rtrim($params, ",");

		$sql = "insert into $tableName ($columnListString) values ($placeHolders)";
		$stmt = $this->db->conn_id->prepare($sql);
		$j = 1;
		foreach ($data as $field => $value) {
			$stmt->bindValue($j, $value, PDO::PARAM_STR);
			$j++;
		}
		$stmt->execute();
		return $this->db->insert_id()?$this->db->insert_id() : false;
	}


}