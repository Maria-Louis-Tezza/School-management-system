<?php
error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);


$sql = "SELECT * FROM attendance_records WHERE username = '$_SESSION[username]'";


$result = mysqli_query($data, $sql);
if ($_GET['username']) {
    $date = $_GET['date'];
   $status=$_GET['attendence_status'];


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
            padding-left: 0px;
        }

        .wrapper .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            padding-top: 32px;
            margin-bottom: 15px;
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
           








            <div class="content">
                <center>

                    <form action="" method="Post">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                            <th>Serial Number</th>
                                <th>Date</th>
                                <th>Attendence Status</th>
                                
                            </tr>
                        </thead>

                        
                                
                                <?php
                        $serialnumber=0;
                        $counter=0;
                        while ($info = $result->fetch_assoc()) {
                        $serialnumber++;
                            ?>
                            <tr>
                                <td><?php echo $serialnumber ?></td>
                                

                               
                                <td><?php echo $info['date'] ?>
                                </td>

                                
                                
                             <td>
                             <?php 
                                if($info['attendence_status'] == 'Present'){
                                echo '<label for="attendence_status" style="color: green;border: 2px solid green;text-align: center;border-radius:25px;padding-top: 4px;
                                padding-bottom: 4px;">Present</label>';
                                }else{
                                    echo '<label for="attendence_status" style="color: red;border: 2px solid red;text-align: center;border-radius:25px;padding-top: 4px;
    padding-bottom: 4px;">Absent</label>';

                                }
                            ?>
                            </td>
                                

                            </tr>
                            <?php
                            $counter++;
                        }
                        ?>
                    </table>
                    

                                
                    </form>
                </center>
            </div>





        </div>
    </div>











</body>

</html>