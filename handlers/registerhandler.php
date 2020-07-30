<?php
include_once 'includes/database.php';

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname);


$err='';

if(isset($_POST['submit'])){
    if(empty($_POST['stu_name'])  || empty($_POST['stu_pass1']) || empty($_POST['stu_pass2']) ||empty($_POST['stu_faculty']) || empty($_POST['stu_email2']) || empty($_POST['stu_email2'])){
        $err='Fill the blanks';
    }
    else{      
            $stu_name=$_POST['stu_name'];
            $stu_faculty=$_POST['stu_faculty'];
            $stu_dep=$_POST['stu_dep'];
            $stu_email2=$_POST['stu_email2'];
            $stu_pass1=$_POST['stu_pass1'];
            $stu_pass2=$_POST['stu_pass2'];
            if($stu_pass1==$stu_pass2){
                    // $sql = "INSERT INTO students (name , surname , email , password) VALUES ($Rname,$Rusername,$Remail,$Rpw1);";
                    $sql = " INSERT INTO Students (stu_name,stu_dep,stu_faculty,stu_email, stu_pass)
                    VALUES ('$stu_name','$stu_dep','$stu_faculty','$stu_email2','$stu_pass1');";

                    if ($conn->query($sql) === TRUE) {
                        header('Location:login.php');
                    } 
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        $conn->close();
            }
            else{
                $err='Passwords does not mach';
            }
    }
}
