<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} 


$host = "localhost";
$user = "root";
$password = "";
$dbname = "schoolproject";
$data = mysqli_connect($host, $user, $password, $dbname);

$stid = intval($_GET['stid']);

if(isset($_POST['submit'])) {
  $rowid = $_POST['id'];
  $marks = $_POST['marks']; 
  $usertype=$_SESSION['username'];
  foreach($_POST['id'] as $count => $id) {
    $mrks = $marks[$count];
    $iid = $rowid[$count];
    
    for($i = 0; $i <= $count; $i++) {
      $sql = "UPDATE tblresult SET marks='$mrks', lastaccessed='$usertype' WHERE id='$iid'";
      $query = mysqli_query($data, $sql);
      
    }
    if($query){
        echo '<script>alert("Student result updated successfully!"); window.location = "manage-results.php";</script>';
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
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Update the Result info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post">

                                                <?php 

$ret = "SELECT user.username,tblclasses.ClassName,tblclasses.Section from tblresult join user on tblresult.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=user.ClassId where user.StudentId='$stid' limit 1";
$result = mysqli_query($data,$ret);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>
    <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Class</label>
        <div class="col-sm-10">
            <?php echo htmlentities($row['ClassName']) ?>(<?php echo htmlentities($row['Section'])?>)
        </div>
    </div>
    <div class="form-group">
        <label for="default" class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-10">
            <?php echo htmlentities($row['username']);?>
        </div>
    </div>
<?php 
    } 
} 
?>

<?php 
$sql = "SELECT distinct user.username,user.id,tblclasses.ClassName,tblclasses.Section,tblsubjects.SubjectName,tblresult.marks,tblresult.id as resultid from tblresult join user on user.id=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=user.ClassId where user.id='$stid' ";
$results = mysqli_query($data,$sql);
if(mysqli_num_rows($results) > 0)
{
    while($result = mysqli_fetch_assoc($results))
    {
?>   
    <div class="form-group">
        <label for="default" class="col-sm-2 control-label"><?php echo htmlentities($result['SubjectName'])?></label>
        <div class="col-sm-10">
            <input type="hidden" name="id[]" value="<?php echo htmlentities($result['resultid'])?>">
            <input type="text" name="marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result['marks'])?>" maxlength="5" required="required" autocomplete="off">
        </div>
    </div>
<?php 
    } 
} 
?> 
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>

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
