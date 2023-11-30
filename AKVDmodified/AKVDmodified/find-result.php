<?php
session_start();



$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";


$data = mysqli_connect($host, $user, $password, $db);


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
    </style>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <div>
        <h1>Student</h1>
        
    </div> -->
    <div class="wrapper">

        <div class="sidebar">
            <h2>Student</h2>
            <ul>
                <li><a href="admission.php"><i class="fas fa-solid fa-landmark"></i>Profile</a></li>
                <li><a href="admission.php"><i class="fas fa-solid fa-landmark"></i>Result</a></li>
                <li><a href="admission.php"><i class="fas fa-solid fa-landmark"></i>Report</a></li>
                <li><a href="admission.php"><i class="fas fa-solid fa-landmark"></i>Fees</a></li>


        </div>
        
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


                                    <section class="section">
                                        <div class="container-fluid">





                                            <div class="row">
                                                <div class="col-md-4 col-md-offset-4">
                                                    <div class="panel login-box">
                                                        <div class="panel-heading">
                                                            <div class="panel-title text-center">
                                                                <h4>School Result Management System</h4>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body p-20">



                                                            <form action="result.php" method="post">
                                                                <div class="form-group">
                                                                    <label for="rollid">Enter your Roll Id</label>
                                                                    <input type="text" class="form-control" id="rollid"
                                                                        placeholder="Enter Your Roll Id"
                                                                        autocomplete="off" name="rollid">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="default"
                                                                        class="col-sm-2 control-label">Class</label>
                                                                    <select name="class" class="form-control"
                                                                        id="default" required="required">
                                                                        <option value="">Select Class</option>
                                                                        <?php
                                                                        $sql = "SELECT * from tblclasses";
                                                                        $result = mysqli_query($data, $sql);
                                                                        if (mysqli_num_rows($result) > 0) {
                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                ?>
                                                                                <option
                                                                                    value="<?php echo htmlentities($row['id']); ?>">
                                                                                    <?php echo htmlentities($row['ClassName']); ?>&nbsp; Section-<?php echo htmlentities($row['Section']); ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group mt-20">
                                                                    <div class="">

                                                                        <button type="submit"
                                                                            class="btn btn-success btn-labeled pull-right">Search<span
                                                                                class="btn-label btn-label-right"><i
                                                                                    class="fa fa-check"></i></span></button>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>


                                                            </form>

                                                            <hr>

                                                        </div>
                                                    </div>
                                                    <!-- /.panel -->

                                                </div>
                                                <!-- /.col-md-6 col-md-offset-3 -->
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