<?php
include("handlers/announcementhandler.php");
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

</head>
<script>
    function goToCourse(val) {
        window.location = "teacher-course.php?course_id=" + val;
    }
</script>

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
                        <h5 class="page-title"><i class="fa fa-sliders"></i>MY COURSES</h5>
                        <div class="section-divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-sm-12">
                            <div class="dash-item first-dash-item">
                                <h6 class="item-title"><i class="fa fa-sliders"></i>MY COURSES</h6>
                                <div class="inner-item">
                                    <table id="attendenceDetailedTable" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-book"></i>COURSE NAME</th>
                                                <th><i class="fa fa-code"></i>COURSE CODE</th>
                                                <th><i class="fa fa-user-secret"></i>STUDENT NUMBER</th>
                                                <th><i class="fa fa-info-circle"></i>COURSE CREDIT</th>
                                                <th><i class="fa fa-info-circle"></i>COURSE LECTURES SCHEDULE </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($_SESSION['courses'] as $key => $value) :
                                                echo "<tr>";
                                                echo "<td style='cursor:pointer' onClick='goToCourse(" . $_SESSION['courses'][$key][0] .")'>" . $_SESSION['courses'][$key][2] . '</td>';
                                                echo "<td style='cursor:pointer' onClick='goToCourse(" . $_SESSION['courses'][$key][0] .")'>" . $_SESSION['courses'][$key][1] . '</td>';
                                                echo "<td>" . "25" . '</td>';
                                                echo "<td>" . $_SESSION['courses'][$key][3] . '</td>';
                                                echo "<td>" . "First Section Hours -> " .  $_SESSION['courses'][$key][4][0] . " <br>Second Section Hours -> " . $_SESSION['courses'][$key][4][1] . " <br>Third Section Hours -> " .  $_SESSION['courses'][$key][4][2] .  '</td>';
                                                echo "</tr>";
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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