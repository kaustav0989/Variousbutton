<?php
    
    include("login_check.php");

    $page     = "Dashboard";
    $breadcum = 'Dashboard';

    include("html/header.html");

?>    
    <html>
        <body>
            <?php// echo show_msg(); ?>
            <h3>
                <a href="all_student_details.php">Student List</a></br>
                <a href="teacher_search.php">Teacher Search</a></br>
                <a href="exam.php">Exam</a></br>
                <a href="result">Result</a>
            </h3>
        </body>
    </html>    
