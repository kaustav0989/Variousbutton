<?php
	include("mysqlcon.php");
	$obj = new BaseController();
	$obj->connect();
	class FetchUsers extends BaseController
	{
		public $user;
		public $pwd;
		public function __construct($user, $pwd)
		{	
			$this->user = $user;
			$this->pwd  = $pwd;
		}

		function fetch()

		{	
			$obj = new BaseController();
			$sql = "SELECT * FROM `user_details_table1` WHERE `user_id` = '".$this->user."' AND `user_password` = '".$this->pwd."'"; 
			$result = $obj->conn->query($sql);
		    return $result->num_rows;
		}
	}
?>