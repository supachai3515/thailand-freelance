<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_model extends CI_Model{
	
    	function __construct(){
	       	 parent::__construct();
		$this->db->query("SET NAMES 'utf8'");
		$this->load->model('utilities');
	}
  
  	function getProjectLimit($limit=20,$offset=0){
		$sql="SELECT  *  FROM project,owner  where  project.owner_id=owner.owner_loginname ORDER BY  project.project_id DESC LIMIT ".$offset.",".$limit;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}		
	}

	function getProjectCount(){
		$sql="SELECT count(*) FROM project";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			return $rowCount;
		} catch (PDOException $e) {
			return 0;
		}		
	}

	function getProjectByID($project_id){
		$sql="SELECT  *  FROM project,owner WHERE  project.owner_id=owner.owner_loginname and  project.project_id=:project_id";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':project_id',$project_id,PDO::PARAM_INT);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}


	function searchProjectLimit($condition=array(),$limit=20,$offset=0){
		if (is_array($condition)){
			$fields = array_keys($condition);
			$values = array_values($condition);
			$escVals = array();
			foreach($condition as $field => $val) {
				if (($field=="project_name") && (!empty($val))){
					$val = "%" . addslashes($val) . "%";
					$arWhere[] = "$field like '$val'";
					
				}elseif (($field=="project_value_start") && (!empty($val))){
					if ($val==1){
						$arWhere[] = "$field > 0";
						$arWhere[] = "$field < 10000";
					}elseif ($val==2) {
						$arWhere[] = "$field > 10000";
						$arWhere[] = "$field < 20000";
					}elseif ($val==3) {
						$arWhere[] = "$field > 20000";
						$arWhere[] = "$field < 30000";
					}elseif ($val==4) {
						$arWhere[] = "$field > 30000";
						$arWhere[] = "$field < 40000";
					}elseif ($val==5) {
						$arWhere[] = "$field > 40000";
					}				
				}elseif (($field=="project_status") && (!empty($val))){
					if ($val==1){
						$arWhere[] = "$field = 0";
					}elseif ($val==2) {
						$arWhere[] = "$field = 1";
					}				
				}else{
					if (!empty($val)){
						$val = "'" . addslashes($val) . "'";
						$arWhere[] = "$field = $val";
					}
				}
			}
		}
				
		$sql="select  * from project ".((!empty($arWhere))?"where ".join(' AND ', $arWhere):"")." limit ".$offset.",".$limit;
		try{
			echo $sql;
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}

	}	

	function searchProjectCount($condition=array()){
		if (is_array($condition)){
			$fields = array_keys($condition);
			$values = array_values($condition);
			$escVals = array();
			foreach($condition as $field => $val) {
				if (($field=="project_name") && (!empty($val))){
					$val = "%" . addslashes($val) . "%";
					$arWhere[] = "$field like '$val'";
					
				}elseif (($field=="project_value_start") && (!empty($val))){
					if ($val==1){
						$arWhere[] = "$field > 0";
						$arWhere[] = "$field < 10000";
					}elseif ($val==2) {
						$arWhere[] = "$field > 10000";
						$arWhere[] = "$field < 20000";
					}elseif ($val==3) {
						$arWhere[] = "$field > 20000";
						$arWhere[] = "$field < 30000";
					}elseif ($val==4) {
						$arWhere[] = "$field > 30000";
						$arWhere[] = "$field < 40000";
					}elseif ($val==5) {
						$arWhere[] = "$field > 40000";
					}				
				}elseif (($field=="project_status") && (!empty($val))){
					if ($val==1){
						$arWhere[] = "$field = 0";
					}elseif ($val==2) {
						$arWhere[] = "$field = 1";
					}				
				}else{
					if (!empty($val)){
						$val = "'" . addslashes($val) . "'";
						$arWhere[] = "$field = $val";
					}
				}
			}
		}
		$sql="select count(*) from project ".((!empty($arWhere))?"where ".join(' AND ', $arWhere):"");		
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

	function insertArray($tableName="project", $data) {
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