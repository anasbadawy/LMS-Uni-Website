<?php 
include("./includes/database.php");

$course_id=$_SESSION['course_id'];

$sql = "SELECT * FROM StudentsCourses;";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    $resultArray2[] = $row;
}
$_SESSION['students-courses'] = $resultArray2;

$sql = "SELECT * FROM Students;";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    $students[] = $row;
}
$_SESSION['students'] = $students;

$sql = "SELECT * FROM GradesAndAttendence WHERE course_id=$course_id;";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck>0){
while ($row = mysqli_fetch_row($result)) {
    $resultArray4[] = $row;
}
$_SESSION['registered-students'] = $resultArray4;
for ($u = 0; $u < count($_SESSION['registered-students']); $u++) {
    for ($v = 0; $v < count($_SESSION['students']); $v++) {
        if ($_SESSION['registered-students'][$u][1] ==$_SESSION['students'][$v][0]) {
            array_push($_SESSION['registered-students'][$u], $_SESSION['students'][$v][1]);
        }
    }
}

}
else {
    $_SESSION['registered-students']= [];
}
mysqli_close($conn);




