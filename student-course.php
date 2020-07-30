<?php
include("handlers/my-courseshandler.php");
if (!empty($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $sql = "SELECT * FROM Courses WHERE course_id='$course_id';";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_row($result);
    $_SESSION['course_details'] = $row;

    $teacher = $_SESSION['course_details'][5];
    $sql = "SELECT * FROM Teachers WHERE teacher_id='$teacher';";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_row($result);
    $_SESSION['teacher'] = $row;

    $stu_id = $_SESSION['student_info'][0];
    $sql = "SELECT * FROM GradesAndAttendence WHERE student_id=$stu_id and course_id=$course_id";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $_SESSION['student-grades']  = mysqli_fetch_row($result);
    } else {
        $_SESSION['student-grades'] = ["" ,"" ,"not graded", "not graded", "---"];
    }
    if(is_numeric($_SESSION['student-grades'][2])==1&&is_numeric($_SESSION['student-grades'][3])==1&&is_numeric($_SESSION['student-grades'][4])==1){
        if($_SESSION['student-grades'][2]>=20 && $_SESSION['student-grades'][3]>=25 && $_SESSION['student-grades'][4]>=10){
            array_push($_SESSION['student-grades'],"Pass");
        }
        else {
            array_push($_SESSION['student-grades'],"Failed");
        }
    }
    else {
        array_push($_SESSION['student-grades'],"---");
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

        .marg {
            margin-right: 7px;
            margin-left: 7px;
        }

        .thead-dark {
            background-color: #27AE60;
        }

        .whitefont {
            color: #FFF;
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
            <span><?php echo $_SESSION['student_info'][1] ?></span>
        </div>
        <a href="login.php" style="color:#fff;"><i class="fa fa-sign-out" style="font-size:22px; padding:10px;cursor:pointer "></i> </a>
    </div>

    <div class="parent-wrapper" id="outer-wrapper">
        <!-- SIDE MENU -->
        <div class="sidebar-nav-wrapper" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="student-dash.php"><i class="fa fa-home menu-icon"></i>Dashboard</a>
                </li>
                <li>
                    <a href="student-my-courses.php"><i class="fa fa-home menu-icon"></i>My Courses</a>
                </li>
                <li>
                    <a href="section-change.php"><i class="fa fa-home menu-icon"></i>Section Change</a>
                </li>
            </ul>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content" id="content-wrapper">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <h5 class="page-title"><?php echo $_SESSION['course_details'][1]; ?>: <?php echo $_SESSION['course_details'][2]; ?> </h5>

                        <h5 class="page-title prof">Prof. <?php echo $_SESSION['teacher'][1]; ?></h5>


                        <div class="section-divider"></div>

                        <h5 class="weekst page-title">Syllabus and Weekly Contents:</h5>

                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Syllabus</h5>
                                    <a href="content/Syllabus.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>

                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 1</h5>
                                    <a href="content/Week1.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 2</h5>
                                    <a href="content/Week2.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 3</h5>
                                    <a href="content/Week3.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 4</h5>
                                    <a href="content/Week4.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 5</h5>
                                    <a href="content/Week5.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 6</h5>
                                    <a href="content/Week6.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 7</h5>
                                    <a href="content/Week7.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 8</h5>
                                    <a href="content/Week8.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 9</h5>
                                    <a href="content/Week9.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 10</h5>
                                    <a href="content/Week10.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <h5 class="weeks page-title">Week 11</h5>
                                    <a href="content/Week11.pdf" download>
                                        <button class="btn"><i class="fa fa-download"></i> Download</button>
                                    </a>
                                </div>


                            </div>
                        </div>

                        <div class="section-divider"></div>

                        <h5 class="weekst page-title" style="margin-bottom: 20px;">Grades System:</h5>

                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="stat-item ">
                                        <div class="stats ">
                                            <div class="col-xs-8 count ">
                                                <h1>20%</h1>
                                                <p>Attendence And Participation</p>
                                            </div>
                                            <div class="col-xs-4 icon ">
                                                <i class="fa fa-line-chart ex-icon "></i>
                                            </div>
                                            <div class="clearfix "></div>
                                        </div>
                                        <div class="status ">
                                            <p class="text-ex "><i class="fa fa-exclamation-triangle "></i>at least 10/20</p>
                                        </div>
                                        <div class="clearfix "></div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4  col-sm-6  col-xs-12">
                                    <div class="stat-item ">
                                        <div class="stats ">
                                            <div class="col-xs-8 count ">
                                                <h1>35%</h1>
                                                <p>MIDTERM EXAM</p>
                                            </div>
                                            <div class="col-xs-4 icon ">
                                                <i class="fa fa-line-chart danger-icon "></i>
                                            </div>
                                            <div class="clearfix "></div>
                                        </div>
                                        <div class="status ">
                                            <p class="text-danger "><i class="fa fa-exclamation-triangle "></i>at least 20/35</p>
                                        </div>
                                        <div class="clearfix "></div>
                                    </div>
                                </div>




                                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12">
                                    <div class="stat-item ">
                                        <div class="stats ">
                                            <div class="col-xs-8 count ">
                                                <h1>45%</h1>
                                                <p>FINAL EXAM</p>
                                            </div>
                                            <div class="col-xs-4 icon ">
                                                <i class="fa fa-line-chart look-icon "></i>
                                            </div>
                                            <div class="clearfix "></div>
                                        </div>
                                        <div class="status ">
                                            <p class="text-look "><i class="fa fa-exclamation-triangle "></i>at least 25/45</p>
                                        </div>
                                        <div class="clearfix "></div>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="section-divider"></div>
                        <h5 class="weekst page-title" style="margin-bottom: 20px;">Grades and Attendence:</h5>

                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="whitefont" scope="col">Midterm</th>
                                            <th class="whitefont" scope="col">Final</th>
                                            <th class="whitefont" scope="col">Attendence</th>
                                            <th class="whitefont" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $_SESSION['student-grades'][2] ?></td>
                                            <td><?php echo $_SESSION['student-grades'][3] ?></td>
                                            <td><?php echo $_SESSION['student-grades'][4] ?></td>
                                            <td><?php echo $_SESSION['student-grades'][5] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="dash-footer col-lg-12">
                        <p>Copyright Bilgi</p>
                    </div>
                </div>
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