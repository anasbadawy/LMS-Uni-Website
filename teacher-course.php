<?php
include("handlers/announcementhandler.php");
include("handlers/grades-handler.php");

if (!empty($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $course_id;

    include("handlers/registered-student-handler.php");

    for ($i = 0; $i < count($_SESSION['courses']); $i++) {
        if ($_SESSION['courses'][$i][0] == $course_id) {
            $_SESSION['course_details'] = $_SESSION['courses'][$i];
        }
    }

    $ResultArray = [];
    for ($i = 0; $i < count($_SESSION['students-courses']); $i++) {
        $studentcourses = json_decode($_SESSION['students-courses'][$i][1], true);

        for ($u = 0; $u < count($studentcourses); $u++) {
            if ($course_id == $studentcourses[$u]) {
                array_push($ResultArray, $_SESSION['students'][$i]);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>BILGI</title>
    <!-- Styles -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/style.css" rel="stylesheet" media="screen">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <style>
        .page-title {
            font-size: 50px;
        }

        p {
            font-size: 20px;
        }

        .prof {
            margin-top: 10px;
            font-size: 20px;
            font-weight: 500;
        }

        .weeks {
            margin-top: 20px;
            font-size: 20px;
            font-weight: 600;
        }

        .weekst {
            margin-top: 20px;
            font-size: 30px;
            font-weight: 600;
        }

        .btn {
            margin-top: 10px;
            background-color: #27AE60;
            border: none;
            color: white;
        }

        .btn-danger {
            margin-top: 10px;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            border: none;
        }

        .marg {
            margin-right: 7px;
            margin-left: 7px;
        }

        textarea {
            margin-top: 35px;
            margin-left: 20px;
            height: 150px;
            resize: none;
        }

        textarea.form-control {
            width: 400px;
        }

        input.form-control {
            width: 70px;
        }

        select.form-control {
            width: 100px;
        }
    </style>


</head>

<body>
    <div class="row dashboard-top-nav">
        <div class="col-sm-3 logo">
            <h5><i class="fa fa-book"></i>BILGI</h5>
        </div>

        <div class="col-sm-3 logo">
            <!--A DIV FOR THE TIME -->

            <div id="clockbox"></div>

            <script type="text/javascript">
                var tday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var tmonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                function GetClock() {
                    var d = new Date();
                    var nday = d.getDay(),
                        nmonth = d.getMonth(),
                        ndate = d.getDate(),
                        nyear = d.getFullYear();
                    var nhour = d.getHours(),
                        nmin = d.getMinutes(),
                        nsec = d.getSeconds(),
                        ap;

                    if (nhour == 0) {
                        ap = " AM";
                        nhour = 12;
                    } else if (nhour < 12) {
                        ap = " AM";
                    } else if (nhour == 12) {
                        ap = " PM";
                    } else if (nhour > 12) {
                        ap = " PM";
                        nhour -= 12;
                    }

                    if (nmin <= 9) nmin = "0" + nmin;
                    if (nsec <= 9) nsec = "0" + nsec;

                    var clocktext = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" + nmin + ":" + nsec + ap + "";
                    document.getElementById('clockbox').innerHTML = clocktext;
                }

                GetClock();
                setInterval(GetClock, 1000);
            </script>

        </div>
        <div style="margin-top:10px" class="col-sm-5 notification-area">
            <span><?php echo $_SESSION['teacher_info'][1] ?></span>
        </div>
        <a href="login.php" style="color:#fff;"><i class="fa fa-sign-out" style="font-size:22px; padding:10px;cursor:pointer "></i>
        </a>
    </div>
    <div class="parent-wrapper" id="outer-wrapper">
        <!-- SIDE MENU -->
        <div class="sidebar-nav-wrapper" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="teacher-dash.php"><i class="fa fa-home menu-icon"></i>Dashboard</a>
                </li>
                <li>
                    <a href="teacher-my-courses.php"><i class="fa fa-home menu-icon"></i>My Courses</a>
                </li>
            </ul>
        </div>
        <!-- MAIN CONTENT -->
        <div class="main-content" id="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <h5 class="page-title"><?php echo $_SESSION['course_details'][1] . ": " . $_SESSION['course_details'][2] ?></h5>
                        <h5 class="page-title prof">Prof. Dr. <?php echo $_SESSION['teacher_info'][1] ?></h5>
                        <div class="section-divider"></div>

                        <h5 class="weekst page-title">Syllabus and Weekly Contents:</h5>

                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Syllabus</h5>
                                    <input class="btn" type="file" name="" id="" placeholder="Select">

                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 1</h5>

                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 2</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 3</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 4</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 5</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 6</h5>

                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 7</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 8</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 9</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 10</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 11</h5>
                                    <input class="btn" type="file" name="" id="">
                                </div>
  
                            </div>
                        </div>
                        <center>
                            <button class="btn">Upload</button>
                        </center>
                        <div class="section-divider"></div>

                        <h5 class="weekst page-title">Add Record:</h5>
                        <div class="marg">

                            <div class="inner-item">
                                <form class="dash-form" action="" method="POST" role="form">
                                    <div class="row">
                                        <div class="col-lg-12 clear-padding-xs">
                                            <div class="col-lg-3 col-md-3 col-xs-6">
                                                <label><i class="fa fa-user-secret"></i>Student</label>
                                                <select name="selectedstu" style="max-width: 200px;">
                                                    <option>-- Select --</option>
                                                    <?php foreach ($ResultArray as $key => $value) :
                                                        $stu_id = $ResultArray[$key][0];
                                                        echo "<option value='$stu_id'>" . $ResultArray[$key][1] . '</option>';
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-xs-6">
                                                <label><i class="fa fa-code"></i>Midterm</label>
                                                <input style="max-width: 200px;" type="text" name="midterm" placeholder="35" />
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-xs-6">
                                                <label><i class="fa fa-code"></i>Final</label>
                                                <input style="max-width: 200px;" type="text" name="final" placeholder="45" />
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-xs-6">
                                                <label><i class="fa fa-code"></i>Attendence</label>
                                                <input style="max-width: 200px;" type="text" name="attendence" placeholder="20" />
                                            </div>

                                        </div>
                                    </div>
                                    <button class="btn" style="margin-left:30px;" name="add" type="submit" value="Add Record">Add Record
                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="section-divider"></div>

                        <h5 class="weekst page-title">Grades and Attendence:</h5>
                        <br>

                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">

                                <form name="gradesform" action="" method="POST">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="whitefont" scope="col">#</th>
                                                <th class="whitefont" scope="col">Student Name</th>
                                                <th class="whitefont" scope="col">Student ID</th>
                                                <th class="whitefont" scope="col">Midterm</th>
                                                <th class="whitefont" scope="col">Final</th>
                                                <th class="whitefont" scope="col">Attendence</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($_SESSION['registered-students'] as $key => $value) {
                                                echo "<tr>";
                                                echo "<th>" . ($key) . "</th>";
                                                echo "<td>" . $_SESSION['registered-students'][$key][5] . "</td>";
                                                echo "<td>" . $_SESSION['registered-students'][$key][1] . "</td>";
                                                echo "<td>" . $_SESSION['registered-students'][$key][2] . "</td>";
                                                echo "<td>" . $_SESSION['registered-students'][$key][3] . "</td>";
                                                echo "<td>" . $_SESSION['registered-students'][$key][4] . "</td>";
                                                echo "</tr>";
                                            } ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        </form>
                        <div class="dash-footer col-lg-12">
                            <p>Copyright Bilgi</p>
                        </div>
                    </div>
                </div>
                <div>
                </div>

                <div class="menu-togggle-btn">
                    <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="assets/js/jQuery_v3_2_0.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/js.js"></script>
</body>
</html>