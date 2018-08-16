<script src="<?php echo $url; ?>/resources/js/page_loader.js"></script> 
<?php
include("view/header.php");
session_start();
if($_SESSION['islogin'] == 1){
    header('location:controller/dashboard.php');
}
include("controller/general_functions.php");
?>
    <div align="center" <?php echo show_msg(); ?></div>  

<body>
         
    <form name="login_form" action="controller/login_user.php" method="POST" align="center">

        <table bgcolor="#eeddee" align="center" cellpadding ="8px" cellspacing="2px" >
            <tr>
                <td>&nbsp;</td>
                <td><b>Login Form</b></td>
            </tr> 
            <tr>
                <td> Username: </td>
                <td>  
                    <input type="text" name="user_name" placeholder="here">
                </td>
            </tr> 
            <tr>
                <td> Password: </td>
                <td>  
                    <input type="password" name="user_password" placeholder="password">
                </td>
            </tr> 
            <tr>
                 <td>
                    <input type="submit" value="submit" name="submit">
                 </td>
            </tr>           
        </table>

    </form>
</body>
</html>



