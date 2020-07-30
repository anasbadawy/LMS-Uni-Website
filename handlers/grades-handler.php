<?php
include("./includes/database.php");

if (isset($_POST['add'])) {
    if (
        empty($_POST['selectedstu']) || empty($_POST['midterm'])
        || empty($_POST['final'])  || empty($_POST['attendence'])
    ) {
    } else {
        $selectedstu = (int) $_POST['selectedstu'];
        $midterm = (int) $_POST['midterm'];
        $final = (int) $_POST['final'];
        $attendence = (int) $_POST['attendence'];
        $course_id =(int)   $_SESSION['course_id'];

        $sql_add_grade = "INSERT IGNORE INTO GradesAndAttendence(course_id,student_id,mid_grade,
        final_grade,attendence) 
        VALUES ('$course_id','$selectedstu','$midterm','$final','$attendence')";

        if (mysqli_query($conn, $sql_add_grade)) {

        } else {
        }
    }
}