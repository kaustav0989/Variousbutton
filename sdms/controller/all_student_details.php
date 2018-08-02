      
<?php

//    ini_set("display_errors",1);
//    include("../model/Add.php");
    include("../model/show_list.php");
//    include("../model/Add.php");
//    $obj = new BaseController(); 
    require_once('general_functions.php'); 
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
      
        $obj = new Showlist();

      $fname   = $_POST['stud_fname'];
      $lname   = $_POST['stud_lname'];
      $father  = $_POST['father_name'];
      $mother  = $_POST['mother_name'];
      $dob     = $_POST['stud_dob'];
      $class   = $_POST['stud_class'];
      $status  = $_POST['stud_status'];
      $year    = $_POST['stud_year']; 
      $roll    = $_POST['stud_roll'];
      $sec     = $_POST['stud_section'];
      $gender  = $_POST['stud_gender'];
      $address = $_POST['stud_address'];
      $city    = $_POST['stud_city'];
      $state   = $_POST['stud_state'];
      $pin     = $_POST['stud_pin'];  
      $contact = $_POST['stud_contact'];
      $spd_col ='';
      $spd_val ='';
      $scl_val ='';
      $scl_col ='';



      try
      {  

        $obj->off();
        $obj->TransactionBegin();


         if( $class != 'select' )
        {
          $cl_val   = "'$class'";
          $class_id = $obj->class($cl_val);
          if( $class_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }  
          $scl_val .= "'$class_id',";
          $scl_col .= "`i_class_id`,";
        }  
        
        if( $status != '' )
        {
          $status_val = "'$status'";
          $status_id  = $obj->status($status_val);
          if( $status_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }
          $scl_val   .="'$status_id',";
          $scl_col   .= "`i_status_id`,";
        }  

        if( $state != '' )
        {
          $st_val   = "'$state'";
          $state_id = $obj->state($st_val); 
          if( $state_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }
          $spd_col .="`i_state_id`,"; 
          $spd_val .="'{$state_id}',";
        }

        if( $city != '' )
        {
          $ct_val  = "'$city'";
          $city_id = $obj->city($ct_val);
          if( $city_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }  
          $spd_col .="`i_city_id`,";
          $spd_val .="'{$city_id}',";

        }

        if( $year != '' )
        {
          $year_val .= "'$year'";  
          $year_id   = $obj->year($year_val);
          if( $year_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }
          $scl_val  .= "'$year_id',";
          $scl_col  .= "`i_year_id`,";
        }

        if( $sec != 'select' )
        {
          $sec_val .= "'$sec'";
          $sec_id   =$obj->sec($sec_val);
          if( $sec_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }
          $scl_val .="'$sec_id',";
          $scl_col .="`i_secion_id`,";
        }  

        if( $pin != '' )
        {
          $pin_val = "'$pin'";
          $pin_id  = $obj->pin($pin_val);
          if( $pin_id == 0 )
          {
            throw new Exception($obj->conn->error());
            
          }
          $spd_col .="`i_pin_id`,";
          $spd_val .="'{$pin_id}',";
        }

        if( $fname != '' )
        {
          $spd_col .= "`s_stud_fname`,";
          $spd_val .=  "'$fname',";
        }
  
        if( $lname != '' )
        {
          $spd_col .= "`s_stud_lname`,";
          $spd_val .=  "'$lname',";
        }

        if( $father != '' )
        {
          $spd_col .= "`s_stud_father`,";
          $spd_val .=  "'$father',";
        }

        if( $mother != '' )
        {
          $spd_col .= "`s_stud_mother`,";
          $spd_val .=  "'$mother',";
        }

        if( $dob != '' )
        {
          $spd_col .= "`dt_stud_dob`,";
          $spd_val .=  "'$dob',";
        }

        if( $gender != 'select' )
        {
          $spd_col .= "`s_stud_gender`,";
          $spd_val .=  "'$gender',";
        }

        if( $address != '' )
        {
          $spd_col .= "`s_stud_address`,";
          $spd_val .=  "'$address',";
        }

        if( $contact != '' )
        {
          $spd_col .= "`s_stud_contact`,";
          $spd_val .=  "'$contact',";
        }

        if( $roll != '' )
        {
          $scl_col  .= "`i_roll_no`,";
          $scl_val  .= "'$roll',";
        }  

        $spd_col = trim($spd_col,",");
        $spd_val = trim($spd_val,",");
       

        $stud_id = $obj->total($spd_col,$spd_val);

        if( $stud_id == 0 )
        {
          throw new Exception($obj->conn->error());
        }  

        $scl_col .="`i_student_id`,";
        $scl_val .="'$stud_id',";

        $scl_col = trim($scl_col,",");  
        $scl_val = trim($scl_val,",");
        
        $retval  = $obj->sub($scl_col,$scl_val);
        #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        if( $retval )
        {
          
              if(isset( $_FILES['file_name'] ) )
              {

                  $name       = $_FILES['file_name']['name'];

                  $tmp_name   = $_FILES['file_name']['tmp_name'];

                  $type       = $_FILES['file_name']['type'];
                
                  $size       = $_FILES['file_name']['size'];
                  $extension  = strtolower(end(explode('.',$_FILES['file_name']['name'])));
                  
                  if( !empty( $name ) )
                  {  

                      $ext_arr = array('jpg','jpeg','gif','png');
                      $type    = reset(explode('/',$type));

                      if( (in_array($extension, $ext_arr)) && strtolower($type) == 'image' )
                      {
                           $file_name  = 'profile_'.$stud_id.'.'.$extension; 
                            $location   = "../Uploaded/";
                          
                          if( move_uploaded_file($tmp_name , $location.$file_name) )
                          {

                               $obj->image($file_name,$stud_id);
                          }
                          else
                          {
                            set_msg('Failed to upload image. Please try again later', 'error');
                          }
                      }
                  }
              } 
              
          set_msg('Data added successfully.', 'success'); 
          //change//
          header("location:all_student_details.php?page=edit&stud_id=".(encrypt($stud_id)));
          //header("location:all_student_details.php?page=add");
          exit;             
        }
        
        else
        {
          set_msg('Failed to save data. Please try again later', 'error'); 
          header("location:all_student_details.php?page=add");
          exit;
        }  

      /*  if($retval)
        {
          set_msg('Data added successfully.', 'success'); 
          header("location:all_student_details.php?page=edit&stud_id=".(encrypt($id)));
          exit;
        }

        else
        {
          set_msg('Failed to save data. Please try again later', 'error'); 
          header("location:all_student_details.php?page=add");
          exit;
        }*/

        $obj->Commit();
        $obj->TransactionEnd();
      }  

      catch(Exception $e)
      {
          $obj->Rollback();
          $obj->TransactionEnd();
          header("location:add_student.php");
          exit;
      }

    }

        require_once("../view/add_student.php");
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

            $fname   = $_POST['stud_fname'];
            $lname   = $_POST['stud_lname'];
            $father  = $_POST['father_name'];
            $mother  = $_POST['mother_name'];
            $dob     = $_POST['stud_dob'];
            $class   = $_POST['stud_class'];
            $status  = $_POST['stud_status'];
            $year    = $_POST['stud_year']; 
            $roll    = $_POST['stud_roll'];
            $sec     = $_POST['stud_section'];
            $gender  = $_POST['stud_gender'];
            $address = $_POST['stud_address'];
            $city    = $_POST['stud_city'];
            $state   = $_POST['stud_state'];
            $pin     = $_POST['stud_pin'];  
            $contact = $_POST['stud_contact'];

            $id = decrypt($_POST['id_hidden']);    

            $obj = new Showlist();


        
        $scl_col = array();
        $scl_val = array();

        $spd_col = array();
        $spd_val = array();  

         if( $class != 'select' )
        {
          $cl_val   = "'$class'";
          $class_id = $obj->class($cl_val);
  
          array_push($scl_val,"'$class_id'");
          array_push($scl_col,"`i_class_id`");
        }  
        
        if( $status != '' )
        {
          $status_val = "'$status'";
          $status_id  = $obj->status($status_val);

          array_push($scl_val,"'$status_id'");
          array_push($scl_col,"`i_status_id`");
        }


        if( $state != '' )
        {
          $st_val   = "'$state'";
          $state_id = $obj->state($st_val); 

          array_push($spd_col,"`i_state_id`"); 
          array_push($spd_val,"'{$state_id}'");
        }

        if( $city != '' )
        {
          $ct_val  = "'$city'";
          $city_id = $obj->city($ct_val);

          array_push($spd_col,"`i_city_id`");
          array_push($spd_val,"'{$city_id}'");

        }

        if( $year != '' )
        {
          $year_val .= "'$year'";  
          $year_id   = $obj->year($year_val);

          array_push($scl_val,"'$year_id'");
          array_push($scl_col,"`i_year_id`");
        }

        if( $sec != 'select' )
        {
          $sec_val .= "'$sec'";
          $sec_id   =$obj->sec($sec_val);

          array_push($scl_val,"'$sec_id'");
          array_push($scl_col,"`i_secion_id`");
        }  

        if( $pin != '' )
        {
          $pin_val = "'$pin'";
          $pin_id  = $obj->pin($pin_val);

          array_push($spd_col,"`i_pin_id`");
          array_push($spd_val,"'{$pin_id}'");
        }

        if( $fname != '' )
        {
          array_push($spd_col,"`s_stud_fname`");
          array_push($spd_val, "'$fname'");
        }
  
        if( $lname != '' )
        {
          array_push($spd_col,"`s_stud_lname`");
          array_push($spd_val, "'$lname'");
        }

        if( $father != '' )
        {
          array_push($spd_col,"`s_stud_father`");
          array_push($spd_val, "'$father'");
        }

        if( $mother != '' )
        {
          array_push($spd_col,"`s_stud_mother`");
          array_push($spd_val, "'$mother'");
        }

        if( $dob != '' )
        {
          array_push($spd_col,"`dt_stud_dob`");
          array_push($spd_val, "'$dob'");
        }

        if( $gender != 'select' )
        {
          array_push($spd_col,"`s_stud_gender`");
          array_push($spd_val, "'$gender'");
        }

        if( $address != '' )
        {
          array_push($spd_col,"`s_stud_address`");
          array_push($spd_val, "'$address'");
        }

        if( $contact != '' )
        {
          array_push($spd_col,"`s_stud_contact`");
          array_push($spd_val, "'$contact'");
        }

        if( $roll != '' )
        {
          array_push($scl_col ,"`i_roll_no`");
          array_push($scl_val ,"'$roll'");
        }

        //print_r($spd_val); exit;
        foreach ($spd_col as $k=>$col) {

            $set[] = $col ."=".$spd_val[$k];
          }

          $set = implode(', ',$set);

        foreach ($scl_col as $k=>$col) {

            $updt[] = $col ."=".$scl_val[$k];
          }

          $updt = implode(', ',$updt);


        $result = $obj->totalUpdate($set,$id);

        if( $result )
        {
          $retval  = $obj->subUpdate($updt,$id);

          if( $retval > 0 )
          {
            //echo "hello";
            if(isset( $_FILES['file_name'] ) )
              {

                  $name       = $_FILES['file_name']['name'];

                  $tmp_name   = $_FILES['file_name']['tmp_name'];

                  $type       = $_FILES['file_name']['type'];
                
                  $size       = $_FILES['file_name']['size'];
                  $extension  = strtolower(end(explode('.',$_FILES['file_name']['name'])));
                  
                  if( !empty( $name ) )
                  {  

                      $ext_arr = array('jpg','jpeg','gif','png');
                      $type    = reset(explode('/',$type));

                      if( (in_array($extension, $ext_arr)) && strtolower($type) == 'image' )
                      {
                           $file_name  = 'profile_'.$id.'.'.$extension; 
                            $location   = "../Uploaded/";

                             if( file_exists( $file_name ) )
                                {
                                  unlink($file_name);
                  
                                }
                          
                          if( move_uploaded_file($tmp_name , $location.$file_name) )
                          {

                               $obj->image($file_name,$id);
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
                  set_msg('Nothing to update.', 'error'); 
                  header("Location: all_student_details.php?page=edit&stud_id=".encrypt($id));
                  exit;
          }
        }    
        
              /*
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
                                  $location   = "../Uploaded/";
                                  
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
              */

      }    
      elseif(isset( $_GET["stud_id"] ) && is_numeric( decrypt( $_GET["stud_id"] ) ) )
      {
         $id      = decrypt( $_GET["stud_id"] );
        /* $sql     = "SELECT * FROM `Personal_details` where `i_stud_id`='$id'";
         $retval  = mysqli_query($conn,$sql);
         */
         $object1 = new ShowList();
         $datas = $object1->showeditlist($id);
         $_SESSION['edit'] = $datas;
         include("../view/edit_student.php"); 
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
            include("../view/view_student.php"); 
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

        $where = "WHERE 1 ";

       if( isset( $_POST["search"] ) )
        {

          $start_page = 0;

          $fname   = $_POST['stud_fname'];
          $lname   = $_POST['stud_lname'];
          $class   = $_POST['stud_class'];
          $roll    = $_POST['stud_roll'];
          $sec     = $_POST['stud_section'];
          $age     = $_POST['stud_age'];
          $gender  = $_POST['stud_gender'];
          $address = $_POST['stud_address'];
          $contact = $_POST['stud_contact']; 
          

                if( $fname != '' )
                {
                  $where .= " AND spd.`s_stud_fname` LIKE '".$fname."%'";
                }
                if( $lname != '' )
                {
                  $where .= " AND spd.`s_stud_lname` LIKE '".$lname."%'";
                }
                if( $class != '' )
                {
                  $where .= " AND cl.s_name = '".$class."'";
                }
                if( $age != '' )
                {
                  $where .= " AND Year(CURRENT_DATE)-YEAR(spd.dt_stud_dob) = '".$age."'";
                }
               if( $roll != '' )
                {
                  $where .= " AND scl.i_roll_no = '".$roll."'";
                }
                if( $sec != '' )
                {
                  $where .= " AND sc.s_name = '".$sec."'";
                }
                if( $gender != '' )
                {
                  $where .= " AND spd.s_stud_gender = '".$gender."'";
                }
                if( $address != '' )
                {
                  $where .= " AND CONCAT(spd.s_stud_address,' ',ct.s_name,' ',st.s_name,' ',pn.s_no) LIKE '%".$address."%'";
                }
                if( $contact != '' )
                {
                  $where .= " AND spd.s_stud_contact = '".$contact."'";
                }   
    
        }

        $limit = " LIMIT ".$start_page.", ".$default_limit;
        

        $object1 = new ShowList();

        $total_data = $object1->pagination($where);

        $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];

       
        $pagination = get_pagination($total_data, $default_limit, $start_page, $path);

        $datas = $object1->showstudentlist($where,$limit);
        $_SESSION['data'] = $datas;
        include('../view/student_search.php');
}    
       
      
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    #         LIST SECTION [END]
    #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
?>