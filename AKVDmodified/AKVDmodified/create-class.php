<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}


$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";


$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['submit'])) {

    // define error messages array
    $errors = array();
    // Sanitize the input username
    $classnamenumeric1 = mysqli_real_escape_string($data, $_POST['classnamenumeric']);

    // Query to check if the username already exists
    $sql = "SELECT COUNT(*) as count FROM tblclasses WHERE ClassNameNumeric = '$classnamenumeric1'";

    $result = mysqli_query($data, $sql);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Check if the username already exists
    if ($row['count'] > 0) {
        $errors['classnamenumeric'] = 'Class already exists';
    }

    $classnamenumeric = $_POST['classnamenumeric'];


    if (!preg_match("#[0-9]+#", $classnamenumeric)) {
        $errors['classnamenumeric'] = "Enter numbers and not alphabets";
    }
    $section = $_POST['section'];
    if (!preg_match("#[A-Z]+#", $section)) {
        $errors['section'] = "Enter capital alphabets";
    }

    if (count($errors) > 0) {
        $eflag = 1;
    } else {

        $classname = $_POST['classname'];
        $classnamenumeric = $_POST['classnamenumeric'];
        $section = $_POST['section'];
        $sql = "INSERT INTO  tblclasses(ClassName,ClassNameNumeric,Section) VALUES('$classname','$classnamenumeric','$section')";
        $result = mysqli_query($data, $sql);
        if ($result) {
            echo '<script>alert("Class added successfully!"); window.location = "admin.php";</script>';
        }
    }

}
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
            margin-bottom: 5px;
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
</head>

<body>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <div>
        <h1>ADMIN</h1>
        
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


                                <section class="section" style="padding: 0px;">
                                    <div class="container-fluid">





                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <h5>Create Student Class</h5>
                                                        </div>
                                                    </div>


                                                    <div class="panel-body">

                                                        <form method="post">
                                                            <div class="form-group has-success">
                                                                <label for="success" class="control-label">Class
                                                                    Name</label>
                                                                <div class="">
                                                                    <input type="text" name="classname"
                                                                        class="form-control" required="required"
                                                                        id="success">
                                                                    <span class="help-block">Eg- Third, Fouth,Sixth
                                                                        etc</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group has-success">
                                                                <label for="success" class="control-label">Class Name in
                                                                    Numeric</label>
                                                                <div class="">
                                                                    <input type="text" name="classnamenumeric"
                                                                        required="required" class="form-control"
                                                                        id="classnamenumeric" maxlength="2">
                                                                    <span class="help-block">Eg- 1,2,4,5 etc</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group has-success">
                                                                <label for="success"
                                                                    class="control-label">Section</label>
                                                                <div class="">
                                                                    <input type="text" name="section"
                                                                        class="form-control" required="required"
                                                                        id="section" maxlength="1">
                                                                    <span class="help-block">Eg- A,B,C etc</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group has-success">

                                                                <div class="">
                                                                    <button type="submit" name="submit"
                                                                        class="btn btn-success btn-labeled">Submit<span
                                                                            class="btn-label btn-label-right"><i
                                                                                class="fa fa-check"></i></span></button>
                                                                </div>



                                                        </form>
                                                        <?php
                                                        if ($eflag) {
                                                            // There are errors, show error messages
                                                            echo '<div class="alert alert-danger">';
                                                            echo '<strong>Error!</strong> Please correct the following errors:';
                                                            echo '<ul>';
                                                            foreach ($errors as $error) {
                                                                echo '<li>' . $error . '</li>';
                                                            }
                                                            echo '</ul>';
                                                            echo '</div>';
                                                        }

                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-md-8 col-md-offset-2 -->
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