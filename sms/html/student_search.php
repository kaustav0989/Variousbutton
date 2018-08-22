
  <?php  include("header.html");
  //       include("general_functions.php"); 
  ?>
  

    <script type="text/javascript">
      function reset_form()
      {
        //alert("h");
      document.getElementById('student_search_reset').submit();
      /*  var x=confirm("Do you want to reset");
        if(x)
        {
          return true;
        }  
        else
          return false;*/
      }

      function add_page()
      {
        window.location.href = 'all_student_details.php?page=add';
      }
      function edit_page(elem)
      {
         var id = elem.getAttribute('id').split('_').pop();
         window.location.href="all_student_details.php?page=edit&stud_id="+id;
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
      function view_page(elem)
      {
          var id = elem.getAttribute('id').split('_').pop();
          window.location.href="all_student_details.php?page=view&stud_id="+id;
      }
    </script>
        
        <?php echo show_msg(); ?>

        <form id="student_search_reset" method="post" action=""></form>
        <form id="stud_search" method="post" action="" align="left">
            <table width="480px" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
              <tr>
                <td>Firstname:</td>
                <td><input type="text" name="stud_fname" value="<?php echo ($_POST['stud_fname'])?$_POST['stud_fname']:''; ?>"></td>
               <td>Lastname:</td> 
               <td><input type="text" name="stud_lname" value="<?php echo ($_POST['stud_lname'])?$_POST['stud_lname']:''; ?>"></td>
               <td>Class:</td> 
               <td>
                  <select name="stud_class">
                      <option value='' <?php echo (!isset($_POST['stud_class']))?'selected':''; ?>>Select</option>
                      <option value="5" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == '5' )?'selected':''; ?> >Five</option>
                      <option value="6" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == '6' )?'selected':''; ?>>Six</option>
                      <option value="7" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == '7' )?'selected':''; ?>>seven</option>
                      <option value="8" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == '8' )?'selected':''; ?>>eight</option>
                      <option value="9" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == '9' )?'selected':''; ?>>nine</option>
                      <option value="10" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == '10' )?'selected':''; ?>>ten</option>
                  </select>
                </td>
              
                <td>Roll:</td>     
                <td><input type="number" name="stud_roll" value="<?php echo ($_POST['stud_roll'])?$_POST['stud_roll']:''; ?>"></td>
              </tr>
              <tr>
                <td>Section:</td>  <td><input type="text" name="stud_section" value="<?php echo ($_POST['stud_section'])?$_POST['stud_section']:''; ?>"></td>
                <td>Age:</td>      
                <td><input type="number" name="stud_age" value="<?php echo ($_POST['stud_age'])?$_POST['stud_age']:''; ?>"></td>
             
                <td>DOB:</td>      
                <td><input type="date" name="stud_dob" max="2020-12-31" value="<?php echo ($_POST['stud_dob'])?$_POST['stud_dob']:''; ?>"></td>
                <td>Address:</td>  <td><input type="text" name="stud_address" value="<?php echo ($_POST['stud_address'])?$_POST['stud_address']:''; ?>"></td>
              </tr>
              <tr>
                <td>Parent Name:</td>   <td><input type="text" name="stud_parent" value="<?php echo ($_POST['stud_parent'])?$_POST['stud_parent']:''; ?>"></td>
              
                <td>Guardian:</td>  
                <td>
                  <select name="stud_guardian_type">
                    <option value='' <?php echo (!isset($_POST['stud_status'])) ?'selected':''; ?>>Select</option>
                    <option value="father" <?php echo ( isset($_POST['stud_status']) && $_POST['stud_status'] == 'father') ?'selected':'';?>>father</option>
                    <option value="mother" <?php echo ( isset($_POST['stud_status']) && $_POST['stud_status'] == 'mother') ?'selected':'';?>>mother</option>
                  </select> 
                </td>
                <td>Guardian Name:</td> 
                <td><input type="text" name="stud_guardian" value="<?php echo ($_POST['stud_guardian'])?$_POST['stud_guardian']:''; ?>"></td>  
                <td>Status:   </td>
                <td>
                  <select name="stud_status">
                    <option value='' <?php echo (!isset($_POST['stud_status'])) ?'selected':'';?>>Select</option>
                    <option value="active" <?php echo ( isset($_POST['stud_status']) && $_POST['stud_status'] == 'active') ?'selected':'';?>>active</option>
                    <option value="left" <?php echo ( isset($_POST['stud_status']) && $_POST['stud_status'] == 'left') ?'selected':'';?>>left</option>
                    <option value="tc" <?php echo ( isset($_POST['stud_status']) && $_POST['stud_status'] == 'tc') ?'selected':'';?>>TC</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><input type="submit" value="Search" name="search"></td>
                <td><input type="reset" value="Reset"  onclick="javascript:reset_form();"></td>
                <td colspan="5" align="right"><input type="button" value="Add" name="add" onclick="add_page()"></td>
                <td align="center" style="color: #ea0606;border: 1px solid #ffc8cb;background-color: #ffe5e5;">Total Records: <?php echo $total_data;?></td>
              </tr>
            </table>
        </form>
        <table align="center" border="0" cellpadding="3" cellspacing="2">
          <tr>
            <td align="center"><?php echo $pagination; ?>&nbsp;
            </td>
          </tr>
        </table>

        <table align='center' border='1' cellpadding="2" cellspacing="1" rules="all">
          <tr style="background-color: #ffe7e1; color: #ff5959;">
            <th>Student Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Class</th>
            <th>Roll</th>
            <th>Section</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Parent Name</th>
            <th>Guardian Type</th>
            <th>Guardian Name</th>
            <th>Status</th>
            <th colspan='3'>Operation</th>
          </tr> 
    <?php
        if( mysqli_num_rows($retval) > 0 )
            {   
              $even = 0;
              while($row = mysqli_fetch_assoc($retval))
              {
                 if( empty($row['img_name']) )
                 {
                    if($row['stud_gender']=='male')
                      $image = 'no_image.png';
                    else
                      $image = 'no-avatar-female.png';
                 } 
                 else
                 {
                    $image = $row['img_name'];
                 } 

    ?>

    <tr style="background-color:<?php echo (($even++) % 2 == 0)?'#efeff0;':'#fff;'; ?> color:#3e3e3e;" >
                  <td><?php echo $row['stud_id']; ?>
                       <img src="Uploaded/<?php echo $image; ?>" align="right" style='width: 20px;height: 20px;border: 1px solid #000;' />
                  </td>
                  <td><?php echo $row['stud_fname']; ?></td>
                  <td><?php echo $row['stud_lname']; ?></td>
                  <td><?php echo $row['stud_class'];?> </td>
                  <td><?php echo $row['stud_roll'];?> </td>
                  <td><?php echo $row['stud_section'];?> </td>
                  <td><?php echo $row['stud_dob'];?> </td>
                  <td><?php echo $row['stud_age'];?> </td>
                  <td><?php echo $row['stud_gender'];?> </td>
                  <td><?php echo $row['stud_address'];?> </td>
                  <td><?php echo $row['stud_parent'];?> </td>
                  <td><?php echo $row['stud_guardian_type'];?> </td>
                  <td><?php echo $row['stud_guardian'];?> </td>
                  <td><?php echo $row['stud_status'];?> </td>
                  <td>
                    <input type="button" name="stud_edit" id="stud_edit_<?php echo encrypt( $row["stud_id"] ) ?>" value="Edit" onclick="edit_page(this)"></td> 
                   <td> 
                      <input type="button" name="stud_delete" id="stud_edit_<?php echo encrypt( $row["stud_id"] ) ?>" value="Delete" onclick="delete_page(this)">
                   </td>
                   <td>
                      <input type="button" name="stud_view" id="stud_view_<?php echo encrypt( $row["stud_id"] ) ?>" value="View" onclick="view_page(this);"></td>  
    </tr> 
    <?php
              }
            }
            else{
    ?>
    <tr><td colspan="14"> No data found</td></tr>
          <?php
            }
          ?>
        </table>
      </td>
    </tr>


  </table>

                   