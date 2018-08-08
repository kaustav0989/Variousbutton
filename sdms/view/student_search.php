
  <?php  
    include("header.php");

    session_start();
  ?>
  

    <script type="text/javascript">
      function reset_form()
      {
        document.getElementById('student_search_reset').submit();
      }

      function add_page()
      {
        window.location.href = '<?php echo $url; ?>/controller/all_student_details.php?page=add';
      }
      function edit_page(elem)
      {
         var id = elem.getAttribute('id').split('_').pop();
         window.location.href="<?php echo $url; ?>/controller/all_student_details.php?page=edit&stud_id="+id;
      }
      function delete_page(elem)
      {
         if( confirm("Do you want to delete?") )
         {
            var id = elem.getAttribute('id').split('_').pop();
            window.location.href="<?php echo $url; ?>/controller/all_student_details.php?page=delete&stud_id="+id;  
         }
         else
            return false;
      }
      function view_page(elem)
      {
          var id = elem.getAttribute('id').split('_').pop();
          window.location.href="<?php echo $url; ?>/controller/all_student_details.php?page=view&stud_id="+id;
      }
    </script>
        
        <?php echo show_msg(); ?>

        <form id="student_search_reset" method="post" action=""></form>
        <form id="stud_search" method="post" action="" align="left">
            <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
              <tr>
                <td>Firstname:</td>
                <td><input type="text" name="stud_fname" value="<?php echo ($_POST['stud_fname'])?$_POST['stud_fname']:''; ?>"></td>
               <td>Lastname:</td> 
               <td><input type="text" name="stud_lname" value="<?php echo ($_POST['stud_lname'])?$_POST['stud_lname']:''; ?>"></td>
               <td>Class:</td> 
               <td>
                  <select name="stud_class">
                      <option value='' <?php echo (!isset($_POST['stud_class']))?'selected':''; ?>>Select</option>
                      <option value="Five" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == 'Five' )?'selected':''; ?> >Five</option>
                      <option value="Six" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == 'Six' )?'selected':''; ?>>Six</option>
                      <option value="Seven" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == 'Seven' )?'selected':''; ?>>seven</option>
                      <option value="Eight" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == 'Eight' )?'selected':''; ?>>eight</option>
                      <option value="Nine" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == 'Nine' )?'selected':''; ?>>nine</option>
                      <option value="Ten" <?php echo ( isset($_POST['stud_class']) && $_POST['stud_class'] == 'Ten' )?'selected':''; ?>>ten</option>
                  </select>
                </td>        
              </tr>
              <tr>
                <td>Section:</td> 
                <td>
                  <select name="stud_section">
                      <option value='' <?php echo (!isset($_POST['stud_section']))?'selected':''; ?>>Select</option>
                      <option value="A" <?php echo ( isset($_POST['stud_section']) && $_POST['stud_section'] == 'A' )?'selected':''; ?> >A</option>
                      <option value="B" <?php echo ( isset($_POST['stud_section']) && $_POST['stud_section'] == 'B' )?'selected':''; ?>>B</option>
                      <option value="C" <?php echo ( isset($_POST['stud_section']) && $_POST['stud_section'] == 'C' )?'selected':''; ?>>C</option>
                      <option value="D" <?php echo ( isset($_POST['stud_section']) && $_POST['stud_section'] == 'D' )?'selected':''; ?>>D</option>
                      </select>
                </td>
                
                <td>Roll:</td>     
                <td><input type="number" name="stud_roll" value="<?php echo ($_POST['stud_roll'])?$_POST['stud_roll']:''; ?>"></td>

                <td>Age:</td>      
                <td><input type="number" name="stud_age" value="<?php echo ($_POST['stud_age'])?$_POST['stud_age']:''; ?>"></td>
              </tr>
              <tr>
                <td>Gender:</td>  
                <td>
                  <select name="stud_gender">
                    <option value='' <?php echo (!isset($_POST['stud_gender'])) ?'selected':''; ?>>Select</option>
                    <option value="male" <?php echo ( isset($_POST['stud_gender']) && $_POST['stud_gender'] == 'male') ?'selected':'';?>>Male</option>
                    <option value="female" <?php echo ( isset($_POST['stud_gender']) && $_POST['stud_gender'] == 'female') ?'selected':'';?>>Female</option>
                  </select> 
                </td>

                <td>Address:</td>  
                <td><input type="text" name="stud_address" value="<?php echo ($_POST['stud_address'])?$_POST['stud_address']:''; ?>">
                </td>

                <td>Contact:</td>  
                <td><input type="text" name="stud_contact" value="<?php echo ($_POST['stud_contact'])?$_POST['stud_contact']:''; ?>">
                </td>
              </tr>
              <tr>
                <td><input type="submit" value="Search" name="search"></td>
                <td><input type="reset" value="Reset"  onclick="javascript:reset_form();"></td>
                <td colspan="3" align="right"><input type="button" value="Add" name="add" onclick="add_page()"></td>
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
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Contact</th>
            <th colspan='3'>Operation</th>
          </tr> 
    <?php

          if(!empty( $_SESSION['data'] )){
          foreach ($_SESSION['data'] as $row) {
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

    <tr style="background-color:<?php echo (($even++) % 2 == 0)?'#efeff0;':'#fff;'; ?> color:#3e3e3e;" >
                  <td><?php echo $row['ID']; ?>
                       <img src="../Uploaded/<?php echo $image; ?>" align="right" style='width: 20px;height: 20px;border: 1px solid #000;' />
                  </td>
                  <td><?php echo $row['firstname']; ?></td>
                  <td><?php echo $row['lastname'];?> </td>
                  <td><?php echo $row['class'];?> </td>
                  <td><?php echo $row['roll'];?> </td>
                  <td><?php echo $row['section'];?> </td>
                  <td><?php echo $row['age'];?> </td>
                  <td><?php echo $row['gender'];?> </td>
                  <td><?php echo $row['address'];?> </td>
                  <td><?php echo $row['contact'];?> </td>
                  <td>
                    <input type="button" name="stud_edit" id="stud_edit_<?php echo encrypt( $row["ID"] ) ?>" value="Edit" onclick="edit_page(this)"></td> 
                   <td> 
                      <input type="button" name="stud_delete" id="stud_edit_<?php echo encrypt( $row["ID"] ) ?>" value="Delete" onclick="delete_page(this)">
                   </td>
                   <td>
                      <input type="button" name="stud_view" id="stud_view_<?php echo encrypt( $row["ID"] ) ?>" value="View" onclick="view_page(this);"></td>  
    </tr> 
    <?php
            }
          }  
          else{
    ?>
    <tr><td colspan="11"> No data found</td></tr>
          <?php
            }
          ?>
        </table>
      </td>
    </tr>
  </table>

                   