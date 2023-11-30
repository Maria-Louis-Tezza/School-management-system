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
$dbname = "schoolproject";

$data = mysqli_connect($host, $user, $password, $dbname);

if (isset($_POST['submit'])) {

    // define error messages array
    $errors = array();

    // Sanitize the input username
    $username = mysqli_real_escape_string($data, $_POST['fullanme']);

    // Query to check if the username already exists
    $sql = "SELECT COUNT(*) as count FROM admin WHERE username = '$username'";

    $result = mysqli_query($data, $sql);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Check if the username already exists
    if ($row['count'] > 0) {
        $errors['username'] = 'Username already exists';
    }

    // validate email
    if (!filter_var($_POST['emailid'], FILTER_VALIDATE_EMAIL)) {
        $errors['emailid'] = 'Invalid email address';
    }



    $password = $_POST['password'];

    if (strlen($password) < 8) {
        $errors['password'] = "Password should be at least 8 characters long.";

    } elseif (!preg_match("#[0-9]+#", $password)) {
        $errors['password'] = "Password should include at least one digit.";

    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $errors['password'] = "Password should include at least one upper case letter.";

    } elseif (!preg_match("#[a-z]+#", $password)) {
        $errors['password'] = "Password should include at least one lower case letter.";

    }



    if (count($errors) > 0) {
        $eflag = 1;
    } else {

        $name = $_POST['fullanme'];
        
        $email = $_POST['emailid'];
        $password = $_POST['password'];
        $usertype = 'Secondary';


        $sql = "INSERT INTO admin(username, email, password,usertype) 
            VALUES ('$name','$email', '$password','$usertype')";

        if (mysqli_query($data, $sql)) {
            $lastInsertId = mysqli_insert_id($data);
            if ($lastInsertId) {
                echo '<script>alert("Admin Created Successfully"); window.location = "admin.php";</script>';
            } else {
                $error = "Something went wrong. Please try again";
            }
        } else {
            $error = "Something went wrong. Please try again";
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
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">

    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
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
            margin-bottom: 3px;
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
            <div class="header">AKSHAYA VIDYALAYA.
                <ul>
                    <a href="logout.php"><button id="lobtn">Logout</button></a>

                </ul>
            </div>
            <div class="info" style="margin-bottom: 6px;">
                <div class="main-wrapper">



                    <div class="content-wrapper">
                        <div class="content-container">


                            <div class="main-page">


                                <section class="section" style="padding-top: 0px;">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <h5>Fill the Teacher info</h5>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">

                                                        <form class="form-horizontal" method="post"
                                                            enctype="multipart/form-data">

                                                            <div class="form-group">
                                                                <label for="default" class="col-sm-2 control-label">
                                                                    Username</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="fullanme"
                                                                        class="form-control" id="fullanme"
                                                                        required="required" autocomplete="off">
                                                                    <span class="help-block">Eg- Jake123, paul, etc
                                                                        etc</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="default"
                                                                    class="col-sm-2 control-label">Email id</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" name="emailid"
                                                                        class="form-control" id="email"
                                                                        required="required" autocomplete="off">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="password"
                                                                    class="col-sm-2 control-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="password"
                                                                        class="form-control" id="password"
                                                                        required="required" autocomplete="off">
                                                                    <span class="help-block">Should include 1 uppercase,
                                                                        lowercase alphabet and a digit
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        

                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <button type="submit" name="submit"
                                                                        class="btn btn-primary">Add</button>
                                                                </div>
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
                                            <!-- /.col-md-12 -->
                                        </div>










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