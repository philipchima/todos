<?php 

//Data Base Connection Class
Class Dbh{
	private $servername;
	private $username;
	Private $dbname;
	Private $password;
	Private $port;
	
	private $charset;

	public function connect(){
	
	$this->servername="localhost";
	//$this->username="root";
	$this->username="postgres";
	$this->password="poster1988";
	//$this->password="";
	$this->dbname="tododb";
	$this->charset="utf8mb4";
	$this->port="5432";

	

	// this block helps us to check for error
	try{
		//$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

		//data source Name
		$dsn="pgsql:host=".$this->servername.";port=".$this->port.";dbname=".$this->dbname;
		//$dsn="mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
		$pdo=new PDO($dsn,$this->username,$this->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;

	}catch(PDOException $e){
		echo "connection Unsuccessfull:".$e->getMessage();
	}
	}

}
?>