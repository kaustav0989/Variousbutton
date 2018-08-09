<?php
include("header.php");
include("../controller/login_check.php");
//include("../controller/show_list.php");
?>
<html>
    
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="<?php echo $url; ?>/resources/js/ajax.js"></script>
        <!-- <script src="<?php echo $url; ?>/resources/js/validation.js"></script> -->
         <script src="<?php echo $url; ?>/resources/js/form_validation.js"></script>
    <!--     <script src="<?php //echo $url; ?>/resources/js/form_validation.js"></script>  -->
        <script type="text/javascript">
            function back()
            {
                window.location.href="<?php echo $url; ?>/controller/all_student_details.php";
            }

        /*    function change_state()
            {
                var xmlhttp = new XMLHttpRequest();
                var id      = document.getElementById("state").value;
                xmlhttp.open("GET","ajax.php?state="+id,false);
                alert(id);
                xmlhttp.send(null);
                alert(xmlhttp.responseText);
                document.getElementById("city").innerHTML = xmlhttp.responseText;
            }*/
        </script>
    </head>
    <body>


         <?php echo show_msg(); ?>

        <form name="search" method="post" action="" enctype="multipart/form-data" id="add_form_id">
            <table width="100%" cellpadding="3" cellspacing="2" align="left" border="0" style="border-bottom:1px solid #ddd; margin-bottom: 5px; background-color: #efefef;">
            
        <tr bgcolor="#A9A9A9">
            <td colspan="8">Student Personal Details</td>
        </tr>
        <tr>
            <td>First-name</td>
            <td>
                <input type="text"  id="first_name" name="stud_fname"  autocomplete="off"/>
            </td>
            <td>Last-name</td>
            <td>
                <input type="text"  name="stud_lname" id="last_name" autocomplete="off"  />
            </td>
            <td>Father-name</td>
            <td>
                <input type="text"  name="father_name"  id="father" autocomplete="off"  />
            </td>
            <td>Mother-name:</td>
            <td>
                <input type="text"  name="mother_name"  autocomplete="off"  />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><span class="error_form" id="fname_error_message"></span></td>
            <td>&nbsp;</td>
            <td><span class="error_form" id="lname_error_message"></span></td>
            <td>&nbsp;</td>
            <td><span class="error_form" id="ftname_error_message"></span></td>
        </tr> 
        <tr>
            <td>Gender:</td>
            <td>
                <select name="stud_gender"   id="gender">
                    <option value="">Select</option>
                    <option value="male" >Male</option>
                    <option value="female">Female</option>
                    <option value="other" >Other</option>
                </select> 
            </td>
            <td>Date of Birth</td>
            <td>
                <input type="date" name="stud_dob"/>
            </td>
            <td>Contact Number</td>
            <td>
                <input type="text" name="stud_contact" id="contact"/>
            </td>
            <td>&nbsp;</td>
            <td>
                <input type="file" name="file_name" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><span class="error_form" id="gender_error_message"></span></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
             <td><span class="error_form" id="contact_error_message"></span></td>
        </tr>
        <tr bgcolor="#A9A9A9">
            <td colspan="8">Student Address Details</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <input type="text" name="stud_address"/>
            </td>
    <!--            <td>State</td>
            <td>
                <input type="text" name="stud_state" />
            </td>
            <td>City</td>
            <td>
                <input type="text" name="stud_city" />
            </td>  -->
            <td>State</td>
            <td>
                <select id="state" name="stud_state">
                    <option>Select</option>
                    <?php
                       
                        foreach ($_SESSION['add'] as $row) {
                                
                    ?>
                    <option value="<?php echo $row['i_id']?>"><?php echo $row['s_name'];?></option>
                <?php  } ?>
                </select>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr> 
            <td>City</td>
            <td>
            <div id = "city">
                <select name = "stud_city">
                    <option>Select</option>
                </select>
            </div>
            </td>   
            <td>Pin</td>
            <td>
                <input type="text" name="stud_pin" id="pin"/>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
             <td>&nbsp;</td>
              <td>&nbsp;</td>

            <td><span class="error_form" id="pin_error_message"></span></td>
        </tr>
        <tr bgcolor="#A9A9A9">
            <td colspan="8">Student Registration Details</td>
        </tr>
        <tr>
            <td>Year</td>
            <td>
                <select name="stud_year" id="year">
                    <option value="" >select</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                </select>    
            </td>
            <td>Class</td>
            <td>
                <select name="stud_class" id="class" >
                    <option value="">Select</option>
                    <option value="Five">V</option>
                    <option value="Six">VI</option>
                    <option value="Seven">VII</option>
                    <option value="Eight">VIII</option>
                    <option value="Nine">IX</option>
                    <option value="Ten">X</option>
                </select>
            </td>
            <td>Section</td>
            <td>
                <select name="stud_section" id="section" >
                    <option value="">Select</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><span class="error_form" id="year_error_message"></span></td>
            <td>&nbsp;</td>
            <td><span class="error_form" id="class_error_message"></span></td>
            <td>&nbsp;</td>
            <td><span class="error_form" id="section_error_message"></span></td>
        </tr>
        <tr>
            <td>Roll</td>
            <td>
                <input type="number" name="stud_roll" id="roll"/>
            </td>
            <td>Status</td>
            <td>
                <select name="stud_status" id="status" >
                    <option value="">Select</option>
                    <option value="pursuing">Pursuing</option>
                    <option value="passed">Passed</option>
                    <option value="left">Left</option>
                    <option value="TC">TC</option>
                </select>
            </td>
            <td colspan="6"></td>
        </tr>
         <td>&nbsp;</td>
            <td><span class="error_form" id="roll_error_message"></span></td>
        <td>&nbsp;</td>
            <td><span class="error_form" id="status_error_message"></span></td>
            <tr>
                <td><input type="submit" value="Save" name="Add_save"></td>
                <td><input type="reset" value="Reset"></td>
                <td><input type="button" value="Back" onclick="back()"></td>
            </tr>
            </table>
        </form>
<html>
       