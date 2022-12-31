<?php
include_once("../includes/connection.php");
class Phpdelete extends Dbh{
	

	public function deletebyonefield($tablename, $fieldname, $fieldvalue){
	    $mysqli = $this->connect();

	     $sql = "DELETE FROM public.$tablename WHERE $fieldname=$fieldvalue";

	    $stmt = $mysqli->prepare($sql);
	    
	     if($stmt->execute()){
	        return "Success";
	      } else {
	        return "failed: " . $mysqli->error;
	    }
	        
	}
}
