<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'> 
    alert('$message');
    
    </script>";
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<nav>
		<label class="logo">Akshaya Vidyalaya</label>

		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="admissionform.php">Admission</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>


	<div class="section1">
		
		<label class="img_text">We Teach Students With Care</label>
		<img class="main_img" src="school_management.jpg">
	</div>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="welcome_img" src="school.jpg">
				
			</div>

			<div class="col-md-8">

				<h1>Welcome to Akshaya Vidyalaya</h1>

				<p>MEMS has been committed to global learning long before it became an indispensable feature of contemporary education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.MEMS has been committed to global learning long before it became an indispensable feature of contemporary education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.</p>
				
			</div>
			

		</div>
		

	</div>


	<center>
		<h1>Our Teachers</h1>
	</center>


	<div class="container">

		<div class="row">
            <?php
            while ($info = $result->fetch_assoc()) {
                ?>

			<div class="col-md-4">

				<img class="teacher" src="<?php echo"{$info['image']}"?>">

				<h3><?php echo"{$info['name']}"?></h3>
				<h5><?php echo"{$info['description']}"?></h5>
			</div>
			<?php
            }
            ?>

		</div>
		

	</div>






	<center>
		<h1>Our Courses</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="web.jpg">
				<h3>Web Development</h3>
				
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="graphic.jpg">
				<h3>Graphics Design</h3>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="marketing.png">
				<h3>Marketing</h3>
				
			</div>
			

		</div>
		

	</div>

    
		
	</div>
	


	
</body>
</html>