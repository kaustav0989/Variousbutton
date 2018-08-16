<?php
    include("../model/teacher_list.php"); 
    require_once('general_functions.php'); 
    include("login_check.php");
    
    $page     = "Teacher";
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
       if( $class != '' )
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
       // $state_id = $obj->state($st_val); 
       /* if( $state_id == 0 )
        {
          throw new Exception($obj->conn->error());
          
        }*/
        $spd_col .="`i_state_id`,"; 
        $spd_val .="{$st_val},";
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
      if( $sec != '' )
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
      $obj             = new ShowList();
      $data            = $obj->allstate();
      $_SESSION['add'] = $data;
      require_once("../view/add_student.php");
  } 
  #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  #         ADD SECTION [END]
  #~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~                   