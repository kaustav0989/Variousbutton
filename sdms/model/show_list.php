<?php

//	ini_set("display_errors", 1);
	include("mysqlcon.php");
//	var_dump($obj->connect());

	class ShowList extends BaseController
    {
    
    	public function showstudentlist($where, $limit)
    	{	

    		$obj = new BaseController();
    		$sql = "SELECT spd.i_stud_id AS ID,spd.s_stud_fname AS firstname,spd.s_stud_lname AS lastname,
					spd.s_stud_gender AS 'gender',
					Year(CURRENT_DATE)-YEAR(spd.dt_stud_dob) AS 'age' ,
					cl.s_name AS 'class',
					sc.s_name AS 'section',
					scl.i_roll_no AS 'roll' , 
					CONCAT(spd.s_stud_address,',',ct.s_name,',',st.s_name,',',pn.s_no) AS 'address',
					spd.s_stud_contact AS 'contact',spd.s_img_name AS image
					FROM 
					Personal_details AS spd LEFT JOIN Student_classes AS scl ON spd.i_stud_id=scl.i_student_id 
					LEFT JOIN City AS ct ON spd.i_city_id=ct.i_id LEFT JOIN State AS st ON spd.i_state_id=st.i_id 
					LEFT JOIN Pincode AS pn ON spd.i_pin_id=pn.i_id LEFT JOIN Class AS cl ON scl.i_class_id=cl.i_id 
					LEFT JOIN Section AS sc ON scl.i_secion_id=sc.i_id ".$where.$limit;

		//	echo $sql; exit;		
			
			$result = $obj->conn->query($sql);
		    if( $result->num_rows > 0 )
		    {
		    	while( $row = $result->fetch_assoc())
		    	{
		    		$data[] = $row; 
		    	}	
		    }
		    return $data;		
    	}

    	function showeditlist($id)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT spd.i_stud_id AS ID,spd.s_stud_fname AS firstname,spd.s_stud_lname AS lastname,
					spd.s_stud_father AS father,
                    spd.s_stud_mother AS mother,
					spd.s_stud_gender AS gender,
                    spd.dt_stud_dob as dob,
                    spd.s_stud_address as address,
					cl.s_name AS class,
                    ct.s_name AS city,
					sc.s_name AS section,
                    st.s_name as state,
                    pn.s_no AS pin,
					scl.i_roll_no AS roll , 
					spd.s_stud_contact AS contact,
                   	spd.s_img_name AS image,
                    Year.s_year_val AS year,
                    scl.i_roll_no AS roll,
                    ss.s_name AS status
					FROM 
					Personal_details AS spd LEFT JOIN Student_classes AS scl ON spd.i_stud_id=scl.i_student_id 
					LEFT JOIN City AS ct ON spd.i_city_id=ct.i_id LEFT JOIN State AS st ON spd.i_state_id=st.i_id 
					LEFT JOIN Pincode AS pn ON spd.i_pin_id=pn.i_id LEFT JOIN Class AS cl ON scl.i_class_id=cl.i_id 
					LEFT JOIN Section AS sc ON scl.i_secion_id=sc.i_id 
                    LEFT JOIN Year ON scl.i_year_id = Year.i_year_id
                    LEFT JOIN Student_status AS ss ON scl.i_status_id = ss.i_id
                    WHERE spd.i_stud_id = '{$id}'";

                    $result = $obj->conn->query($sql);
				    if( $result->num_rows > 0 )
				    {
				    	while( $row = $result->fetch_assoc())
				    	{
				    		$data[] = $row; 
				    	}	
				    }
		    return $data;
    	}

    	public function pagination($where)
    	{
    		$obj = new BaseController();
    		$sql = " SELECT count(1) As tot FROM `Personal_details` AS `spd` ".$where;
    		$result = $obj->conn->query($sql);
    		$result = $result->fetch_assoc();
    		$total = $result['tot'];
    		return $total;
    	}

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
    		if( $result->num_rows > 0 )
    		{
    			while($row = $result->fetch_assoc())
    			return $row['i_id'];	
    		}
    		else
			{
				$sql = "INSERT INTO Pincode(`s_no`) VALUES($pin)";
				$obj->conn->query($sql);
				return $obj->conn->insert_id;
			}
    	}

    	public function sec($val)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_id` FROM `Section` WHERE `s_name` = {$val}";
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_id'];
    	}

    	public function year($val)
    	{
    		$obj = new BaseController();
    		$sql = "SELECT `i_year_id` FROM `Year` WHERE `s_year_val` = {$val}";
    		$result = $obj->conn->query($sql);
    		while($row = $result->fetch_assoc())
    		return $row['i_year_id'];
    	}

    	public function total($col,$val)
    	{
    		$obj = new BaseController();
    		$sql = "INSERT INTO `Personal_details`($col) VALUES($val)";
    		//echo $sql;exit;
    		$result = $obj->conn->query($sql);
    		if( $result )
    			return $obj->conn->insert_id;
    	}

    	public function sub($col,$val)
    	{
    		$obj = new BaseController();
    		$sql = "INSERT INTO `Student_classes`($col) VALUES($val)";
    		
    		return $result = $obj->conn->query($sql);
    	}

    	public function image($file_name,$id)
    	{
 
    		$obj = new BaseController();
    		$sql = "UPDATE `Personal_details` SET `s_img_name` ='".$file_name."' WHERE `i_stud_id` ='".$id."'"; 
    		if( $result = $obj->conn->query($sql))
    		{
    			return true;
    		}
    	}

    	public function off()
    	{
    		$obj = new BaseController();
    		$sql = "SET autocommit = 0";
    		//$obj->conn->autocommit(FALSE);
    	}

    	public function TransactionBegin()
    	{
    		$obj = new BaseController();
    		$sql ="START TRANSACTION";
    		$obj->conn->query($sql);
    	}
    	public function TransactionEnd()
    	{
    		$obj = new BaseController();
    		$obj->conn->autocommit(TRUE);
    	}

    	public function  Rollback()
    	{
    		$obj = new BaseController();
    		$obj->conn->rollback();
    	}

    	public function Commit()
    	{
    		$obj = new BaseController();
    		$obj->conn->commit();
    	}

    	public function totalUpdate($set,$id)
    	{
    		$obj = new BaseController();
    		$sql = "UPDATE `Personal_details` SET {$set} WHERE `i_stud_id`=".$id;
    		return $result = $obj->conn->query($sql);
    	}

    	public function subUpdate($updt,$id)
    	{
    		$obj = new BaseController();
    		$sql = "UPDATE `Student_classes` SET {$updt} WHERE `i_student_id`=".$id;
    		return $result = $obj->conn->query($sql);
    	}
    }
?>