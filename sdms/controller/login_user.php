<?php
//    ini_set("display_errors", 1);
    session_start();
//    include("../view/header.php");    
    //include("../model/fetch_users.php");
    include("../model/show_list.php");
    include("general_functions.php");
   
    if(isset($_REQUEST["submit"])){
        $user=$_POST["user_name"];
        $pwd=$_POST["user_password"];

        //$object = new FetchUsers($user, $pwd);
        $obj = new ShowList();
        if( $obj->fetch($user,$pwd) )
        {
            $_SESSION["user_name"]=$user;
            $_SESSION["islogin"]=1;

            header("location:dashboard.php");
            exit;
        }
        else
        {
            set_msg("wrong user_id or password",'error');
            header("location:../index.php");
            exit;
        }    
}   
?>
