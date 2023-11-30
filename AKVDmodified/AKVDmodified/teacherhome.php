<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:logint.php");
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
</head>

<body>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <div>
        <h1>ADMIN</h1>
        
    </div> -->
    <div class="wrapper">

        <?php include('teachersidebar.php'); ?>
        <div class="main_content">
            <div class="header">AKSHAYA VIDYALAYA.
                <ul>
                    <a href="logout.php"><button id="lobtn">Logout</button></a>

                </ul>
            </div>
            <div class="info">
                <?php
                // Retrieve user details from the database
                $query = "SELECT * FROM teacher WHERE username = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($data, $query);

                // Check if the query was successful
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($data);
                }
                ?>
                <div class="profile-card">
                    <div class="profile-image">
                        <img src="<?php echo $row['image']; ?>" alt="Profile Image">
                    </div>
                    <div class="profile-details">
                        <h2>
                            <?php echo $row['username']; ?>
                        </h2>
                        <p>Email:
                            <?php echo $row['email']; ?>
                        </p>
                        <p>Emp ID:
                            <?php echo $row['EmpID']; ?>
                        </p>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>
<style>
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
        padding: 30px 0px;
        position: fixed;
    }

    .wrapper .sidebar h2 {
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 7px;
    }

    .wrapper .sidebar ul li {
        padding: 15px;
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .wrapper .sidebar ul li a {
        color: #bdb8d7;
        display: block;
        text-decoration: none;
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
        padding: 20px;
        padding-bottom: 42px;
        background: #fff;
        color: #717171;
        border-bottom: 1px solid #e0e4e8;
    }

    .wrapper .main_content .info {
        margin: 20px;
        color: #717171;
        line-height: 25px;
        margin-left: 370px;
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
        margin-top: -18px;
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

    .profile-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        width: 300px;
        height: 500px;
        margin: 20px;
    }

    .profile-card h2 {
        font-size: 24px;
        margin: 0 0 10px 0;
        text-align: center;
        color: #333;
    }

    .profile-card img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .profile-card p {
        font-size: 18px;
        margin: 10px 0;
        text-align: center;
        color: #666;
    }

    .profile-card span {
        font-weight: bold;
        color: #333;
    }

    .profile-card button {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 20px;
        cursor: pointer;
        font-size: 18px;
    }

    .profile-card button:hover {
        background-color: #666;
    }
</style>

</html>