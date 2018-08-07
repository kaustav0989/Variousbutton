<?php
	include("../model/show_list.php");
	if( isset($_GET["state"]) )
	{
		$state_id 	= $_GET["state"];
		$obj 		= new ShowList();
		$result 	= $obj->allcity($state_id);

		foreach( $result as $row )
		{
			echo rtrim($row['s_name']."||");
			
		}
	}		
?>