<?php $url = "http://localhost/sdms"; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $page_name; ?></title>
        <lang='en'></lang>
        <meta charset="utf-8">

        <script type="text/javascript">
            function logout()
            {
                window.location.href = 'logout.php'; 

            }
        </script>
        <style>
            .breadcum td a{
                    color: #0138ff;
            }
            .breadcum td{
                    color: #ff1901;
            }
            .pagination_div{
                
            }
            .pagination_div span{

                padding: 2px 14px;
                color: #ff0000;
                background-color: #ddd;
                border: 1px solid #adabab;
            }
            .pagination_div span a{

                padding: 2px 5px;
                color:#00ff00;
                background-color:#fff;
            }
            .error_msg{
                    margin: 5px 0px;
                    background-color: #fdeaed;
                    border: 1px solid #f7c8c8;
                    color: #fb0000;
                    padding: 4px;
            }
            .success_msg{
                    margin: 5px 0px;
                    background-color: #ddffe4;
                    border: 1px solid #99e89f;
                    color: #165206;
                    padding: 4px;
            }

            .content{
                display: none;
            }

            .add_page_error{
                color : red;
            }

            .error_form {
                font-size: 15px;
                font-family: Arial;
                color: #FF0052;
            }
            
            .loader {
                border: 16px solid #f3f3f3; /* Light grey */
                position: absolute;
                  left: 50%;
                  top: 50%;
                  z-index: 1;
                  width: 150px;
                  height: 150px;
                  margin: -75px 0 0 -75px;
                  border: 16px solid #f3f3f3;
                  border-radius: 50%;
                  border-top: 16px solid #3498db;
                  width: 120px;
                  height: 120px;
                  -webkit-animation: spin 2s linear infinite;
                  animation: spin 2s linear infinite;
                }

            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }



        </style>

    </head>
    <body>
        <table width="100%" rules="rows" cellpadding="4" cellspacing="2" style="border-bottom: 1px solid #ddd;">
            <tr style="border-bottom: 1px solid #ddd;">
                <td align="center" width="90%">
                    <h1 align="left"><font color="red">Student Database Management System</font></h1>
                </td>           
                <td align="right">
                   <?php session_start(); if( isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){ ?>
	               <input type="submit" value="logout" onclick="logout();" name="logout_btn" />
                   <?php }  ?>
                </td>
            </tr>
            <?php session_start(); if( isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){ ?>
            <tr style="background-color: #ffe7e1;" class="breadcum">
                <td align="left" colspan="2">
                    
                    <?php echo $breadcum; ?>  
                   
                </td>
            </tr>
            <?php }  ?>   
        </table>

    