<?php
session_start();
error_reporting(0);


$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";


$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
$result = mysqli_query($data, $sql);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
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
            margin-bottom: 24px;
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
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <script>
        $(function ($) {

        });


        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
</head>

<body>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <div>
        <h1>Student</h1>
        
    </div> -->
    <div class="wrapper">

        <?php include('studentsidebar.php'); ?>

        <div class="main_content">
            <div class="header">Welcome!! Have a nice day.
                <ul>
                    <a href="logout.php"><button id="lobtn">Logout</button></a>

                </ul>
            </div>
            <div class="info">
                <div class="main-wrapper">


                    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
                    <div class="content-wrapper">
                        <div class="content-container">



                            <div class="main-page">


                                <section class="section" id="exampl">
                                    <div class="container-fluid">






                                        <div class="row">



                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <h3 align="center">Student Result Details</h3>
                                                            <hr />
                                                            <?php
                                                            $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
                                                            $result = mysqli_query($data, $sql);
                                                            $qery = "SELECT user.username, user.RollId, user.id, user.Status, tblclasses.ClassName, tblclasses.Section FROM user JOIN tblclasses ON tblclasses.id = user.ClassId where username='$_SESSION[username]' ";
                                                            $resultss = $data->query($qery);
                                                            $cnt = 1;
                                                            if (!empty($resultss) > 0) {
                                                                foreach ($resultss as $row) {
                                                                    ?>
                                                                    <p><b>Student Name :</b>
                                                                        <?php echo htmlentities($row['username']); ?>
                                                                    </p>
                                                                    <p><b>Student Roll Id :</b>
                                                                        <?php echo htmlentities($row['RollId']); ?>
                                                                    <p><b>Student Class:</b>
                                                                        <?php echo htmlentities($row['ClassName']); ?>(
                                                                        <?php echo htmlentities($row['Section']); ?>)
                                                                        <?php
                                                                }

                                                                ?>
                                                            </div>
                                                            <div class="panel-body p-20">







                                                                <table class="table table-hover table-bordered" border="1"
                                                                    width="100%">
                                                                    <thead>
                                                                        <tr style="text-align: center">
                                                                            <th style="text-align: center">#</th>
                                                                            <th style="text-align: center"> Subject</th>
                                                                            <th style="text-align: center">Marks</th>
                                                                        </tr>
                                                                    </thead>




                                                                    <tbody>
                                                                        <?php
                                                                        // Code for result
                                                                    
                                                                        $query = "select t.username,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.username,sts.RollId,sts.ClassId,tr.marks,SubjectId from user as sts join  tblresult as tr on tr.StudentId=sts.id) as t join tblsubjects on tblsubjects.id=t.SubjectId ";
                                                                        $results = mysqli_query($data, $query);
                                                                        $cnt = 1;
                                                                        if (mysqli_num_rows($results) > 0) {
                                                                            while ($result = mysqli_fetch_object($results)) {
                                                                                ?>

                                                                                <tr>
                                                                                    <th scope="row" style="text-align: center">
                                                                                        <?php echo htmlentities($cnt); ?>
                                                                                    </th>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo htmlentities($result->SubjectName); ?>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo htmlentities($totalmarks = $result->marks); ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                                $totlcount += $totalmarks;
                                                                                $cnt++;
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <th scope="row" colspan="2"
                                                                                    style="text-align: center">Total
                                                                                    Marks</th>
                                                                                <td style="text-align: center"><b>
                                                                                        <?php echo htmlentities($totlcount); ?>
                                                                                    </b> out of <b>
                                                                                        <?php echo htmlentities($outof = ($cnt - 1) * 100); ?>
                                                                                    </b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" colspan="2"
                                                                                    style="text-align: center">
                                                                                    Percntage</th>
                                                                                <td style="text-align: center"><b>
                                                                                        <?php echo htmlentities($totlcount * (100) / $outof); ?>
                                                                                        %
                                                                                    </b></td>
                                                                            </tr>

                                                                            <tr>

                                                                                <td colspan="3" align="center"><i
                                                                                        class="fa fa-print fa-2x"
                                                                                        aria-hidden="true"
                                                                                        style="cursor:pointer"
                                                                                        OnClick="CallPrint(this.value)"></i>
                                                                                </td>
                                                                            </tr>

                                                                        <?php } else { ?>
                                                                            <div class="alert alert-warning left-icon-alert"
                                                                                role="alert">
                                                                                <strong>Notice!</strong> Your result not declare
                                                                                yet
                                                                            <?php }
                                                                        ?>
                                                                        </div>
                                                                        <?php
                                                            } else { ?>

                                                                        <div class="alert alert-danger left-icon-alert"
                                                                            role="alert">
                                                                            <strong>Oh snap!</strong>
                                                                            <?php
                                                                            echo htmlentities("Invalid Roll Id");
                                                            }
                                                            ?>
                                                                    </div>



                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <!-- /.panel -->
                                                </div>
                                                <!-- /.col-md-6 -->



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