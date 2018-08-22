
<html>
<head>
<title>Connecting MySQL Server</title>
</head>
<body>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'shld123';
//echo $dbuser;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
//var_dump($conn);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}


mysqli_select_db($conn,"Student_details");
//echo 'Connected successfully';
/*$sql="CREATE DATABASE IF NOT EXISTS user_details;";
$check=mysqli_query($conn,$sql);
if(! $check)
    die('Could not create database: ' . mysqli_connect_error());
else
    echo "</br>Database created"; 
mysqli_select_db('use_details');
echo "</br>done";       
mysqli_close($conn);*/

require_once('general_functions.php');

session_start();

?>
</body>
</html>