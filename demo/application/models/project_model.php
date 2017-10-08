<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Project_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db->query("SET NAMES 'utf8'");
    }

    function get_project_count($searchText = '')
  	{
  		$searchText = $this->db->escape_like_str($searchText);
  		$sql =" SELECT COUNT(r.project_id) as connt_id FROM  tbh_project r WHERE 1=1 ";
      if(!empty($searchText)) {
          $sql = $sql." AND (r.project_id  LIKE '%".$searchText."%' OR  r.name  LIKE '%".$searchText."%')";
      }
  		$query = $this->db->query($sql);
  		$row = $query->row_array();
  		return  $row['connt_id'];

  	}

    function get_project($searchText = '', $page, $segment)
    {

  		$searchText = $this->db->escape_like_str($searchText);
  		$page = $this->db->escape_str($page);
  		$segment = $this->db->escape_str($segment);

  		$sql =" SELECT p.*, CONCAT(m.firstname,m.lastname) member_name ,m.image member_image  FROM tbh_project p INNER JOIN tbm_member m ON p.member_id = m.member_id
  					  WHERE 1=1 ";
        if(!empty($searchText)) {
    				$sql = $sql." AND (r.project_id  LIKE '%".$searchText."%' OR  r.name  LIKE '%".$searchText."%')";
    		}
  			$sql = $sql."ORDER BY create_date DESC LIMIT ".$page.",".$segment." ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

  	function get_project_all()
    {
  		$sql ="SELECT r.* , u1.name create_by_name , u2.name  modified_by_name FROM  project r
  						LEFT JOIN tbl_users u1 ON u1.userId = r.create_by
  						LEFT JOIN tbl_users u2 ON u2.userId = r.modified_by WHERE 1=1 ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

  	public function get_project_id($id)
  	{
  		$id = $this->db->escape_str($id);
  		$sql ="SELECT r.* , u1.name create_by_name , u2.name  modified_by_name FROM  project r
  						LEFT JOIN tbl_users u1 ON u1.userId = r.create_by
  						LEFT JOIN tbl_users u2 ON u2.userId = r.modified_by
  						 WHERE r.project_id = '".$id."'";
  		$query = $this->db->query($sql);
  		$row = $query->row_array();
  		return $row;
  	}

  	function save_project($project_info)
  	{
  			$this->db->trans_start();
  			$this->db->insert('project', $project_info);
  			$insert_id = $this->db->insert_id();
  			$this->db->trans_complete();
  			return $insert_id;
  	}

  	function update_project($project_info,$id)
  	{
  			$this->db->where('project_id', $id);
  			$this->db->update('project', $project_info);
  			return TRUE;
  	}

  	public function get_project_detail($id)
  	{
  		  $id = $this->db->escape_str($id);
  			$sql ="SELECT m.menu_id,m.`name`, md.is_add ,md.is_edit, md.is_view, md.is_active
  				FROM menu m
  				LEFT JOIN project_detail md ON m.menu_id = md.menu_id
  				WHERE md.project_id = ".$id."";

  			$re = $this->db->query($sql);
  			return $re->result_array();
  	}

  	public function get_menu($id)
  	{
  		 $id = $this->db->escape_str($id);
  			$sql ="SELECT m.* FROM menu m
  				WHERE is_active = 1  AND  m.menu_id NOT IN (SELECT menu_id FROM  project_detail WHERE project_id = ".$id." ) ";
  			$re = $this->db->query($sql);
  			return $re->result_array();
  	}

  	public function save_project_detail ($value){
  		 $sql ="INSERT INTO `project_detail` (`menu_id`, `project_id`, `is_add`, `is_view`, `is_edit`) VALUES ('".$value->menu_id."', '".$value->project_id."','0', '1', '0') ";
  		 $this->db->query($sql);
  	}

  	public function update_project_detail ($value){
  		 $sql = "UPDATE project_detail SET ".$value->case_update." =  '".$value->edit_valus."'  WHERE menu_id  = '".$value->menu_id."' AND  project_id = '".$value->project_id."' ";
  		 $this->db->query($sql);
  	}


    // 	function getProjectLimit($limit=20,$offset=0){
    // 	$sql="SELECT  *  FROM project,ownerwe  where  project.owner_id=owner.owner_loginname ORDER BY  project.project_id DESC LIMIT ".$offset.",".$limit;
    // 	try{
    // 		$re = $this->db->query($sql);
    // 		return $re->result_array();
    // 	} catch (PDOException $e) {
    // 		return false;
    // 	}
    // }
  //
    // function getProjectCount(){
    // 	$sql="SELECT count(*) FROM project";
    // 	try{
    // 		$stmt=$this->db->conn_id->prepare($sql);
    // 		$stmt->execute();
    // 		$rowCount = $stmt->fetchColumn(0);
    // 		return $rowCount;
    // 	} catch (PDOException $e) {
    // 		return 0;
    // 	}
    // }
  //
    // function getProjectByID($project_id){
    // 	$sql="SELECT  *  FROM project,owner WHERE  project.owner_id=owner.owner_loginname and  project.project_id=:project_id";
    // 	try{
    // 		$stmt=$this->db->conn_id->prepare($sql);
    // 		$stmt->bindParam(':project_id',$project_id,PDO::PARAM_INT);
    // 		$stmt->execute();
    // 		$row=$stmt->fetchAll();
    // 		return $row;
    // 	} catch (PDOException $e) {
    // 		return false;
    // 	}
    // }
  //
  //
    // function searchProjectLimit($condition=array(),$limit=20,$offset=0){
    // 	if (is_array($condition)){
    // 		$fields = array_keys($condition);
    // 		$values = array_values($condition);
    // 		$escVals = array();
    // 		foreach($condition as $field => $val) {
    // 			if (($field=="project_name") && (!empty($val))){
    // 				$val = "%" . addslashes($val) . "%";
    // 				$arWhere[] = "$field like '$val'";
  //
    // 			}elseif (($field=="project_value_start") && (!empty($val))){
    // 				if ($val==1){
    // 					$arWhere[] = "$field > 0";
    // 					$arWhere[] = "$field < 10000";
    // 				}elseif ($val==2) {
    // 					$arWhere[] = "$field > 10000";
    // 					$arWhere[] = "$field < 20000";
    // 				}elseif ($val==3) {
    // 					$arWhere[] = "$field > 20000";
    // 					$arWhere[] = "$field < 30000";
    // 				}elseif ($val==4) {
    // 					$arWhere[] = "$field > 30000";
    // 					$arWhere[] = "$field < 40000";
    // 				}elseif ($val==5) {
    // 					$arWhere[] = "$field > 40000";
    // 				}
    // 			}elseif (($field=="project_status") && (!empty($val))){
    // 				if ($val==1){
    // 					$arWhere[] = "$field = 0";
    // 				}elseif ($val==2) {
    // 					$arWhere[] = "$field = 1";
    // 				}
    // 			}else{
    // 				if (!empty($val)){
    // 					$val = "'" . addslashes($val) . "'";
    // 					$arWhere[] = "$field = $val";
    // 				}
    // 			}
    // 		}
    // 	}
  //
    // 	$sql="select  * from project ".((!empty($arWhere))?"where ".join(' AND ', $arWhere):"")." limit ".$offset.",".$limit;
    // 	try{
    // 		echo $sql;
    // 		$stmt=$this->db->conn_id->prepare($sql);
    // 		$stmt->execute();
    // 		$row=$stmt->fetchAll();
    // 		return $row;
    // 	} catch (PDOException $e) {
    // 		return false;
    // 	}
  //
    // }
  //
    // function searchProjectCount($condition=array()){
    // 	if (is_array($condition)){
    // 		$fields = array_keys($condition);
    // 		$values = array_values($condition);
    // 		$escVals = array();
    // 		foreach($condition as $field => $val) {
    // 			if (($field=="project_name") && (!empty($val))){
    // 				$val = "%" . addslashes($val) . "%";
    // 				$arWhere[] = "$field like '$val'";
  //
    // 			}elseif (($field=="project_value_start") && (!empty($val))){
    // 				if ($val==1){
    // 					$arWhere[] = "$field > 0";
    // 					$arWhere[] = "$field < 10000";
    // 				}elseif ($val==2) {
    // 					$arWhere[] = "$field > 10000";
    // 					$arWhere[] = "$field < 20000";
    // 				}elseif ($val==3) {
    // 					$arWhere[] = "$field > 20000";
    // 					$arWhere[] = "$field < 30000";
    // 				}elseif ($val==4) {
    // 					$arWhere[] = "$field > 30000";
    // 					$arWhere[] = "$field < 40000";
    // 				}elseif ($val==5) {
    // 					$arWhere[] = "$field > 40000";
    // 				}
    // 			}elseif (($field=="project_status") && (!empty($val))){
    // 				if ($val==1){
    // 					$arWhere[] = "$field = 0";
    // 				}elseif ($val==2) {
    // 					$arWhere[] = "$field = 1";
    // 				}
    // 			}else{
    // 				if (!empty($val)){
    // 					$val = "'" . addslashes($val) . "'";
    // 					$arWhere[] = "$field = $val";
    // 				}
    // 			}
    // 		}
    // 	}
    // 	$sql="select count(*) from project ".((!empty($arWhere))?"where ".join(' AND ', $arWhere):"");
    // 	try{
    // 		$stmt=$this->db->conn_id->prepare($sql);
    // 		$stmt->execute();
    // 		$rowCount = $stmt->fetchColumn(0);
    // 		return $rowCount;
    // 	} catch (PDOException $e) {
    // 		return 0;
    // 	}
    // 	$stmt=null;
  //
    // }
  //
    // function insertArray($tableName="project", $data) {
    // 	$keys = array_keys($data);
  // 		$values = array_values($data);
  //
    // 	$numColumns = count($keys);
    // 	$columnListString = implode(",", $keys);
  //
    // 	$placeHolders = array();
  //
    // 	$params  = str_repeat("?,", $numColumns);
    // 	$placeHolders=rtrim($params, ",");
  //
    // 	$sql = "insert into $tableName ($columnListString) values ($placeHolders)";
    // 	$stmt = $this->db->conn_id->prepare($sql);
    // 	$j = 1;
    // 	foreach ($data as $field => $value) {
    // 		$stmt->bindValue($j, $value, PDO::PARAM_STR);
    // 		$j++;
    // 	}
    // 	$stmt->execute();
    // 	return $this->db->insert_id()?$this->db->insert_id() : false;
    // }
}
