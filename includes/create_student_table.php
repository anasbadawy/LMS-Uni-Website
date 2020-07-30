<?php
//هون يا سيدي العزيز بدك تغير الملف وتحط ملف الداتابيس الي انت عملتو
include 'database.php';


// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE Students(
    stu_id INT NOT NULL AUTO_INCREMENT,
    stu_name VARCHAR(30) NOT NULL,
    stu_dep VARCHAR(30) NOT NULL,
    stu_faculty VARCHAR(30) NOT NULL,
    stu_email VARCHAR(30) NOT NULL,
    stu_pass VARCHAR(30) NOT NULL,
    PRIMARY KEY (stu_id)
    )";

if(mysqli_query($conn, $sql)){

    echo "Students table created successfully. -----";
    $sql_add_student = "INSERT INTO Students (stu_name, stu_dep,stu_faculty, stu_email,stu_pass)
    VALUES ('Anas Badawi','Computer Engineering', 'Engineering', 'anas@bilgi.com','11'),
    ('Omar Soliman','Computer Engineering' , 'Engineering','omar@bilgi.com','22'),
    ('Mohammed Soliman','Mechanical Engineering' , 'Engineering','mohamed@bilgi.com','33'),
    ('Omar Hatta','Mechanical Engineering' , 'Engineering','omar.hatta@bilgi.com','44'),
    ('Ahmet Mohameed','Industrial Engineering' , 'Engineering','ahmet@bilgi.com','55'),
    ('Ali Kasem','Industrial Engineering' , 'Engineering','ali@bilgi.com','66'),
    ('Ezel bayraktar','Biomedical Engineering' , 'Engineering','ezel@bilgi.com','77'),
    ('Ahmet Davutoglu','Biomedical Engineering' , 'Engineering','ahmet.d@bilgi.com','88'),
    ('Mert Kilcdaroglu','Chemical Engineering' , 'Engineering','mert@bilgi.com','99'),
    ('Sinan Balci','Chemical Engineering' , 'Engineering','sinan@bilgi.com','00')
    ";

if(mysqli_query($conn, $sql_add_student)){
    echo "Students inserted successfully.------ ";

}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);


?>