<?php
//هون يا سيدي العزيز بدك تغير الملف وتحط ملف الداتابيس الي انت عملتو
include 'database.php';


// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Attempt create table query execution
$sql = "CREATE TABLE Teachers(
    teacher_id INT NOT NULL AUTO_INCREMENT,
    teacher_name VARCHAR(30) NOT NULL,
    teacher_faculty VARCHAR(30) NOT NULL,
    teacher_email VARCHAR(30) NOT NULL,
    teacher_pass VARCHAR(30) NOT NULL,
    PRIMARY KEY (teacher_id)
    )";

if(mysqli_query($conn, $sql)){

    echo "Teachers table created successfully. -----";
    $sql_add_teacher = "INSERT INTO Teachers (teacher_name, teacher_faculty, teacher_email,teacher_pass)
    VALUES ('Elif Pinar', 'Enginneering', 'elif@bilgi.com','11'),
            ('Murat Oguz', 'Enginneering', 'murat@bilgi.com','22'),
            ('Ahmet Denker', 'Enginneering', 'ahmet@bilgi.com','33'),
            ('Ali Nesin', 'Scince', 'ali@bilgi.com','44'),
            ('Alpaslan Parlakçı', 'Enginneering', 'alp@bilgi.com','55'),
            ('Murat Sarıbay', 'Scince', 'murat.s@bilgi.com','66'),
            ('Savaş Yıldırım', 'Scince', 'savas@bilgi.com','77'),
            ('Tuğba Yıldız', 'Enginneering', 'tugba@bilgi.com','88'),
            ('Uzay Çetin', 'Enginneering', 'uzay@bilgi.com','99'),
            ('Yeşim Öniz', 'Scince', 'yesim@bilgi.com','00')
            ";

if(mysqli_query($conn, $sql_add_teacher)){
    echo "Teachers inserted successfully.------ ";

}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);


?>