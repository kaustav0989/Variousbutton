<?php
include("mysqlcon.php");
//include("dashboard.php");
include("header.html");
include("login_check.php");

?>
<html>
    
    <head>
        <script type="text/javascript">
            function back()
            {
                window.location.href="all_student_details.php";
            }
        </script>
    </head>
    <body>

        <?php echo show_msg(); ?>

        <form name="search" method="post" action="" enctype="multipart/form-data">
            <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
            <tr>   
            <td>Firstname:</td><td><input type="text" name="stud_fname" required autocomplete="off"></td>
            <td>Lastname: </td><td><input type="text" name="stud_lname" required autocomplete="off"></td>

            <td>Class:<td> 
                    <select name="stud_class">
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                        <option value="7">seven</option>
                        <option value="8">eight</option>
                        <option value="9">nine</option>
                        <option value="10">ten</option>
                      </select>
                    </tr>
                    <tr>
            <td>Roll:</td>     <td><input type="number" name="stud_roll"></td>
            <td>Section:</td>  <td><input type="text" name="stud_section" autocomplete="off"></td>
            <td>Age:</td>      <td><input type="number" name="stud_age"></td>
          </tr>
          <tr>
            <td>DOB:</td>      <td><input type="date" name="stud_dob" max="2020-12-31" autocomplete="off"></td>
            <td>Address:</td>  <td><input type="text" name="stud_address" autocomplete="off"></td>
            <td>Parent Name:</td>   <td><input type="text" name="stud_parent" autocomplete="off"></td>
            </tr>
            <td>Guardian:</td>  <td><select name="stud_guardian_type">
                        <option value="father">father</option>
                        <option value="mother">mother</option>
                        </select> </td>
            <td>Guardian Name:</td> <td><input type="text" name="stud_guardian" autocomplete="off"></td>  
            <td>Status:   
                    <td><select name="stud_status">
                    <option value="active">active</option>
                    <option value="left">left</option>
                    <option value="tc">TC</option>
                    </select></td>
                    </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="image" id="image"></td>
                <td>Gender:</td>
                <td>
                    <select name="stud_gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>    
                </td>
            </tr>    
            <tr>
                <td colspan="6"></td>
            </tr>           
            <tr>
                <td><input type="submit" value="Save" name="Add_save"></td>
                <td><input type="reset" value="Reset"></td>
                <td><input type="button" value="Back" onclick="back()"></td>
            </tr>
            </table>
        </form>

        <?php //echo $_SESSION["user_name"]; ?>
<html>
<?php
    
?>        