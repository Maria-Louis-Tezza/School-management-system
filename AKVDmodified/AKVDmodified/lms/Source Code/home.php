<?php
require_once('connect.php');
session_start();
if (!isset($_SESSION['key'])) {

    header('Location:index.php');
}
include('header.php');
include('navbar.php');

$host = "localhost";
$user = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($host, $user, $password, $dbname);
?>

<head>

    <style>
        /* Style for the dashboard container */
        .dashboard {
            margin: 0 auto;
            max-width: 1200px;
            padding: 20px;
        }

        /* Style for the dashboard statistics */
        .dashboard-stat {
            display: flex;
            height: 100px;
            padding: 20px;
            text-align: center;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        }

        /* Background colors for each statistic */
        .bg-primary {
            background-color: #007bff;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-success {
            background-color: #28a745;
        }

        /* Style for the statistic number */
        .number {
            font-size: 48px;
            font-weight: bold;
            display: block;
        }

        /* Style for the statistic name */
        .name {
            font-size: 24px;
            display: block;
            margin-top: 10px;
        }

        /* Style for the statistic background icon */
        .bg-icon {
            font-size: 36px;
            display: block;
            margin-top: 10px;
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
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="js/modernizr/modernizr.min.js"></script>

</head>

<body>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-6 col-ml-12">
                <div class="row">
                    <!-- Server side start -->
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="books.php">
                                            <?php
                                            $sql1 = "SELECT ISBN FROM book ";
                                            $query1 = mysqli_query($conn, $sql1);

                                            $totalbooks = mysqli_num_rows($query1);
                                            ?>
                                            <span class="number counter">
                                                <?php echo htmlentities($totalbooks); ?>
                                            </span>
                                            <span class="name">Books</span>

                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="#">
                                            <?php
                                            $sql = "SELECT AUTH_ID FROM author";
                                            $query = mysqli_query($conn, $sql);



                                            $total = mysqli_num_rows($query);
                                            ?>
                                            <span class="number counter">
                                                <?php echo htmlentities($total); ?>
                                            </span>
                                            <span class="name">Authors</span>

                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:1%;">
                                        <a class="dashboard-stat bg-warning" href="issuedbooks.php">
                                            <?php
                                            $sql2 = "SELECT ISBN from  issued_books ";
                                            $query = mysqli_query($conn, $sql2);
                                            $total = mysqli_num_rows($query);
                                            ?>
                                            <span class="number counter">
                                                <?php echo htmlentities($total); ?>
                                            </span>
                                            <span class="name">Books Issued</span>

                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:1%">
                                        <a class="dashboard-stat bg-success" href="#">
                                            <?php
                                            $sql3 = "SELECT  distinct EMP_ID from  employeee ";
                                            $query = mysqli_query($conn, $sql3);
                                            $total = mysqli_num_rows($query);

                                            ?>

                                            <span class="number counter">
                                                <?php echo htmlentities($total); ?>
                                            </span>
                                            <span class="name">Staff</span>
                                            
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->






                                </div>
                                <!-- /.row -->

                            </div>
                        </div>
                    </div>
                    <!-- Server side end -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- main content area end -->
</body>
<?php include('footer.php'); ?>