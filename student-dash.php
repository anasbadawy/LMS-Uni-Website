<?php
include("handlers/loginhandler.php");

$stu_id = $_SESSION['student_info'][0];

$sql = "SELECT * FROM StudentsCourses WHERE stu_id=$stu_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck) {
    $studentCourses = json_decode($row[1], true);
} else {
    $studentCourses = [];
}
if(count($studentCourses)>0){
    
$sql = "SELECT * FROM Announcements;";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    for($c=0;$c<count($studentCourses);$c++){
        if($row[4]==$studentCourses[$c]){
            $announcements[] = $row;
        }
    }
}
if(isset($announcements)){
    $sql = "SELECT * FROM Courses;";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $courses[] = $row;
    }
    
    $sql = "SELECT * FROM Teachers;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $teachers[] = $row;
    }

    for ($i = 0; $i < count($announcements); $i++) {
        for ($j = 0; $j < count($courses); $j++) {
            if($announcements[$i][4]==$courses[$j][0]){
                array_push($announcements[$i],$courses[$j][1],$courses[$j][2]);
                $announcements[$i][3] =  date("Y-m-d H:i:s", strtotime('+3 hours', strtotime($announcements[$i][3])));
            }
        }
    }
    for ($i = 0; $i < count($announcements); $i++) {
        for ($j = 0; $j < count($teachers); $j++) {
            if($announcements[$i][5]==$teachers[$j][0]){
                array_push($announcements[$i],$teachers[$j][1]);
            }
        }
    }
    $announcements = array_reverse($announcements,true);
    $_SESSION['announcements'] = $announcements;
}
else {
    $_SESSION['announcements'] =[];
}


}
else {
    $_SESSION['announcements'] =[];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <!-- Styles -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/style.css" rel="stylesheet" media="screen">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

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
        <a href="handlers/destroy_session.php" style="color:#fff;"><i class="fa fa-sign-out" style="font-size:22px; padding:10px;cursor:pointer "></i> </a>
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
                <!-- the biging of the work -->

                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-md-12">
                            <div class="my-msg dash-item">
                                <h6 class="item-title"><i class="fa fa-bullhorn"></i>ANNOUNCEMENTS</h6>
                                <div class="inner-item dashboard-tabs">

                                    <div class="tab-content">
                                        <div style="height: 320px;overflow:auto" class="tab-pane active" id="1">
                                            <div class="announcement-item">
                                                <?php foreach ($_SESSION['announcements'] as $key => $value) :
                                                    echo "<h5>" . $_SESSION['announcements'][$key][1] . '</h5>';
                                                    echo "<h6> <i class='fa fa-clock-o'></i> Posted on: " . $_SESSION['announcements'][$key][3] . '</h6>';
                                                    echo "<p>" . $_SESSION['announcements'][$key][2] . '</p>';
                                                    echo '<div class="posted-by">';
                                                    echo ' <h6>Posted By: ' . $_SESSION['announcements'][$key][8] . '</h6>';
                                                    echo ' <h6>Posted To: ' . $_SESSION['announcements'][$key][6] . ' (' . $_SESSION['announcements'][$key][7] . ')</h6></div><br>';
                                                endforeach;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 clear-padding-xs">
                            <div class="col-sm-4">
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"><i class="fa fa-address-book-o"></i>MY PROFILE</h6>
                                    <div class="inner-item">
                                        <div class="profile-intro">
                                            <div class="col-xs-4 col-sm-12 col-md-4 clear-padding">
                                                <img src="images/sample.jpg" alt="user" />
                                            </div>
                                            <div class="col-xs-8 col-sm-12 col-md-8">
                                                <h5><?php echo $_SESSION['student_info'][1] ?></h5>
                                                <h6>Student, Semester 5</h6>
                                                <h6>Student ID: <?php echo $_SESSION['student_info'][0] ?></h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="profile-details">
                                            <div class="detail-row">
                                                <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                                                    <span>FACULTY</span>
                                                    <p><?php echo $_SESSION['student_info'][3] ?></p>
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                                                    <span>DEPARTMENT</span>
                                                    <p><?php echo $_SESSION['student_info'][2] ?></p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="detail-row">
                                                <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                                                    <span>EMAIL</span>
                                                    <p><?php echo $_SESSION['student_info'][4] ?></p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="detail-row">
                                                <div class="col-md-6 col-sm-12 col-xs-6 clear-padding">
                                                    <span>ADVISOR</span>
                                                    <p>Elena Battini Sönmez</p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <!--THe biging of the calenderDIV-->
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"> <i class="fa-calendar-check-o"></i> CALENDER </h6>

                                    <table class="table">
                                        <tr>
                                            <th>Date</th>
                                            <th>occasion</th>
                                            <th>remaining Days</th>
                                        </tr>
                                        <tr>
                                            <td>Thursday, April 23, 2020</td>
                                            <td>Holiday (Ulusal Egemenlik ve Çocuk Bayramı)</td>
                                            <td>7 day(s)</td>
                                        </tr>
                                        <tr>
                                            <td>Friday, May 1, 2020</td>
                                            <td>Holiday (Emek ve Dayanışma Günü)</td>
                                            <td>15 day(s)</td>
                                        </tr>
                                        <tr>
                                            <td>Friday, May 8, 2020</td>
                                            <td>End of Spring Semester Classes</td>
                                            <td>22 day(s)</td>
                                        </tr>
                                        <tr>
                                            <td>Friday, May 8, 2020 - Tuesday, June 2, 2020</td>
                                            <td>Make ups for Application Studies</td>
                                            <td>22 day(s)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday, May 19, 2020 </td>
                                            <td>Holiday (Atatürk’ü Anma, Gençlik ve Spor Bayramı)</td>
                                            <td>33 day(s)</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday, May 23, 2020 - Tuesday, May 26, 2020</td>
                                            <td>Holiday (Ramazan Bayramı)</td>
                                            <td>37 day(s)</td>
                                        </tr>
                                    </table>
                                    <!--THe ending of the calenderDIV-->
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