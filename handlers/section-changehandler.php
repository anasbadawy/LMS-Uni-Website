<?php
include("handlers/my-courseshandler.php");

$err = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['sectionChange-section'])|| empty($_POST['sectionChange-course']) ) {
        $err = 'Choose a course';
    } else {

        $stu_id = $_SESSION['student_info'][0];

        $sql = "SELECT * FROM StudentsCourses WHERE stu_id=$stu_id;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck) {
            $student_courses = json_decode($row[1], true);
            $courses_sections = json_decode($row[2], true);

            for ($i = 0; $i < count($student_courses); $i++) {
                if ($_POST['sectionChange-course'] == $student_courses[$i]) {
                    $courses_sections[$i] = ((int) $_POST['sectionChange-section']) - 1;
                    $courses_sections = json_encode($courses_sections);
                    $sql = "UPDATE StudentsCourses SET course_section='" . $courses_sections . "' WHERE stu_id=$stu_id;";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }
}
