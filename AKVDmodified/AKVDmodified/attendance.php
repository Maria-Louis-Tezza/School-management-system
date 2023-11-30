<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} 
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);


$sql = "SELECT * FROM user WHERE  teacher_name = '$_SESSION[username]'";


$result = mysqli_query($data, $sql);


if (isset($_POST['submit'])) {
    // define error messages array
    $errors = array();
    // Sanitize the input username
    $date = mysqli_real_escape_string($data, $_POST['date']);

    // Query to check if the username already exists
    $sql = "SELECT COUNT(*) as count FROM attendance_records WHERE date = '$date'";

    $result = mysqli_query($data, $sql);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Check if the username already exists
    if ($row['count'] > 0) {
        $errors['date'] = 'Attendance for Given Date Already Exists';
    }
    if (count($errors) > 0) {
        $eflag = 1;
    } else {
        foreach ($_POST['attendence_status'] as $id => $attendence_status) {
            $username = $_POST['username'][$id];
            $roll_number = $_POST['roll_number'][$id];
            $datee = $_POST['date'];
            [$id];
            $attendence_status = $_POST['attendence_status'][$id];
            $teacher_name = $_SESSION['username'];
            mysqli_query($data, "INSERT into attendance_records(username,roll_number,attendence_status,date,teacher_name) values ('$username','$roll_number','$attendence_status','$datee','$teacher_name')");
        }


        echo '<script>alert("Attendance Updated successfully!"); window.location = "teacherhome.php";</script>';

    }

}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

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
        <h1>ADMIN</h1>
        
    </div> -->
    <div class="wrapper">

        <?php
        include('teachersidebar.php');
        ?>
        <div class="main_content">
            <div class="header">Welcome!! Have a nice day.
                <ul>
                    <a href="logout.php"><button id="lobtn">Logout</button></a>

                </ul>
            </div>
            <div class="content">
                <center>


                    <form action="" method="Post">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>

                                    <div class="well text-center" style="padding:0px;">
                                        <label for="date" class="text-center">SELECT DATE:</label>
                                        <div style="padding-left:514px;">
                                            <input type="date" id="date" name="date" class="well text-center" required
                                                max="{{ getDateToday() }}">
                                            <span class="invalid-feedback">Please select a valid date.</span>
                                        </div>
                                    </div>

                                    <script>
                                        function getDateToday() {
                                            let today = new Date().toISOString().slice(0, 10);
                                            return today;
                                        }

                                        // Add event listener to date input field
                                        document.getElementById("date").addEventListener("input", function (event) {
                                            // Check if selected date is in the future
                                            if (event.target.value > getDateToday()) {
                                                event.target.setCustomValidity("Please select a date that is not in the future.");
                                            } else {
                                                event.target.setCustomValidity("");
                                            }
                                        });
                                    </script>
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

                                </tr>
                                <tr>

                                    <th>Serial Number</th>
                                    <th>Photo </th>
                                    <th>Username</th>
                                    <th>Roll no</th>
                                    <th>Attendence Status</th>


                                </tr>
                            </thead>
                            <tfoot class="bg-light">
                                <tr class="bg-light">
                                    <th>Serial Number</th>
                                    <th>Photo </th>
                                    <th>Username</th>
                                    <th>Roll no</th>
                                    <th>Attendence Status</th>
                                </tr>
                            </tfoot>

                            <?php
                            $serialnumber = 0;
                            $counter = 0;
                            while ($info = $result->fetch_assoc()) {
                                $serialnumber++;
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $serialnumber ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <img src="<?php echo $info['image'] ?>" alt="" style="width: 45px; height: 45px"
                                                class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">
                                                    <?php echo $row['username'] ?>
                                                </p>


                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <?php echo $info['username'] ?>
                                        <input type="hidden" value="<?php echo $info['username'] ?>" name="username[]">
                                    </td>

                                    <td>
                                        <p class="fw-bold mb-1">
                                            <?php echo "{$info['id']}" ?>
                                            <input type="hidden" value="<?php echo $info['id'] ?>" name="roll_number[]">

                                        </p>

                                    </td>
                                    <td>
                                        <input type="radio" name="attendence_status[<?php echo $counter; ?>]"
                                            value="Present">Present
                                        <input type="radio" name="attendence_status[<?php echo $counter; ?>]"
                                            value="Absent">Absent

                                    </td>


                                </tr>
                                <?php
                                $counter++;
                            }
                            ?>
                        </table>

                        <div style="padding-top:15px;">
                            <input class='btn btn-primary' type="submit" value="SUBMIT" name="submit">
                        </div>



                    </form>

                </center>
            </div>





        </div>
    </div>





</body>

</html>