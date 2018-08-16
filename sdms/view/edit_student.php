<?php 
 //   ini_set("display_errors", 1);
    include("header.php"); 
    session_start();
?>
<html>
<head>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <script type="text/javascript">
    function back_page()
        {
            window.location.href="<?php echo $url; ?>/controller/all_student_details.php";
        }
    </script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo $url; ?>/resources/js/ajax.js"></script>
         <script src="<?php echo $url; ?>/resources/js/page_loader.js"></script>   
</head>    
<body>
        <?php echo show_msg(); ?>

        <div>&nbsp;</div>
        <form id="stud_search" method="post" action="" align="left" enctype="multipart/form-data">
            <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
                <input type="hidden" id="id_hidden" name="id_hidden" value="<?php echo encrypt($row['stud_id']); ?>" />
            <!--    <input type="hidden" id="page" name="page" value="edit" /> --> 

            <?php
                if(!empty( $_SESSION['edit'] )){
          foreach ($_SESSION['edit'] as $row) {
              if( empty($row['image']) )
                 {
                    if($row['gender']=='male')
                      $image = 'no_image.png';
                    else
                      $image = 'no-avatar-female.png';
                 } 
                 else
                 {
                    $image = $row['image'];
                 }
            ?>     
             <input type="hidden" id="id_hidden" name="id_hidden" value="<?php echo encrypt($row['ID']); ?>" />

            <tr bgcolor="#A9A9A9">
                <td colspan="8">Student Personal Details</td>
            </tr>
            <tr>
                <td>First-name</td>
            <td>
                <input type="text"  name="stud_fname"  value="<?php echo $row['firstname']?$row['firstname']:'';?>"/>
            </td>
            <td>Last-name</td>
            <td>
                <input type="text"  name="stud_lname"  value="<?php echo $row['lastname']?$row['lastname']:'';?>">
            </td>
            <td>Father-name</td>
            <td>
                <input type="text"  name="father_name" value="<?php echo $row['father']?$row['father']:'';?>"/>
            </td>   
                 <td align="center" rowspan="2" style="padding-right: 60px;" >
                    <img src="../Uploaded/<?php echo $image; ?>" align="left" style="height:150px; width:150px; border: 1px solid #000;"  />    
                </td>
                                                     
            </tr>
            <tr>
                    
                <td>Mother-name:</td>
            <td>
                <input type="text"  name="mother_name"  value="<?php echo $row['mother']?$row['mother']:'';?>"/>
            </td>
            <td>Gender:</td>
            <td>
                <select name="stud_gender">
                    <option value='' <?php echo (!isset($row['gender']))?'selected':''; ?>>Select</option>
                    <option value="male" <?php echo ( isset($row['gender']) && $row['gender'] == 'male' )?'selected':''; ?>>
                    Male
                    </option>
                    <option value="female" <?php echo ( isset($row['gender']) && $row['gender'] == 'female' )?'selected':''; ?>>Female</option>
                </select> 
            </td>
            <td>Date of Birth</td>
            <td>
                <input type="date" name="stud_dob"  value="<?php echo ($row['dob'])?$row['dob']:''; ?>"/>
            </td>
            </tr>

            <tr>
            <td>Contact Number</td>
            <td>
                <input type="text" name="stud_contact" value="<?php echo ($row['contact'])?$row['contact']:''; ?>"/>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <input type="file" name="file_name" />
            </td>
            <tr bgcolor="#A9A9A9">
                <td colspan="8">Student Address Details</td>
            </tr>
            <tr>
            <td>Address</td>
            <td>
                <input type="text" name="stud_address" value="<?php echo ($row['address'])?$row['address']:''; ?>"/>
            </td>
        <!--
            <td>City</td>
            <td>
                <input type="text" name="stud_city" value="<?php// echo ($row['city'])?$row['city']:''; ?>"/>
            </td>
            <td>State</td>
            <td>
                <input type="text" name="stud_state" value="<?php// echo ($row['state'])?$row['state']:''; ?>"/>
            </td>
        -->
            <td>State</td>
            <td>    
            <select id="state" name="stud_state">
            <?php
                 foreach ($_SESSION['ajax'] as $val) {
            ?>
            <option value="<?php echo $val['i_id']?>" <?php echo ( $row['state_id'] == $val['i_id'] )?'selected':'';?>><?php echo $val['s_name'] ?></option>
            <?php  } ?>
            </select>
            </td>
        </tr>
        <tr> 
            <td>City</td>
            <td>
            <div id = "city">
                <select name = "stud_city">
                    <option><?php echo ($row['city'])?$row['city']:''; ?></option>
                </select>
            </div>
            <td>Pin</td>
            <td>
                <input type="text" name="stud_pin" value="<?php echo ($row['pin'])?$row['pin']:''; ?>"/>
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            
            </tr>
            <tr bgcolor="#A9A9A9">
                <td colspan="8">Student Registration Details</td>
            </tr>               
            <tr>                    
            <td>Year</td>
            <td>
                <select name="stud_year">
                    <option value="2017" <?php echo ( isset($row['year']) && $row['year'] == '2017' )?'selected':''; ?>>2017</option>
                    <option value="2018" <?php echo ( isset($row['year']) && $row['year'] == '2018' )?'selected':''; ?>>2018</option>
                </select>    
            </td>
            <td>Class</td>
            <td>
                <select name="stud_class">
                    <option value='' <?php echo (!isset($row['class']))?'selected':''; ?> >Select</option>
                    <option value="Five" <?php echo ( isset($row['class']) && $row['class'] == 'Five' )?'selected':''; ?>>V</option>
                    <option value="Six" <?php echo ( isset($row['class']) && $row['class'] == 'Six' )?'selected':''; ?>>VI</option>
                    <option value="Seven" <?php echo ( isset($row['class']) && $row['class'] == 'Seven' )?'selected':''; ?>>VII</option>
                    <option value="Eight" <?php echo ( isset($row['class']) && $row['class'] == 'Eight' )?'selected':''; ?>>VIII</option>
                    <option value="Nine" <?php echo ( isset($row['class']) && $row['class'] == 'Nine' )?'selected':''; ?>>IX</option>
                    <option value="Ten" <?php echo ( isset($row['class']) && $row['class'] == 'Ten' )?'selected':''; ?>>X</option>
                </select>
            </td>
            <td>Section</td>
            <td>
                <select name="stud_section">
                    <option value="select" <?php echo (!isset($row['section']))?'selected':''; ?>>Select</option>
                    <option value="A" <?php echo ( isset($row['section']) && $row['section'] == 'A' )?'selected':''; ?>>A</option>
                    <option value="B" <?php echo ( isset($row['section']) && $row['section'] == 'B' )?'selected':''; ?>>B</option>
                    <option value="C" <?php echo ( isset($row['section']) && $row['section'] == 'C' )?'selected':''; ?>>C</option>
                    <option value="D" <?php echo ( isset($row['section']) && $row['section'] == 'D' )?'selected':''; ?>>D</option>
                    <option value="E" <?php echo ( isset($row['section']) && $row['section'] == 'E' )?'selected':''; ?>>E</option>
                </select>
            </td>
             <td>&nbsp;</td>
            </tr>

            <tr>
            <td>Roll</td>
            <td>
                <input type="number" name="stud_roll" value="<?php echo ($row['roll'])?$row['roll']:''; ?>"/>
            </td>
            <td>Status</td>
            <td>
                <select name="stud_status">
                    <option value="pursuing" <?php echo ( isset($row['status']) && $row['status'] == 'pursuing' )?'selected':''; ?>>Pursuing</option>
                    <option value="passed" <?php echo ( isset($row['status']) && $row['status'] == 'passed' )?'selected':''; ?>>Passed</option>
                    <option value="left" <?php echo ( isset($row['status']) && $row['status'] == 'left' )?'selected':''; ?>>Left</option>
                    <option value="TC" <?php echo ( isset($row['status']) && $row['status'] == 'TC' )?'selected':''; ?>>TC</option>
                </select>
            </td>

            <?php } } ?>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
                                    
                <tr><td colspan="4">&nbsp;</td></tr>
                <tr>
                    <td><input type="submit" value="Update" name="stud_update"></td>
                    <td><input type="reset" value="Reset" name="reset"></td>
                    <td><input type="button" value="Back" name="back" onclick="back_page()"></td>
                </tr>
            </table>
        </form>
    </html> 