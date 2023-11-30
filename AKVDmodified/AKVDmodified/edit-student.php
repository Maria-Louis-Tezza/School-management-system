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

$stid = intval($_GET['stid']);

if (isset($_POST['submit'])) {
    $studentname = $_POST['fullanme'];
    $roolid = $_POST['rollid'];
    $studentemail = $_POST['emailid'];
    $gender = $_POST['gender'];
    $classid = $_POST['class'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];
    $usertype= $_SESSION['username'];
    $password = $_POST['password'];






    
    $sql = "UPDATE user SET username='" . $studentname . "', lastaccessed='" . $usertype . "', RollId='" . $roolid . "', email='" . $studentemail . "', Gender='" . $gender . "', DOB='" . $dob . "', Status='" . $status . "', password='" . $password . "' WHERE id=" . $stid;
    $result = mysqli_query($data, $sql);
    if ($result) {
        $msg = "Student info updated successfully";
        header("location:manage-students.php");
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


                                <section class="section">
                                    <div class="container-fluid">
                                        <form class="form-horizontal" method="post">
                                            <?php

                                            $sql = "SELECT user.username, user.RollId, user.id, user.Status,user.password, user.email, user.Gender, user.DOB, tblclasses.ClassName, tblclasses.Section FROM user JOIN tblclasses ON tblclasses.id = user.ClassId WHERE user.id = '{$stid}'";
                                            $results = mysqli_query($data, $sql);
                                            $cnt = 1;
                                            if (mysqli_num_rows($results) > 0) {
                                                while ($result = mysqli_fetch_assoc($results)) {
                                                    ?>


                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Full Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="fullanme" class="form-control"
                                                                id="fullanme"
                                                                value="<?php echo htmlentities($result['username']) ?>"
                                                                required="required" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Rool Id</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="rollid" class="form-control" id="rollid"
                                                                value="<?php echo htmlentities($result['RollId']) ?>"
                                                                maxlength="5" required="required" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Email id</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="emailid" class="form-control" id="email"
                                                                value="<?php echo htmlentities($result['email']) ?>"
                                                                required="required" autocomplete="off">
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Gender</label>
                                                        <div class="col-sm-10">
                                                            <?php $gndr = $result['Gender'];
                                                            if ($gndr == "Male") {
                                                                ?>
                                                                <input type="radio" name="gender" value="Male" required="required"
                                                                    checked>Male
                                                                <input type="radio" name="gender" value="Female"
                                                                    required="required">Female
                                                                <input type="radio" name="gender" value="Other"
                                                                    required="required">Other
                                                            <?php } ?>
                                                            <?php
                                                            if ($gndr == "Female") {
                                                                ?>
                                                                <input type="radio" name="gender" value="Male"
                                                                    required="required">Male
                                                                <input type="radio" name="gender" value="Female" required="required"
                                                                    checked>Female
                                                                <input type="radio" name="gender" value="Other"
                                                                    required="required">Other
                                                            <?php } ?>
                                                            <?php
                                                            if ($gndr == "Other") {
                                                                ?>
                                                                <input type="radio" name="gender" value="Male"
                                                                    required="required">Male
                                                                <input type="radio" name="gender" value="Female"
                                                                    required="required">Female
                                                                <input type="radio" name="gender" value="Other" required="required"
                                                                    checked>Other
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Class</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="classname" class="form-control" id="classname"
                                                        value="<?php echo htmlentities($result['ClassName']) ?>(<?php echo htmlentities($result['Section']) ?>)"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">DOB</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control"
                                                        value="<?php echo htmlentities($result['DOB']) ?>" id="date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="password" class="form-control"
                                                        value="<?php echo htmlentities($result['password']) ?>" id="password">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <?php $stats = $result['Status'];
                                                    if ($stats == "1") {
                                                        ?>
                                                        <input type="radio" name="status" value="1" required="required"
                                                            checked>Active <input type="radio" name="status" value="0"
                                                            required="required">Block
                                                    <?php } ?>
                                                    <?php
                                                    if ($stats == "0") {
                                                        ?>
                                                        <input type="radio" name="status" value="1" required="required">Active
                                                        <input type="radio" name="status" value="0" required="required"
                                                            checked>Block
                                                    <?php } ?>



                                                </div>
                                            </div>
                                            

                                        <?php }
                                            } ?>



                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    </form>



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