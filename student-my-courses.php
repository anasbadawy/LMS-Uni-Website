<?php
include("handlers/my-courseshandler.php");
?>
<!DOCTYPE html>
<html>
<style>
    .btn {
        margin-top: 10px;
        background-color: #27AE60;
        border: none;
        color: white;
    }
</style>

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

    <script>
        function goToCourse(val) {
            window.location = "student-course.php?course_id=" + val;
        }
    </script>
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
                        <h5 class="page-title"><i class="fa fa-sliders"></i>My Courses</h5>
                        <div class="section-divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-sm-4">
                            <div class="dash-item first-dash-item">
                                <h6 class="item-title"><i class="fa fa-plus-circle"></i>ADD NEW COURSE</h6>
                                <div class="inner-item">
                                    <form class="dash-form" action="" method="POST">
                                        <label><i class="fa fa-code"></i>COURSE CODE</label>
                                        <select  name="chosenCourse" >
                                            <option>-- Select --</option>
                                            <?php foreach ($_SESSION['courses'] as $key => $value) : 
                                                $optionKey=$key+1;
                                                echo "<option value='$optionKey'>" . $_SESSION['courses'][$key][1] . '</option>';
                                             endforeach; 
                                             ?>
                                        </select>
                                        <label><i class="fa fa-info-circle"></i>WHY YOU WANT TO JOIN THIS COURSE</label>
                                        <textarea></textarea>
                                        <button class="btn" type="submit" name="submit"><i class="fa fa-plus"></i> Add</button>

                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="dash-item first-dash-item">
                                <h6 class="item-title"><i class="fa fa-sliders"></i>My Courses</h6>
                                <div class="inner-item">
                                    <table id="attendenceDetailedTable" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-book"></i>COURSE NAME</th>
                                                <th><i class="fa fa-code"></i>COURSE CODE</th>
                                                <th><i class="fa fa-user-secret"></i>COURSE TEACHER</th>
                                                <th><i class="fa fa-info-circle"></i>COURSE CREDIT</th>
                                                <th><i class="fa fa-info-circle"></i>COURSE LECTURE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($_SESSION['my-courses'] as $key => $value) : ?>
                                                <tr>
                                                    <td style="cursor:pointer" onClick="goToCourse(<?php echo $_SESSION['courses'][$value - 1][0]; ?>)"><?php echo $_SESSION['courses'][$value - 1][2]; ?></td>
                                                    <td style="cursor:pointer" onClick="goToCourse(<?php echo $_SESSION['courses'][$value - 1][0]; ?>)"><?php echo $_SESSION['courses'][$value - 1][1]; ?></td>
                                                    <td><?php echo $_SESSION['teachers'][$_SESSION['courses'][$value - 1][5] - 1][1]; ?></td>
                                                    <td><?php echo $_SESSION['courses'][$value - 1][3];  ?> Credit</td>
                                                    <td><?php echo $_SESSION['courses'][$value - 1][4][$_SESSION['courses-sections'][$key]]?></td>
                                                </tr>
                                            <?php endforeach; ?>
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