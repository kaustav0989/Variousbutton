<?php 
	include("header.html");
	if( $retval>0 )
	{
		$row=mysqli_fetch_assoc($retval);
	}	
?>
<head>
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>

	<script type="text/javascript">
	function delete_page(elem)
	{
		if( confirm("Do you want to delete?") )
         {
            var id = elem.getAttribute('id').split('_').pop();
            window.location.href="all_student_details.php?page=delete&stud_id="+id;  
         }
         else
            return false;
	}

	function go_back()
	{
		window.location.href="all_student_details.php";
	}
	</script>

</head>
<body> 
    <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;"width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
        <tr>
            <td>Firstname:</td>
            <td><?php echo $row['stud_fname']?></td>
            <td>Lastname:</td> 
            <td><?php echo $row['stud_lname']?></td>                    
            <td>Class:</td>
            <td><?php echo $row['stud_class'] ?></td>   
             <td align="center" rowspan="3" style="padding-right: 60px;" >
            <?php if( !empty( $row['img_name'] ) ) {  ?>
                <img src="../Uploaded/<?php echo $row['img_name']; ?>" align="right" style='width: 150px;height: 150px;border: 1px solid #000;' />      
            <?php } else {
            		if( $row['stud_gender'] == 'male' ) {?>
                <img src="../Uploaded/no_image.png" align="right" style='width: 150px;height: 150px;border: 1px solid #000;' />
            <?php } else { ?>
            	<img src="../Uploaded/no-avatar-female.png" align="right" style='width: 150px;height: 150px;border: 1px solid #000;' />    
            <?php } } ?>
            </td>                                     
        </tr>
        <tr>
            
            <td>Roll:</td>     
            <td><?php echo $row['stud_roll'] ?></td>
            <td>Section:</td>  
            <td><?php echo $row['stud_section'] ?></td>
            <td>Age:</td>      
            <td><?php echo $row['stud_roll'] ?></td>
        </tr>

        <tr>
            <td>DOB:</td>      
            <td><?php echo $row['stud_dob'] ?></td>
            <td>Address:</td>  
            <td><?php echo $row['stud_address'] ?></td> 
            <td>Parent Name:</td>   
            <td><?php echo $row['stud_parent'] ?></td>                   
        </tr>
        <tr>                    
            <td>Guardian:</td>  
            <td><?php echo $row['stud_guardian_type'] ?></td>  
            <td>Guardian Name:</td> 
            <td><?php echo $row['stud_guardian'] ?></td>  
            <td>Status: </td>
            <td><?php echo $row['stud_status'] ?></td>
        </tr>

        <tr>
        	<td>Gender</td>
        	<td><?php echo $row['stud_gender'] ?></td>
        </tr>
            
        <tr><td colspan="6">&nbsp;</td></tr>
        <tr>
            <td><input type="button" value="Delete" name="stud_delete" id="stud_edit_<?php echo encrypt( $row["stud_id"] ) ?>" onclick="delete_page(this)"></td>
            <td><input type="button" value="Back" name="back" onclick="go_back()"></td>
        </tr>
    </table>
</form>    