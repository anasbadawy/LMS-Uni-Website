<?php
//هون يا سيدي العزيز بدك تغير الملف وتحط ملف الداتابيس الي انت عملتو
include 'database.php';


// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE GradesAndAttendence(
    course_id INT NOT NULL,
    student_id  INT NOT NULL,
    mid_grade INT NOT NULL,
    final_grade INT NOT NULL,
    attendence INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES Courses(course_id),
    PRIMARY KEY (student_id)
        )";


//Date : WeekDay-Hour1-Hour2 ---- Ex: MON-9:00-12:00 
if (mysqli_query($conn, $sql)) {
    echo "Courses table created successfully. ------";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
