<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Freelance_model extends CI_Model{
	
    	function __construct(){
	       	 parent::__construct();
		$this->db->query("SET NAMES 'utf8'");
		$this->load->model('utilities');
	}

	function getFreelanceByID($freelance_id){
		$sql="SELECT  *  FROM freelance WHERE  freelance_id=:freelance_id";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':freelance_id',$freelance_id,PDO::PARAM_INT);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}	
    
	function getFreelanceAllLimit($limit=20,$offset=0){	
		$this->db->select('*');
		$this->db->from('freelance');
		$this->db->where('freelance_flogo!=""');
		$this->db->order_by("freelance_id", "random");
		$this->db->limit($limit,$offset);
		$query  = $this->db->get();
		$result = $query->result_array();
		return $result;	
	}
	
	/*function getFreelanceAllLimit($limit=20,$offset=0){
		$sql="SELECT  *  FROM freelance LIMIT ".$offset.",".$limit;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}*/

	function getFreelanceLimit($limit=20,$offset=0){
		$sql="SELECT * FROM freelance ORDER BY freelance_id DESC LIMIT ".$offset.",".$limit;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}		
	}

	function getFreelanceCount(){
		$sql="SELECT count(*) FROM freelance";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			return $rowCount;
		} catch (PDOException $e) {
			return 0;
		}		
	}	

	function getFreelanceCategoryList(){
		$sql="SELECT freelance_category_list,freelance_category_listname FROM freelance_category_list";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$resp = array();
			while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
				$resp[$result["freelance_category_list"]]=$result["freelance_category_listname"];
			}
			return $resp;
		} catch (PDOException $e) {
			return false;
		}
	}

	function searchFreelanceLimit($condition=array(),$limit=20,$offset=0){
		if (is_array($condition)){
			$fields = array_keys($condition);
			$values = array_values($condition);
			$escVals = array();
			foreach($condition as $field => $val) {
				if (($field=="freelance_categoryid") && (!empty($val))){
					if (!empty($val)){
						$val = "'" . addslashes($val) . "'";
						$arWhere[] = "$field = $val";
					}
				}else{
					if (!empty($val)){
						$val = "%" . addslashes($val) . "%";
						$arWhere[] = "$field like '$val'";
					}
				}

			}
		}		
		$sql="select  * from freelance ".((!empty($arWhere))?"where ".join(' AND ', $arWhere):"")." limit ".$offset.",".$limit;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}		
	}	

	function searchFreelanceCount($condition=array()){
		if (is_array($condition)){
			$fields = array_keys($condition);
			$values = array_values($condition);
			$escVals = array();
			foreach($condition as $field => $val) {
				if (($field=="freelance_categoryid") && (!empty($val))){
					if (!empty($val)){
						$val = "'" . addslashes($val) . "'";
						$arWhere[] = "$field = $val";
					}
				}else{
					if (!empty($val)){
						$val = "%" . addslashes($val) . "%";
						$arWhere[] = "$field like '$val'";
					}
				}
			}
		}
		$sql="select count(*) from freelance ".((!empty($arWhere))?"where ".join(' AND ', $arWhere):"");		
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			return $rowCount;
		} catch (PDOException $e) {
			return 0;
		}
		$stmt=null;

	}

	function getFreelanceCategoryAll($sorting="ASC"){
		$sql="SELECT * FROM freelance_category ORDER BY  freelance_category_name ".$sorting;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}	

	function getFreelanceCategory($sorting="ASC"){
		$sql="SELECT freelance_categoryid,freelance_category_name  FROM freelance_category ORDER BY  freelance_category_name ".$sorting;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$resp = array();
			while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
				$resp[$result["freelance_categoryid"]]=$result["freelance_category_name"];
			}
			return $resp;
		} catch (PDOException $e) {
			return false;
		}
	}

	function add($table="freelance",$data=array()){
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

	function insertArray($tableName="freelance", $data) {
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