<?php 
    include("header.html"); 
    $row=mysqli_fetch_assoc($retval);

?>
<html>
<head>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <script type="text/javascript">
    function back_page()
        {
            window.location.href="all_student_details.php";
        }
    </script>    
</head>    
<body>
        <?php echo show_msg(); ?>
        <div>&nbsp;</div>
        <form id="stud_search" method="post" action="" align="left" enctype="multipart/form-data">
            <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
                <input type="hidden" id="id_hidden" name="id_hidden" value="<?php echo encrypt($row['stud_id']); ?>" />
            <!--    <input type="hidden" id="page" name="page" value="edit" /> --> 
                <tr>
                    <td>Firstname:</td>
                    <td><input type="text" name="stud_fname" value="<?php echo $row['stud_fname']?$row['stud_fname']:''; ?>"></td>
                    <td>Lastname:</td> 
                    <td><input type="text" name="stud_lname" value="<?php echo $row['stud_lname']?$row['stud_lname']:''; ?>"></td>                    
                    <td>Class:</td>
                    <td> 
                        <select name="stud_class">
                            <option value='' <?php echo (!isset($row['stud_class']))?'selected':''; ?>>Select</option>
                            <option value="5" <?php echo ( isset($row['stud_class']) && $row['stud_class'] == '5' )?'selected':''; ?> >Five</option>
                            <option value="6" <?php echo ( isset($row['stud_class']) && $row['stud_class'] == '6' )?'selected':''; ?>>Six</option>
                            <option value="7" <?php echo ( isset($row['stud_class']) && $row['stud_class'] == '7' )?'selected':''; ?>>seven</option>
                            <option value="8" <?php echo ( isset($row['stud_class']) && $row['stud_class'] == '8' )?'selected':''; ?>>eight</option>
                            <option value="9" <?php echo ( isset($row['stud_class']) && $row['stud_class'] == '9' )?'selected':''; ?>>nine</option>
                            <option value="10" <?php echo ( isset($row['stud_class']) && $row['stud_class'] == '10' )?'selected':''; ?>>ten</option>
                        </select>
                    </td>   
                     <td align="center" rowspan="3" style="padding-right: 60px;" >
                        <?php if( !empty( $row['img_name'] ) ) {  ?>
                <img src="Uploaded/<?php echo $row['img_name']; ?>" align="right" style='width: 150px;height: 150px;border: 1px solid #000;' />      
            <?php } else {
                    if( $row['stud_gender'] == 'male' ) {?>
                <img src="Uploaded/no_image.png" align="right" style='width: 150px;height: 150px;border: 1px solid #000;' />
            <?php } else { ?>
                <img src="Uploaded/no-avatar-female.png" align="right" style='width: 150px;height: 150px;border: 1px solid #000;' />    
            <?php } } ?>    
                    </td>
                                                     
                </tr>
                <tr>
                    
                    <td>Roll:</td>     
                    <td>
                        <input type="number" name="stud_roll" value="<?php echo ($row['stud_roll'])?$row['stud_roll']:''; ?>">
                    </td>
                    <td>Section:</td>  
                    <td>
                        <input type="text" name="stud_section" value="<?php echo ($row['stud_section'])?$row['stud_section']:''; ?>">
                    </td>
                    <td>Age:</td>      
                    <td>
                        <input type="number" name="stud_age" value="<?php echo ($row['stud_age'])?$row['stud_age']:''; ?>">
                    </td>
                </tr>

                <tr>
                    <td>DOB:</td>      
                    <td>
                        <input type="date" name="stud_dob" max="2020-12-31" value="<?php echo ($row['stud_dob'])?$row['stud_dob']:''; ?>">
                    </td>
                    <td>Address:</td>  
                    <td>
                        <input type="text" name="stud_address" value="<?php echo ($row['stud_address'])?$row['stud_address']:''; ?>">
                    </td> 
                    <td>Parent Name:</td>   
                    <td>
                        <input type="text" name="stud_parent" value="<?php echo ($row['stud_parent'])?$row['stud_parent']:''; ?>">
                    </td>                   
                </tr>
                <tr>                    
                    <td>Guardian:</td>  
                    <td>
                        <select name="stud_guardian_type">
                            <option value='' <?php echo (!isset($row['stud_guardian_type'])) ?'selected':''; ?>>Select</option>
                            <option value="father" <?php echo ( isset($row['stud_guardian_type']) && $row['stud_guardian_type'] == 'father') ?'selected':'';?>>father</option>
                            <option value="mother" <?php echo ( isset($row['stud_guardian_type']) && $row['stud_guardian_type'] == 'mother') ?'selected':'';?>>mother</option>
                        </select> 
                    </td>  
                    <td>Guardian Name:</td> 
                    <td>
                        <input type="text" name="stud_guardian" value="<?php echo ($row['stud_guardian'])?$row['stud_guardian']:''; ?>">
                    </td>  
                    <td>Status: </td>
                    <td>
                        <select name="stud_status">
                            <option value='' <?php echo (!isset($row['stud_status'])) ?'selected':'';?>>Select</option>
                            <option value="active" <?php echo ( isset($row['stud_status']) && $row['stud_status'] == 'active') ?'selected':'';?>>active</option>
                            <option value="left" <?php echo ( isset($row['stud_status']) && $row['stud_status'] == 'left') ?'selected':'';?>>left</option>
                            <option value="tc" <?php echo ( isset($row['stud_status']) && $row['stud_status'] == 'tc') ?'selected':'';?>>TC</option>
                        </select>
                    </td>
                   
                    <td><input type="file" name="image" /></td>

                </tr>

                <tr>
                    <td>Gender</td>
                    <td>
                        <select name="stud_gender"> 
                            <option value="male" <?php echo ( isset($row['stud_gender']) && $row['stud_gender'] == 'male') ?'selected':'';?>>Male></option>
                            <option value="female" <?php echo ( isset($row['stud_gender']) && $row['stud_gender'] == 'female') ?'selected':'';?>>Female></option>
                        </select>
                    </td>

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                
                    
                <tr><td colspan="6">&nbsp;</td></tr>
                <tr>
                    <td><input type="submit" value="Update" name="stud_update"></td>
                    <td><input type="reset" value="Reset" name="reset"></td>
                    <td><input type="button" value="Back" name="back" onclick="back_page()"></td>
                </tr>
            </table>
        </form>
    </html>    