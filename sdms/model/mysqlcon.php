<?php
class BaseController
{
	private $dbhost;
	private $dbname;
	private $dbuser;
	private $dbpassword;
	public $conn;

	public function __construct()
	{
		$this->connect();
	}
	
	public function connect()
	{	
		$this->dbhost     = 'localhost';
		$this->dbuser     = 'root';
		$this->dbpassword = 'shld123';
		$this->dbname     = 'Student_details';

		$this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
		return $this->conn;
	}
}
session_start();
?>
