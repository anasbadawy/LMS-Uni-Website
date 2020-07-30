<?php
//هون يا سيدي العزيز بدك تغير الملف وتحط ملف الداتابيس الي انت عملتو
include 'database.php';


// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS Announcements(
    announcement_id INT NOT NULL AUTO_INCREMENT,
    announcement_subject VARCHAR(500) NOT NULL,
    announcement_description VARCHAR(1000) NOT NULL,
    announcement_time TIMESTAMP NOT NULL,
    course_id INT,
    teacher_id INT,
    FOREIGN KEY (course_id) REFERENCES Courses(course_id),
    PRIMARY KEY (announcement_id)
    )";

//Date : WeekDay-Hour1-Hour2 ---- Ex: MON-9:00-12:00 
if (mysqli_query($conn, $sql)) {
    echo "Announcments table created successfully. ------";
    $text= 'We are going to start the group presentations tomorrow. Because of tight agenda, everyone needs to be ready on time.';
    
    $sql_add_teacher_courses = "INSERT INTO Announcements(announcement_subject,announcement_description,announcement_time,course_id,teacher_id)
    VALUES ('Last 2 quizzes [5 May 2020 at 14:00]','$text',SYSDATE(),4,2)";



    if (mysqli_query($conn, $sql_add_teacher_courses)) {
        echo "Announcements inserted successfully. ----";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
