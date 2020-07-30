<?php
//هون يا سيدي العزيز بدك تغير الملف وتحط ملف الداتابيس الي انت عملتو
include 'database.php';


// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS Courses(
    course_id INT NOT NULL AUTO_INCREMENT,
    course_code VARCHAR(30) NOT NULL,
    course_name VARCHAR(30) NOT NULL,
    course_credit INT NOT NULL,
    course_date VARCHAR(255) NOT NULL, 
    course_teacher INT NOT NULL, 
    PRIMARY KEY (course_id)
    )";

    //Date : WeekDay-Hour1-Hour2 ---- Ex: MON-9:00-12:00 
if(mysqli_query($conn, $sql)){
    echo "Courses table created successfully. ------";

    $course1 = json_encode(array('MON-09:00-12:00', 'TUE-09:00-12:00', 'FRI-09:00-12:00'));
    $course2 = json_encode(array('WED-12:00-16:00', 'THU-12:00-16:00', 'FRI-12:00-16:00'));
    $course3 = json_encode(array('MON-10:00-13:00', 'MON-15:00-18:00', 'FRI-11:00-14:00'));
    $course4 = json_encode(array('THU-14:00-17:00', 'THU-16:00-19:00', 'FRI-13:00-16:00'));
    $course5 = json_encode(array('MON-09:00-12:00', 'MON-15:00-18:00', 'TUE-11:00-14:00'));
    $course6 = json_encode(array('TUE-09:00-12:00', 'TUE-13:00-16:00', 'WED-09:00-12:00'));
    $course7 = json_encode(array('WED-10:00-13:00', 'WED-14:00-17:00', 'FRI-15:00-18:00'));
    $course8 = json_encode(array('TUE-11:00-14:00', 'TUE-15:00-18:00', 'FRI-11:00-14:00'));
    $course9 = json_encode(array('THU-16:00-19:00', 'FRI-13:00-16:00', 'FRI-16:00-19:00'));

    $course10 = json_encode(array('MON-09:00-12:00', 'TUE-09:00-12:00', 'FRI-09:00-12:00'));
    $course11 = json_encode(array('WED-12:00-16:00', 'THU-12:00-16:00', 'FRI-12:00-16:00'));
    $course12 = json_encode(array('MON-10:00-13:00', 'MON-15:00-18:00', 'FRI-11:00-14:00'));
    $course13 = json_encode(array('THU-14:00-17:00', 'THU-16:00-19:00', 'FRI-13:00-16:00'));
    $course14 = json_encode(array('MON-09:00-12:00', 'MON-15:00-18:00', 'TUE-11:00-14:00'));
    $course15 = json_encode(array('TUE-09:00-12:00', 'TUE-13:00-16:00', 'WED-09:00-12:00'));
    $course16 = json_encode(array('WED-10:00-13:00', 'WED-14:00-17:00', 'FRI-15:00-18:00'));
    $course17 = json_encode(array('TUE-11:00-14:00', 'TUE-15:00-18:00', 'FRI-11:00-14:00'));
    $course18 = json_encode(array('THU-16:00-19:00', 'FRI-13:00-16:00', 'FRI-16:00-19:00'));

    $course19 = json_encode(array('MON-09:00-12:00', 'TUE-09:00-12:00', 'FRI-09:00-12:00'));
    $course20 = json_encode(array('WED-12:00-16:00', 'THU-12:00-16:00', 'FRI-12:00-16:00'));
    $course21 = json_encode(array('MON-10:00-13:00', 'MON-15:00-18:00', 'FRI-11:00-14:00'));
    $course22 = json_encode(array('THU-14:00-17:00', 'THU-16:00-19:00', 'FRI-13:00-16:00'));
    $course23 = json_encode(array('MON-09:00-12:00', 'MON-15:00-18:00', 'TUE-11:00-14:00'));
    $course24 = json_encode(array('TUE-09:00-12:00', 'TUE-13:00-16:00', 'WED-09:00-12:00'));
    $course25 = json_encode(array('WED-10:00-13:00', 'WED-14:00-17:00', 'FRI-15:00-18:00'));
    $course26 = json_encode(array('TUE-11:00-14:00', 'TUE-15:00-18:00', 'FRI-11:00-14:00'));
    $course27 = json_encode(array('THU-16:00-19:00', 'FRI-13:00-16:00', 'FRI-16:00-19:00'));

  

    $sql_add_course = "INSERT INTO Courses (course_code, course_name, course_credit,course_date,course_teacher)
    VALUES ('CMPE100', 'Into to computer programming', 5,'".$course1."',1),
    ('CMPE101', 'Algorithms and Data Structure', 6,'".$course2."',1),
    ('CMPE102', 'Java for beginners', 5,'".$course3."',1),
    ('CMPE210', 'Advanced Java', 7,'".$course4."',2),
    ('CMPE322', 'Image Proccesing', 5,'".$course5."',2),
    ('CMPE123', 'Natural language proccesing', 5,'".$course6."',3),
    ('ENGR322', 'User Interface', 5,'".$course7."',2),
    ('PHYS101', 'Phisics 1', 7,'".$course8."',3),
    ('MATH404', 'Calculus', 7,'".$course9."',3),

/* new Coursses */

    ('CMPE211', 'Data Structure', 5,'".$course10."',4),
    ('CMPE212', 'Advanced Data Structure', 6,'".$course11."',4),
    ('EEEN222', 'Digital Systems Design', 5,'".$course12."',4),
    ('EEEN201', 'Circuits 1', 5,'".$course13."',5),
    ('EEEN202', 'Circuits 2', 5,'".$course14."',5),
    ('ENG101', 'English 1', 3,'".$course15."',5),
    ('ENG102', 'English 2', 3,'".$course16."',6),
    ('TK101', 'Turkish 1', 3,'".$course17."',6),
    ('TK102', 'Turkish 2', 4,'".$course18."',6),
    ('TK103', 'Turkish 3', 4,'".$course19."',7),
    ('MATH405', 'Calculus 2', 6,'".$course20."',7),
    ('MATH406', 'Calculus 3', 7,'".$course21."',7),
    ('ENGR400', 'Ethics in Engineering', 4,'".$course21."',10),
    ('CHEM101', 'Chemistry', 5,'".$course23."',8),
    ('CHEM110', 'Chemistry Lab', 2,'".$course24."',8),
    ('MATH240', 'Logic and Discrete Mathematics', 4,'".$course25."',9),
    ('MATH259', 'Probability and Statistics', 5,'".$course26."',9),
    ('MATH139', 'Linear Algebra', 5,'".$course27."',9)


    ";

if(mysqli_query($conn, $sql_add_course)){
    echo "Courses inserted successfully.------ ";

}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);


?>