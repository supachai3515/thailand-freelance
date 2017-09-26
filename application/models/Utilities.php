<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilities extends CI_Model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function genSQLInsert($table, $arFieldValues){
		$fields = array_keys($arFieldValues);
		$values = array_values($arFieldValues);
		$escVals = array();
		foreach($values as $val) {
		  if(! is_numeric($val)) {
			if ($val=="null"){
				$val = mysql_escape_string($val);
			}else{
				$val = "'" . mysql_escape_string($val) . "'";
			}
		  }else{
		  	$val = "'" . mysql_escape_string($val) . "'";
		  }
		  $escVals[] = $val;
		}
		$sql = " INSERT INTO $table (";
		$sql .= join(', ', $fields);
		$sql .= ') VALUES(';
		$sql .= join(', ', $escVals);
		$sql .= ')';
		return $sql;
	}

	function genSQLUpdate($table, $arFieldValues, $arConditions){
		$arUpdates = array();
		foreach($arFieldValues as $field => $val) {
			if(!is_numeric($val)) {
				if ($val=="null"){
					$val = addslashes($val);
				}else{
					$val = "'" . addslashes($val) . "'";
				}
		  	}else{
		  	$val = "'" . addslashes($val) . "'";
		  	}
			$arUpdates[] = "$field = $val";
		}
		$arWhere = array();
		foreach($arConditions as $field => $val) {
			$val = "'" . addslashes($val) . "'";
			$arWhere[] = "$field = $val";
		}
		$sql  = "UPDATE $table SET ";
		$sql .= join(', ', $arUpdates);
		$sql .= ' WHERE ' . join(' AND ', $arWhere);
		return $sql;
	}

	function writefile($filename, $data){
		$handle = fopen($filename, 'a+');
		fwrite($handle, $data);
		fclose($handle);
	}

	function generateRandomString($length = 5, $letters = '1234567890') {
		$s = '';
		$lettersLength = strlen($letters)-1;
		for($i = 0 ; $i < $length ; $i++) {
			$s .= $letters[rand(0,$lettersLength)];
		}
		return $s;
	}
	
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}
	

}

?>
