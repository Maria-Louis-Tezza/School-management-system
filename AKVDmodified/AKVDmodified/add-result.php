
<?php
session_start();
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$dbname = "schoolproject";

// Create a connection to the database
$data = mysqli_connect($host, $user, $password, $dbname);

if (isset($_POST['submit'])) {
    $marks = array();
    $class = $_POST['class'];
    $studentid = $_POST['studentid'];
    $mark = $_POST['marks'];
    

    // Get the list of subjects for the given class
    $subject_query = "SELECT tblsubjects.SubjectName, tblsubjects.id 
                      FROM tblsubjectcombination 
                      JOIN tblsubjects ON tblsubjects.id = tblsubjectcombination.SubjectId 
                      WHERE tblsubjectcombination.ClassId = '$class' 
                      ORDER BY tblsubjects.SubjectName";
    $subject_result = mysqli_query($data, $subject_query);

    // Store the subject IDs in an array
    $sid1 = array();
    while ($row = mysqli_fetch_assoc($subject_result)) {
        array_push($sid1, $row['id']);
    }
    $usertype=$_SESSION['username'];
    // Insert the marks into the database
    
    for ($i = 0; $i < count($mark); $i++) {
        $mar = $mark[$i];
        $sid = $sid1[$i];

        $sql = "INSERT INTO tblresult(StudentId, ClassId, SubjectId, marks, lastaccessed) 
                VALUES ('$studentid', '$class', '$sid', '$mar','$usertype')";
        $query = mysqli_query($data, $sql);

        if ($query) {
            $msg = "Result info added successfully";
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
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <script>
        function getStudent(val) {
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'classid=' + val,
                success: function (data) {
                    $("#studentid").html(data);

                }
            });
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'classid1=' + val,
                success: function (data) {
                    $("#subject").html(data);

                }
            });
        }
    </script>
    <script>

        function getresult(val, clid) {

            var clid = $(".clid").val();
            var val = $(".stid").val();;
            var abh = clid + '$' + val;
            //alert(abh);
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'studclass=' + abh,
                success: function (data) {
                    $("#reslt").html(data);

                }
            });
        }
    </script>
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

                            <!-- ========== LEFT SIDEBAR ========== -->


                            <div class="main-page">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <form class="form-horizontal" method="post">
                                                        <div class="form-group">
                                                            <label for="default"
                                                                class="col-sm-2 control-label">Class</label>
                                                            <div class="col-sm-10">
                                                                <select name="class" class="form-control clid"
                                                                    id="classid" onChange="getStudent(this.value);"
                                                                    required="required">
                                                                    <option value="">Select Class</option>
                                                                    <?php
                                                                    $host = "localhost";
                                                                    $user = "root";
                                                                    $password = "";
                                                                    $dbname = "schoolproject";

                                                                    $data = mysqli_connect($host, $user, $password, $dbname);

                                                                    $sql = "SELECT * from tblclasses";
                                                                    $query = mysqli_query($data, $sql);
                                                                    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);

                                                                    if (mysqli_num_rows($query) > 0) {
                                                                        foreach ($results as $result) {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo htmlentities($result['id']); ?>">
                                                                                <?php echo htmlentities($result['ClassName']); ?>&nbsp;
                                                                                Section-<?php echo htmlentities($result['Section']); ?>
                                                                            </option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="date" class="col-sm-2 control-label ">Student
                                                                Name</label>
                                                            <div class="col-sm-10">
                                                                <select name="studentid" class="form-control stid"
                                                                    id="studentid" required="required"
                                                                    onChange="getresult(this.value);">
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-10">
                                                                <div id="reslt"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="date"
                                                                class="col-sm-2 control-label">Subjects</label>
                                                            <div class="col-sm-10">
                                                                <div id="subject"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                <button type="submit" name="submit" id="submit"
                                                                    class="btn btn-primary">Declare Result</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-md-12 -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.content-container -->
                        </div>
                        <!-- /.content-wrapper -->
                    </div>
                    <!-- /.main-wrapper -->
                    <script src="js/jquery/jquery-2.2.4.min.js"></script>
                    <script src="js/bootstrap/bootstrap.min.js"></script>
                    <script src="js/pace/pace.min.js"></script>
                    <script src="js/lobipanel/lobipanel.min.js"></script>
                    <script src="js/iscroll/iscroll.js"></script>
                    <script src="js/prism/prism.js"></script>
                    <script src="js/select2/select2.min.js"></script>
                    <script src="js/main.js"></script>
                    <script>
                        $(function ($) {
                            $(".js-states").select2();
                            $(".js-states-limit").select2({
                                maximumSelectionLength: 2
                            });
                            $(".js-states-hide").select2({
                                minimumResultsForSearch: Infinity
                            });
                        });
                    </script>

                </div>
            </div>
        </div>



</body>

</html>

