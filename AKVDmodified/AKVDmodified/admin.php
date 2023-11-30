<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$dbname = "schoolproject";

$data = mysqli_connect($host, $user, $password, $dbname);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <style>
        ul li ul.dropdown li {
            display: block;
        }

        ul li ul.dropdown {
            width: 100% position:absolute;
            z-index: 999;
            display: none;
        }

        ul li:hover ul.dropdown {
            display: block;

        }

        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Josefin Sans', sans-serif;
        }

        body {
            background-color: #f3f5f9;
        }

        .wrapper {
            display: flex;
            position: relative;
        }

        .wrapper .sidebar {
            width: 200px;
            height: 100%;
            background: #4b4276;
            padding: 0px 0px;
            position: fixed;
            paddpadding-left: 0px;
        }

        .wrapper .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            padding-top: -3px;
            margin-bottom: 0px;
        }

        .wrapper .sidebar h1 {
            color: white;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: -8px;
            margin-top: 3px;
        }

        .wrapper .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #bdb8d7;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);

            padding-left: 0.1em;

        }

        .wrapper .sidebar ul li a {
            color: #bdb8d7;
            display: block;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;

        }

        .wrapper .sidebar ul li a .fas {
            width: 25px;
        }

        .wrapper .sidebar ul li:hover {
            background-color: #594f8d;
        }

        .wrapper .sidebar ul li:hover a {
            color: #fff;
        }




        .wrapper .main_content {
            width: 100%;
            margin-left: 200px;
        }

        .wrapper .main_content .header {
            padding: 21px;
            background: #fff;
            color: #717171;
            border-bottom: 4px solid #e0e4e8;
        }

        .wrapper .main_content .info {
            margin: 20px;
            color: #717171;
            line-height: 25px;
        }

        .wrapper .main_content .info div {
            margin-bottom: 20px;
        }

        @media (max-height: 500px) {
            .social_media {
                display: none !important;
            }
        }

        #lobtn {

            text-decoration: none;
            float: right;
            padding: 12px;
            margin-top: -29px;
            color: #4b4276;
            width: 88px;
            background-color: white;
            border-radius: 35px;
        }


        #lobtn:hover {
            background-color: #4b4276;
            color: white;

            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <div>
        <h1 >ADMIN</h1>
        
    </div> -->
    <div class="wrapper">

    <?php
    if($_SESSION['usertype']=='Primary'){
        include('adminsidebar.php');
    }
    elseif($_SESSION['usertype']=='Secondary'){
            include('adminsidebarsec.php');
    }
        
        ?>
        <div class="main_content">
            <div class="header">AKSHAYA VIDYALAYA
                <ul>
                    <a href="logout.php"><button id="lobtn">Logout</button></a>

                </ul>
            </div>
            <div class="info">
                <div class="main-wrapper">

                    <div class="content-wrapper">
                        <div class="content-container">



                            <div class="main-page">


                                <section class="section">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <a class="dashboard-stat bg-primary" href="manage-students.php">
                                                    <?php
                                                    $sql1 = "SELECT id FROM user";
                                                    $query1 = mysqli_query($data, $sql1);

                                                    $totalstudents = mysqli_num_rows($query1);
                                                    ?>
                                                    <span class="number counter">
                                                        <?php echo htmlentities($totalstudents); ?>
                                                    </span>
                                                    <span class="name">Students</span>
                                                    <span class="bg-icon"><i class="fa fa-users"></i></span>
                                                </a>
                                                <!-- /.dashboard-stat -->
                                            </div>
                                            <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <a class="dashboard-stat bg-danger" href="manage-subjects.php">
                                                    <?php
                                                    $sql = "SELECT id FROM tblsubjects";
                                                    $query = mysqli_query($data, $sql);



                                                    $totalsubjects = mysqli_num_rows($query);
                                                    ?>
                                                    <span class="number counter">
                                                        <?php echo htmlentities($totalsubjects); ?>
                                                    </span>
                                                    <span class="name">Subjects Listed</span>
                                                    <span class="bg-icon"><i class="fa fa-book"></i></span>
                                                </a>
                                                <!-- /.dashboard-stat -->
                                            </div>
                                            <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:1%;">
                                                <a class="dashboard-stat bg-warning" href="manage-classes.php">
                                                    <?php
                                                    $sql2 = "SELECT id from  tblclasses ";
                                                    $query = mysqli_query($data, $sql2);
                                                    $totalclasses = mysqli_num_rows($query);
                                                    ?>
                                                    <span class="number counter">
                                                        <?php echo htmlentities($totalclasses); ?>
                                                    </span>
                                                    <span class="name">Total classes listed</span>
                                                    <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                                </a>
                                                <!-- /.dashboard-stat -->
                                            </div>
                                            <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:1%">
                                                <a class="dashboard-stat bg-success" href="manage-results.php">
                                                    <?php
                                                    $sql3 = "SELECT  distinct id from  teacher ";
                                                    $query = mysqli_query($data, $sql3);
                                                    $totalresults = mysqli_num_rows($query);

                                                    ?>

                                                    <span class="number counter">
                                                        <?php echo htmlentities($totalresults); ?>
                                                    </span>
                                                    <span class="name">Staff</span>
                                                    <span class="bg-icon"><i class="fa fa-users"></i></span>
                                                </a>
                                                <!-- /.dashboard-stat -->
                                            </div>
                                            <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.container-fluid -->
                                </section>
                                <!-- /.section -->

                            </div>
                            <!-- /.main-page -->


                        </div>
                        <!-- /.content-container -->
                    </div>
                    <!-- /.content-wrapper -->

                </div>
                <!-- /.main-wrapper -->
            </div>
        </div>
    </div>



</body>

</html>