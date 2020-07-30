<?php
include_once 'includes/database.php';

session_start(); //start the PHP_session function

$err = '';



if (isset($_POST['submit'])) {
    if (empty($_POST['stu_email']) || empty($_POST['stu_pass'])) {
        $err = 'Email or password is not exist';
    } else {
        $email = $_POST['stu_email'];
        $password = $_POST['stu_pass'];
        $radioVal = $_POST['tech-stu-rad'];

        if($radioVal=='student'){

            $sql = "SELECT * FROM Students WHERE stu_email='$email' AND stu_pass='$password';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck == 1) {
                $row = mysqli_fetch_row($result);
                $_SESSION['student_info'] = $row;

                header('Location:student-dash.php');
            } else {
                $err = 'Email or Password is invalid';
            }
        }
        else if($radioVal=='teacher'){

            $sql = "SELECT * FROM Teachers WHERE teacher_email='$email' AND teacher_pass='$password';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck == 1) {
                $row = mysqli_fetch_row($result);
                $_SESSION['teacher_info'] = $row;

                header('Location:teacher-dash.php');
            } else {
                $err = 'Email or Password is invalid';
            }
        }

        mysqli_close($conn);
    }
}


