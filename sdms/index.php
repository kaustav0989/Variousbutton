<style type="text/css">
.error_msg
{
    margin: 5px 0px;
    background-color: #fdeaed;
    border: 1px solid #f7c8c8;
    color: #fb0000;
    padding: 4px;
}
</style>
<?php
//include("login_check.php");
///include("html/header.html");
session_start();
if($_SESSION['islogin'] == 1){
    header('location:controller/dashboard.php');
}
include("controller/general_functions.php");
?>
<html>
    <head>
        <title>Student DBMS</title>
    </head>
    <h1 align="center"><font color="red"><b>Student Database Management System</b></font></h1>
    <h1 align="center">Login Form</h1>
    <body>
        <div align="center" class="error_msg"<?php echo show_msg(); ?></div>  
        <div>
        <form name="login_form" action="controller/login_user.php" method="POST" align="center">
            Username: <input type="text" name="user_name" placeholder="here"></br>
            Password :  <input type="password" name="user_password" placeholder="password"></br>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
    </body>
</html>