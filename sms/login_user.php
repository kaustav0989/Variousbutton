<?php
    session_start();
 //   include("login_reset.php");
    include("header.html");    
    include("mysqlcon.php");
    
   
    if(isset($_REQUEST["submit"])){
        $user=$_POST["user_name"];
        $pwd=$_POST["user_password"];
        if($user!="" || $pwd!=""){
           $sql = "SELECT * FROM `user_details_table1` 
                    WHERE `user_id` = '". (addslashes($user))."' 
                    AND `user_password` = '".(addslashes($pwd))."' ";

            $check=mysqli_query($conn,$sql);
            if($check){
                if(mysqli_num_rows($check)>0){
                    $_SESSION["user_name"]=$user;
                    $_SESSION["islogin"]=1;
                    //set_msg('Logged in successfully','success');
                    header("location:dashboard.php");
                }
                else{
                    set_msg("wrong user_id or password",'error');
                    header("location:index.php");
                    exit;
                }
            }
        }
        
     }    
?>
