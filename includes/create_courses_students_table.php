<?php
//هون يا سيدي العزيز بدك تغير الملف وتحط ملف الداتابيس الي انت عملتو
include 'database.php';


// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS StudentsCourses(
    stu_id INT NOT NULL PRIMARY KEY,
    courses varchar(255) NOT NULL,
    course_section varchar(255) NOT NULL
    )";

if(mysqli_query($conn, $sql)){
    echo "Students Courses table created successfully. -----";
    $stu1 = json_encode(array(1, 2, 3));
    $stu2 = json_encode(array(5, 2, 6));
    $stu1_section = json_encode(array(2, 0, 1));
    $stu2_section = json_encode(array(0, 2, 0));

    $sql_add_student_courses = "INSERT INTO StudentsCourses (stu_id,courses,course_section)
    VALUES (1,'".$stu1."','".$stu1_section."'),
    (2,'".$stu2."','".$stu2_section."')
    ";

if(mysqli_query($conn, $sql_add_student_courses)){
    echo "Students Courses inserted successfully. ----";
}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);


?>