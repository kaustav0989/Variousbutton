      
<?php

    include("mysqlcon.php");  
    include("login_check.php");
    
    $page     = "Student";
    $breadcum = '<a href="dashboard.php">Dashboard</a>&nbsp;>>&nbsp; 
                  <a href="all_student_details.php">Student</a>&nbsp;&nbsp;'; 


    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         ADD SECTION [START]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    if( (isset( $_POST["page"] ) && $_POST["page"]=="add") || (isset( $_GET["page"]) && $_GET["page"]=="add"))
    {
      $breadcum .= '>> Add';
     if(isset($_POST["Add_save"]) && $_POST["Add_save"]="save")
      {
        $col="";
        $val="";
        foreach ($_POST as $key => $value) {
            if($_POST[$key]!=" " && $_POST[$key]!="save")
            {
              $col.=" `$key`,";
              $val.=" '$value',";
            }
        }
        $column = trim($col,",");
        $value  = trim($val,",");
        $sql    = "INSERT INTO Stud_table1($column) values($value)";
      //  echo $sql; exit;

        $retval = mysqli_query($conn,$sql);

        if( $retval )
        {
          $id = mysqli_insert_id($conn);
          if(isset( $_FILES['image'] ) )
          {
              $name       = $_FILES['image']['name'];
              $tmp_name   = $_FILES['image']['tmp_name'];
              $type       = $_FILES['image']['type'];
             
              $size       = $_FILES['image']['size'];
              $extension  = strtolower(end(explode('.',$_FILES['image']['name'])));

              if( !empty( $name ) )
              {
                  $ext_arr = array('jpg','jpeg','gif','png');
                  $type    = reset(explode('/',$type));

                  if( (in_array($extension, $ext_arr)) && strtolower($type) == 'image' )
                  {
                      $file_name  = 'profile_'.$id.'.'.$extension; 
                      $location   = "Uploaded/";
                      
                      if( move_uploaded_file($tmp_name , $location.$file_name) )
                      {

                          $updt_img = "UPDATE Stud_table1 SET img_name = '".$file_name."' WHERE stud_id = ".$id;
                        
                          if( mysqli_query($conn,$updt_img) < 1 )
                          {
                              set_msg('Failed to update image. Please try again later', 'error'); 
                          }
                      }
                      else
                      {
                        set_msg('Failed to upload image. Please try again later', 'error');
                      }
                  }
              }                    
          }
          set_msg('Data added successfully.', 'success'); 
          header("location:all_student_details.php?page=edit&stud_id=".(encrypt($id)));
          exit;
        }
        else
        {
          set_msg('Failed to save data. Please try again later', 'error'); 
          header("location:all_student_details.php?page=add");
          exit;
        }
      }

        include("html/add_student.php");
    } 
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         ADD SECTION [END]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 

    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         EDIT SECTION [START]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    elseif( (isset( $_POST["page"] ) && $_POST["page"]=="edit") || (isset( $_GET["page"]) && $_GET["page"]=="edit")) 
    {
        $breadcum .= '>> Edit';

         if( isset($_POST['stud_update']) && $_POST['stud_update'] == 'Update' && isset($_POST['id_hidden']) && is_numeric(decrypt($_POST['id_hidden'])) )
         {

              $exception_arr = array('id_hidden','stud_update', 'page');

              $set = [];

              foreach($_POST As $key=>$val)
              {
                if(!in_array( $key, $exception_arr )  )
                $set[] = $key ."='".$val."'";
              }

              $set = implode(', ',$set);


              $sql='UPDATE `Stud_table1` SET '.$set.' WHERE stud_id='. (decrypt($_POST['id_hidden']));
              $retval = mysqli_query($conn,$sql); 
              if( $retval > 0 )
             // if(mysqli_affected_rows($conn) > 0)
              {     
                    if(isset( $_FILES['image'] ) )
                    {
                          $name       = $_FILES['image']['name'];
                          $tmp_name   = $_FILES['image']['tmp_name'];
                          $type       = $_FILES['image']['type'];
                         
                          $size       = $_FILES['image']['size'];
                          $extension  = strtolower(end(explode('.',$_FILES['image']['name'])));

                          if( !empty( $name ) )
                          {
                              $ext_arr = array('jpg','jpeg','gif','png');
                              $type    = reset(explode('/',$type));

                              if( (in_array($extension, $ext_arr)) && strtolower($type) == 'image' )
                              {
                                  $file_name  = 'profile_'.decrypt($_POST['id_hidden']).'.'.$extension; 
                                  $location   = "Uploaded/";
                                  
                              if( file_exists( $file_name ) )
                                {
                                  unlink($file_name);
                  
                                }  
                                if( move_uploaded_file($tmp_name , $location.$file_name) )
                                {

                                      $updt_img = "UPDATE `Stud_table1` SET `img_name` = '".$file_name."' WHERE
                                      `stud_id` = ".decrypt($_POST['id_hidden']);
                                     
                                     mysqli_query($conn,$updt_img);
                                }
                              }
                          }
                    }
                    set_msg('Data updated successfully', 'success');   
                    header("Location: all_student_details.php?page=edit&stud_id=".$_POST['id_hidden']);
                    exit;            
              }        
              else
              {
                  set_msg('Nothing to update.', 'error'); 
                  header("Location: all_student_details.php?page=edit&stud_id=".$_POST['id_hidden']);
                  exit;
              }

      }    
      elseif(isset( $_GET["stud_id"] ) && is_numeric( decrypt( $_GET["stud_id"] ) ) )
      {
         $id      = decrypt( $_GET["stud_id"] );
         $sql     = "SELECT * FROM Stud_table1 where stud_id='$id'";
         $retval  = mysqli_query($conn,$sql);
         include("html/edit_student.php"); 
      } 
      else
      header("location:all_student_details.php");
  } 
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         EDIT SECTION [END]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         DELETE SECTION [START]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
    elseif( (isset( $_POST["page"] ) && $_POST["page"]=="delete") || (isset( $_GET["page"]) && $_GET["page"]=="delete")) 
    {
        if( isset($_GET["stud_id"]) && is_numeric(decrypt($_GET["stud_id"])) )
        {
            $id     =  decrypt($_GET["stud_id"]);
            $sql    =  "DELETE FROM Stud_table1 WHERE `stud_id` = {$id}";
            $retval =  mysqli_query($conn,$sql);
            if( $retval )
            {   
                set_msg('Data deleted successfully','success');
                header( "location: all_student_details.php" );
                exit;
            }  
            else
            {
                set_msg( "Not deleted", 'error' );
                header("location:all_student_details.php");
                exit;
            }
        }      
    }  
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         DELETE SECTION [END]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         VIEW SECTION [START]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     elseif( (isset( $_POST["page"] ) && $_POST["page"]=="view") || (isset( $_GET["page"]) && $_GET["page"]=="view"))
     {
        $breadcum .= '>> View';
        if(isset( $_GET["stud_id"] ) && is_numeric( decrypt( $_GET["stud_id"] ) ) )
        {
            $id      = decrypt( $_GET["stud_id"] );
            $sql     = "SELECT * FROM Stud_table1 where stud_id='$id'";
            $retval  = mysqli_query($conn,$sql);  
            include("html/view_student.php"); 
        }  
        else
        {
            header('Location:all_student_details.php');
            exit;
        }
     } 

    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         VIEW SECTION [END]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~   
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         LIST SECTION [START]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
    
    else
    {

        $breadcum       .= '>> List';  
        $pagination     = '';
        $default_limit  = 5;
        $start_page     = 0;

        if( isset($_GET['start_page']) && $_GET['start_page'] != '' )
        {

          $start_page = $_GET['start_page'];
        }
      //  $limit = " LIMIT ".$start_page.", ".$default_limit;

        $where = "WHERE 1 ";  

        if( isset( $_POST["search"] ) )
        {
          
          $start_page=0;

          foreach( $_POST as $key=>$val )
          {
            if( $_POST[$key]!="" && $_POST[$key]!="Search" )
            {
             $where.=" AND $key='{$val}'";
            /*  if($_POST["stud_fname"]!="")
              {
                $where.=" AND stud_fname LIKE '{$val}%'"
              }
              if($_POST["stud_lname"]!="")
              {
                $where.=" AND stud_lname LIKE '{$val}%'"
              }
              else
                $where.=" AND Skey='{$val}'";*/
            }     
          }
        }

        $limit = " LIMIT ".$start_page.", ".$default_limit;

        $sql2 = " SELECT count(1) As tot FROM `Stud_table1` ".$where;
        $tot  = mysqli_query($conn,$sql2);
        $tot  = mysqli_fetch_assoc($tot);

        $total_data = $tot['tot'];

        //print_r($_SERVER);

        $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];

       
        $pagination = get_pagination($total_data, $default_limit, $start_page, $path);


        $sql = " SELECT * FROM `Stud_table1` ".$where.$limit;      
        $retval = mysqli_query($conn,$sql);

       
        include("html/student_search.php");
    }
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         LIST SECTION [END]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
?>