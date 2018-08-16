<?php
    
    include("login_check.php");

    $page     = "Dashboard";
    $breadcum = 'Dashboard';

    include("../view/header.php");

?>    
    <html>
        <body>
            <?php// echo show_msg(); ?>
            <h3>
                <a href="all_student_details.php">Student List</a></br>
                <a href="all_teacher_details.php">Teacher List</a></br>
                <a href="exam.php">Exam</a></br>
                <a href="result">Result</a>
            </h3>
        </body>
    </html>    
