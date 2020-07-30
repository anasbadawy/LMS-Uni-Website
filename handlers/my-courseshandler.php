<?php
include("loginhandler.php");

$sql = "SELECT * FROM Teachers;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    $resultArray[] = $row;
}

$_SESSION['teachers'] = $resultArray;
$sql = "SELECT * FROM Courses;";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    $row[4] = json_decode($row[4], true);
    $resultArray2[] = $row;
}
$_SESSION['courses'] = $resultArray2;

$stu_id = $_SESSION['student_info'][0];

$sql = "SELECT * FROM StudentsCourses WHERE stu_id=$stu_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck) {
    $_SESSION['my-courses'] = json_decode($row[1], true);
    $_SESSION['courses-sections'] = json_decode($row[2], true);
} else {
    $_SESSION['my-courses'] = [];
    $_SESSION['courses-sections'] = [];
}

$err = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['chosenCourse'])) {
        $err = 'Choose a course';
    } else {
        $stu_id = $_SESSION['student_info'][0];
        $chosenCourse = $_POST['chosenCourse'];
        $coursesArr[] = $_SESSION['courses'];
        for ($i = 0; $i < count($coursesArr[0]); $i++) {
            if ($coursesArr[0][$i][0] == $chosenCourse = $_POST['chosenCourse']) {
                if (count($_SESSION['my-courses']) < 1) {
                    $stu_courses[]=(int) $coursesArr[0][$i][0];
                    $stu_courses = json_encode($stu_courses);
                    $courses_sections[]=0;
                    $courses_sections = json_encode($courses_sections);
                    $sql = "INSERT INTO StudentsCourses (stu_id,courses,course_section)
                                VALUES ($stu_id,'".$stu_courses."','".$courses_sections."')";
                } else {

                    $stu_courses = $_SESSION['my-courses'];
                    $courses_sections = $_SESSION['courses-sections'];
                    array_push($stu_courses, (int) $coursesArr[0][$i][0]);
                    array_push($courses_sections, 0);
                    $stu_courses = array_unique($stu_courses);
                    if(count($stu_courses)==count($courses_sections)){
                        $stu_courses = json_encode($stu_courses);
                        $courses_sections = json_encode($courses_sections);
                        $sql = "UPDATE StudentsCourses SET courses='" . $stu_courses . "', course_section='" . $courses_sections . "' WHERE stu_id=$stu_id;";    
                    }
                    else {
                        echo "<script>alert('This course is already exist.');</script>";
                    }

 }
                    if ($conn->query($sql) === TRUE) {
                    } else {
                        // echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                
                $conn->close();
                break;
            }
        }
    }
}
