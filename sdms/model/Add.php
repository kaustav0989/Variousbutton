<?php
	require_once("mysqlcon.php");

	class Add extends BaseController
	{
		public function class($class)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `Class` WHERE `s_name` = {$class}";
    		//echo $sql; exit;
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_id'];
    	}

    	public function status($status)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `Student_status` WHERE `s_name` = {$status}";
    		//echo $sql; exit;
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_id'];
    	}
    	public function state($state)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `State` WHERE `s_name` = {$state}";
    		//echo $sql; exit;
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_id'];
    	}
    	public function city($city)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `City` WHERE `s_name` = {$city}";
    		//echo $sql; exit;
    		$result = $obj->conn->query($sql);
    		if( $result->num_rows > 0 )
    		{
    			while($row = $result->fetch_assoc())
    			return $row['i_id'];	
    		}	
    		else
			{
				$sql = "INSERT INTO City(`s_name`) VALUES($city)";
				$obj->conn->query($sql);
				return $obj->conn->insert_id;
			}
    		
    	}
    
    	public function pin($pin)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `Pincode` WHERE `s_no` = {$pin}";
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_id'];
    	}

    	public function sec($val)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `Section` WHERE `s_name` = {$val}";
    		$obj->conn->query($sql);
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_id'];
    	}

    	public function total($col,$val)
    	{
    		$obj = new BaseController();
    		$sql = "INSERT INTO `Personal_details`($col) VALUES($val)";
    		return $result = $obj->conn->query($sql);
    	}
	}
?>