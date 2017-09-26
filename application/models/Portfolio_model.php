<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio_model extends CI_Model{
	
    	function __construct(){
	       	 parent::__construct();
		$this->db->query("SET NAMES 'utf8'");
		$this->load->model('utilities');
	}

	function getPortfolioByID($portfolio_id){
		$sql="SELECT  *  FROM portfolio,freelance WHERE  portfolio.freelance_loginname=freelance.freelance_loginname AND portfolio.portfolio_id=:portfolio_id";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':portfolio_id',$portfolio_id,PDO::PARAM_INT);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}

	function getPortfolioLimit($limit=20,$offset=0){
		$sql="SELECT * FROM portfolio,freelance WHERE portfolio.freelance_loginname=freelance.freelance_loginname  ORDER BY portfolio.portfolio_id DESC LIMIT ".$offset.",".$limit;
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}		
	}

	function getPortfolioCount(){
		$sql="SELECT count(*) FROM portfolio,freelance WHERE portfolio.freelance_loginname=freelance.freelance_loginname";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->execute();
			$rowCount = $stmt->fetchColumn(0);
			return $rowCount;
		} catch (PDOException $e) {
			return 0;
		}		
	}	

	function getPortfolioByLogin($loginname){
		$sql="SELECT  *  FROM portfolio WHERE  freelance_loginname=:loginname";
		try{
			$stmt=$this->db->conn_id->prepare($sql);
			$stmt->bindParam(':loginname',$loginname,PDO::PARAM_INT);
			$stmt->execute();
			$row=$stmt->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return false;
		}
	}	


}