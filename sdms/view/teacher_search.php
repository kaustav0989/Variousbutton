<?php  
    include("header.php");

    session_start();
  ?>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://localhost/sdms/resources/js/page_loader.js"></script>
    <script type="text/javascript">
      function reset_form()
      {
        document.getElementById('teacher_search_reset').submit();
      }

      function add_page()
      {
        window.location.href = '<?php echo $url; ?>/controller/all_teacher_details.php?page=add';
      }
      function edit_page(elem)
      {
         var id = elem.getAttribute('id').split('_').pop();
         window.location.href="<?php echo $url; ?>/controller/all_teacher_details.php?page=edit&stud_id="+id;
      }
      function delete_page(elem)
      {
         if( confirm("Do you want to delete?") )
         {
            var id = elem.getAttribute('id').split('_').pop();
            window.location.href="<?php echo $url; ?>/controller/all_teacher_details.php?page=delete&stud_id="+id;  
         }
         else
            return false;
      }
      function view_page(elem)
      {
          var id = elem.getAttribute('id').split('_').pop();
          window.location.href="<?php echo $url; ?>/controller/all_teacher_details.php?page=view&stud_id="+id;
      }
    </script>
        
        <?php echo show_msg(); ?>

        <form id="teacher_search_reset" method="post" action=""></form>
        <form id="stud_search" method="post" action="" align="left">
            <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
              <tr>
               <td>Name:</td> 
               <td><input type="text" name="teacher_name" value="<?php echo ($_POST['teacher_name'])?$_POST['teacher_name']:''; ?>"></td>
                <td>Age:</td>      
                <td><input type="number" name="teacher_age" value="<?php echo ($_POST['teacher_age'])?$_POST['teacher_age']:''; ?>"></td>
              </tr>
              <tr>
                <td>Gender:</td>  
                <td>
                  <select name="teacher_gender">
                    <option value='' <?php echo (!isset($_POST['teacher_gender'])) ?'selected':''; ?>>Select</option>
                    <option value="Male" <?php echo ( isset($_POST['teacher_gender']) && $_POST['teacher_gender'] == 'Male') ?'selected':'';?>>Male</option>
                    <option value="Female" <?php echo ( isset($_POST['teacher_gender']) && $_POST['teacher_gender'] == 'Female') ?'selected':'';?>>Female</option>
                  </select> 
                </td>

                <td>Address:</td>  
                <td><input type="text" name="teacher_address" value="<?php echo ($_POST['teacher_address'])?$_POST['teacher_address']:''; ?>">
                </td>

                <td>Contact:</td>  
                <td><input type="text" name="teacher_contact" value="<?php echo ($_POST['teacher_contact'])?$_POST['teacher_contact']:''; ?>">
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
            <th>Teacher Id</th>
            <th>Name</th>
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
                  <td><?php echo $row['name'];?> </td>
                  <td><?php echo $row['age'];?> </td>
                  <td><?php echo $row['gender'];?> </td>
                  <td><?php echo $row['address'];?> </td>
                  <td><?php echo $row['contact'];?> </td>
                  <td>
                    <input type="button" name="teacher_edit" id="teacher_edit_<?php echo encrypt( $row["ID"] ) ?>" value="Edit" onclick="edit_page(this)"></td> 
                   <td> 
                      <input type="button" name="teacher_delete" id="teacher_delete_<?php echo encrypt( $row["ID"] ) ?>" value="Delete" onclick="delete_page(this)">
                   </td>
                   <td>
                      <input type="button" name="teacher_view" id="teacher_view_<?php echo encrypt( $row["ID"] ) ?>" value="View" onclick="view_page(this);"></td>  
    </tr> 
    <?php
            }
          }  
          else{
    ?>
    <tr><td colspan="6"> No data found</td></tr>
          <?php
            }
          ?>
        </table>
      </td>
    </tr>
  </table>