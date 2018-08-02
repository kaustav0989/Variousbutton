<?php 
 //   ini_set("display_errors", 1);
    include("header.html"); 
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
            window.location.href="all_student_details.php";
        }

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
    </script>    
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
                <td><b>Firstname</b></td>
            <td>
                <?php echo $row['firstname'];?>
            </td>
            <td><b>Lastname</b></td>
            <td>
                <?php echo $row['lastname'];?>
            </td>
            <td><b>Fathername</b></td>
            <td>
                <?php echo $row['father'];?>
            </td>   
                 <td align="center" rowspan="2" style="padding-right: 60px;" >
                    <img src="../Uploaded/<?php echo $image; ?>" align="left" style="height:150px; width:150px; border: 1px solid #000;" />    
                </td>
                                                     
            </tr>
            <tr>
                    
                <td><b>Mothername:</b></td>
            <td>
                <?php echo $row['mother'];?>
            </td>
            <td><b>Gender:</b></td>
            <td>
                    <?php echo $row['gender']; ?>
            </td>
            <td><b>Date of Birth</b></td>
            <td>
                <?php echo $row['dob']; ?>
            </td>
            </tr>

            <tr>
            <td><b>Contact Number</b></td>
            <td>
                <?php echo ($row['contact']); ?>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <tr bgcolor="#A9A9A9">
                <td colspan="8">Student Address Details</td>
            </tr>
            <tr>
            <td><b>Address</b></td>
            <td>
                <?php echo $row['address'];?>
            </td>
            <td><b>City</b></td>
            <td>
                <?php echo ($row['city']); ?>
            </td>
            <td><b>State</b></td>
            <td>
                <?php echo ($row['state']); ?>
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td><b>Pin</b></td>
            <td>
                <?php echo ($row['pin']); ?>
            </td>
            </tr>
            <tr bgcolor="#A9A9A9">
                <td colspan="8">Student Registration Details</td>
            </tr>               
            <tr>                    
            <td><b>Year</b></td>
            <td>
                <?php echo $row['year']; ?> 
            </td>
            <td><b>Class</b></td>
            <td>
                 <?php echo $row['class']; ?>
            </td>
            <td><b>Section</b></td>
            <td>
               <?php echo $row['section']; ?>
            </td>
             <td>&nbsp;</td>
            </tr>

            <tr>
            <td><b>Roll</b></td>
            <td>
                <?php echo ($row['roll']); ?>
            </td>
            <td><b>Status</b></td>
            <td>
                <?php echo $row['status']; ?>
            </td>

            <?php } } ?>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
                                    
                <tr><td colspan="4">&nbsp;</td></tr>
                <tr>
                    <td><input type="button" value="Back" name="back" onclick="back_page()"></td>
                    <td><input type="button" name="stud_delete" id="stud_edit_<?php echo encrypt( $row["ID"] ) ?>" value="Delete" onclick="delete_page(this)"></td>
                </tr>
            </table>
        </form>
    </html>    