<?php
session_start();
  if(!isset($_SESSION['username']))
  {
    header("location:login.php");
  }
  elseif($_SESSION['usertype']=='student')
  {
    header("location:login.php");
  }


$host="localhost";
$user="root";
$password="";
$db="schoolproject";


$data=mysqli_connect($host,$user,$password,$db);

if (isset($_POST['add_teacher'])) //onclicking add teacher button
{

    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file; 
    $dst_db = "image/" . $file; 

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql = "INSERT INTO teacher(name,description,image) VALUES ('$t_name', '$t_description','$dst_db')"; //as in db values as in declared
    $result = mysqli_query($data, $sql);
    if ($result) {
        header('location:admin_add_teacher.php');
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Add Teacher</title>
    <?php
include 'admin_css.php';
?>
<style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 500px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
	</head>
<body>

<?php
     include 'admin_sidebar.php';
     ?>


	<div class="content">
    <center>
            <h1>Add Teacher</h1><br>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">Teacher Name:</label>
                        <input type="text" name="name" id="">
                    </div>
                    

                    <div>
                        <label for="" >Description:</label>
                        <textarea name="description" id="" cols="40" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image" id="">
                    </div>
            
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_teacher" value="Add Teacher">
                    </div>
                </form>
            </div>

        </center>
	</div>

</body>
</html>