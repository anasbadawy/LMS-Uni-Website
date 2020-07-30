<?php
include("handlers/registerhandler.php");
include("handlers/loginhandler.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BILGI</title>
    <link href="loginstyle.css" rel="stylesheet" media="screen">
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="signup()">Sign up</button>
            </div>
            <div class="social-icons">
                <img src="images/fb.png">
                <img src="images/tw.png">
                <img src="images/gp.png">
            </div>
            <form id="login" class="input-group" action="" method="POST">
                <input type="text" name="stu_email" id="email" class="input-field" placeholder="User Id" required>
                <input type="password" name="stu_pass" id="password" class="input-field" placeholder="Enter Password" required>
                <div style="margin:10px;" class="radio">
                     <input type="radio" name="tech-stu-rad" value="student" checked="checked"> Student
                     <input type="radio" name="tech-stu-rad"  value="teacher"> Teacher
                </div>
                <button type="submit" name="submit" class="submit-btn">Login</button>
            </form>
            <span class="red"><?php echo $err; ?> </span>

            <form id="register" class="input-group" action="" method="POST">
                <input type="text" name="stu_name"  class="input-field" placeholder="Name" required>
                <input type="text" name="stu_faculty"  class="input-field" placeholder="Student Faculty" required>
                <input type="text" name="stu_dep" class="input-field" placeholder="Student Department" required>
                <input type="text" name="stu_email2"  class="input-field" placeholder="Email" required>
                <input type="password" name="stu_pass1" class="input-field" placeholder="Enter Password" required>
                <input type="password" name="stu_pass2"  class="input-field" placeholder="Enter Confirmation Password" required>
                <button type="submit" name="submit" class="submit-btn">Sign up</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function signup() {
            x.style.left = "-400px"
            y.style.left = "50px"
            z.style.left = "110px"
        }

        function login() {
            x.style.left = "50px"
            y.style.left = "450px"
            z.style.left = "0"
        }
    </script>
</body>

</html>