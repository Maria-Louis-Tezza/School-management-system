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
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db); //connected to db, storing it in $data variable

if (isset($_POST['add_student'])) //onclicking add student button
{

    $username = $_POST['name'];
    $user_email = $_POST['email']; //line70
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student"; //whenever admin adds a new student then the usertype will be student.

    $check = "SELECT * from user WHERE username='$username'"; //does the username given by admin already exist in the user table.

    $check_user = mysqli_query($data, $check);

    $row_count = mysqli_num_rows($check_user); //couting if there are multiple users under the same name.

    if ($row_count == 1) {
        echo "<script type='text/javascript'>
        alert('Username Already Exists')
         </script>";
    } else {



        $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username', '$user_email','$user_phone','$usertype','$user_password')"; //as in db values as in declared

        $result = mysqli_query($data, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
        alert('Data Successfully Uploaded')
         </script>";

        } else { {
                echo "data uploaded umsuccessfully";
            }
        }
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

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
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    <?php
    include 'admin_css.php';
    ?>
</head>

<body>

    <?php
    include 'admin_sidebar.php';
    ?>


    <div class="content">
        <center>
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label for=""> Username</label>
                        <input type="text" name="name" id="">
                    </div>
                    <div>
                        <label for=""> Email</label>
                        <input type="email" name="email" id="">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="tel" name="phone" id="">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" id="">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>

        </center>
    </div>

</body>

</html>