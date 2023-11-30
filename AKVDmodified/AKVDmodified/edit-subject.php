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

if (isset($_POST['update'])) {
    $subjectname = $_POST['subjectname'];
    $subjectcode = $_POST['subjectcode'];
    $sid = intval($_GET['subjectid']);

    $sql = "UPDATE tblsubjects SET SubjectName='$subjectname',  SubjectCode='$subjectcode' WHERE id=$sid";
    $result = mysqli_query($data, $sql);

    if ($result) {
        
        header("location:manage-subjects.php");
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





                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <h5>Update Student Class info</h5>
                                                        </div>
                                                    </div>

                                                    <form method="post">
                                                        <?php
                                                        $sid = intval($_GET['subjectid']);
                                                        $sql1 = "SELECT * from tblsubjects where id=$sid";
                                                        $query = mysqli_query($data, $sql1);
                                                        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                                        $cnt = 1;

                                                        if (mysqli_num_rows($query) > 0) {
                                                            foreach ($results as $result1) { ?>
                                                                <div class="form-group has-success">
                                                                    <label for="success" class="control-label">Subject
                                                                        Name</label>
                                                                    <div class="">
                                                                        <input type="text" name="subjectname"
                                                                            value="<?php echo htmlentities($result1['SubjectName']); ?>"
                                                                            required="required" class="form-control"
                                                                            id="success">
                                                                        <span class="help-block">Eg- Third, Fouth,Sixth
                                                                            etc</span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group has-success">
                                                                    <label for="success" class="control-label">Subject Code</label>
                                                                    <div class="">
                                                                        <input type="text" name="subjectcode"
                                                                            value="<?php echo htmlentities($result1['SubjectCode']); ?>"
                                                                            class="form-control" required="required"
                                                                            id="success">
                                                                        <span class="help-block">Eg- A,B,C etc</span>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                        } ?>
                                                        <div class="form-group has-success">

                                                            <div class="">
                                                                <button type="update" name="update"
                                                                    class="btn btn-success btn-labeled">Update<span
                                                                        class="btn-label btn-label-right"><i
                                                                            class="fa fa-check"></i></span></button>
                                                            </div>



                                                    </form>


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