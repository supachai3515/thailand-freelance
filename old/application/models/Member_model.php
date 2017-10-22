<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member_model extends CI_Model{
	
    	function __construct(){
	       	 parent::__construct();
		$this->db->query("SET NAMES 'utf8'");
		$this->load->model('utilities');
	}
  
	function checkUserLogin($username,$password,$member_type){
		try{
			if ($member_type=="1"){
				$sql="select freelance_id as id,freelance_loginname as loginname,freelance_flogo as image_profile from freelance where  freelance_loginname=:login and freelance_password=:password and freelance_status='1' limit 1";
			}elseif ($member_type=="2"){
				$sql="select owner_id as id,owner_loginname as loginname,owner_logo as image_profile from owner where  owner_loginname=:login and owner_password=:password and owner_status='1' limit 1";
			}			
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':login',$username,PDO::PARAM_STR);
			$stmt->bindParam(':password',$password,PDO::PARAM_STR);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}	
	}  

	function checkUser($usr){
		$sql="SELECT * FROM freelance where freelance_loginname=:user_name";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':user_name',$usr,PDO::PARAM_STR);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			if ($rowCount>0){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			return false;
		}		
	}

	function checkUserOwner($usr){
		$sql="SELECT * FROM owner where owner_loginname=:user_name";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':user_name',$usr,PDO::PARAM_STR);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			if ($rowCount>0){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			return false;
		}		
	}


	function checkEmail($email){
		$sql="SELECT * FROM freelance where freelance_email=:user_email";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':user_email',$email,PDO::PARAM_STR);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			if ($rowCount>0){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			return false;
		}		
	}

	function checkEmailOwner($email){
		$sql="SELECT * FROM owner where owner_email=:user_email";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':user_email',$email,PDO::PARAM_STR);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			if ($rowCount>0){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			return false;
		}		
	}
	


}