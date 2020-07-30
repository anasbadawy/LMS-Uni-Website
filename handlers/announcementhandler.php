<?php
include("handlers/loginhandler.php");


$teacher_id = $_SESSION['teacher_info'][0];


$sql = "SELECT * FROM Courses WHERE course_teacher=$teacher_id;";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    $row[4] = json_decode($row[4],true);
    $teacherCourses[] = $row;
}
$_SESSION['courses'] = $teacherCourses;


$err = '';
if (isset($_POST['create'])) {
    if (empty($_POST['subject']) || empty($_POST['description']) || empty($_POST['chosenCourse'])) {
        $err = 'Fill all the information';
    } else {

        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $chosenCourseId = $_POST['chosenCourse'];
        $teacher_id = $_SESSION['teacher_info'][0];


        $sql_add_announcment = "INSERT INTO Announcements(announcement_subject,
                announcement_description,announcement_time,course_id,teacher_id) 
                VALUES ('$subject','$description',SYSDATE(),'$chosenCourseId','$teacher_id')";

        if (mysqli_query($conn, $sql_add_announcment)) {
            // echo "announcment inserted successfully. ----";
        } else {
            // echo "ERROR: Could not able to execute $sql_add_announcment. " . mysqli_error($conn);

        }
    }
}
// Close connection
mysqli_close($conn);
