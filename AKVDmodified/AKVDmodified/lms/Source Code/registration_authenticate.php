<?php

$rollno=$_POST['rollno'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$branch = $_POST['branch'];
$dob = $_POST['dob'];
$semail = $_POST['semail'];
$gender = $_POST['gender'];
$bg = $_POST['bg'];
$sem=$_POST['sem'];


$contact = $_POST['contact'];
$address = $_POST['address'];
$pass = $_POST['pass'];
$cpass=$_POST['cpass'];

if(!empty($fname) || !empty($lname) || !empty($branch) || !empty($mname) || !empty($rollno) || !empty($dob) || !empty($semail) || !empty($gender)|| !empty($bg)|| !empty($contact)|| !empty($address)|| !empty($pass)){
    $host="localhost";
    $dbusername = "root";
    $dbpassword="";
    $dbname="library";

}

//create connection
    try{
        $conn= new mysqli($host,$dbusername,$dbpassword,$dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

        }
        else{
            $SELECT = "SELECT student_rollno From student_table Where student_rollno = ? Limit 1";
            $INSERT = "INSERT INTO `student_table` (`student_rollno`, `student_firstname`, `student_middlename`, `student_lastname`, `student_date_of_birth`, `student_gender`, `student_bloodgroup`, `student_branch`, `student_semester`, `student_address`) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $INSERT2="INSERT INTO `student_login`(`student_rollno`, `student_password`, `student_emailid`, `student_contact`) VALUES (?,?,?,?)";

        //Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("i", $rollno);
            $stmt->execute();
            $stmt->bind_result($rollno);
            $stmt->store_result();
            $rnum = $stmt->num_rows;


            if($pass === $cpass){
                //checking username
                if ($rnum==0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("isssisssis",$rollno, $fname,$mname,$lname,$dob,$gender,$bg,$branch,$sem,$address);
                $stmt->execute();

                $stmt2 = $conn->prepare($INSERT2);
                $stmt2->bind_param("issi",$rollno, $pass,$semail,$contact);
                $stmt2->execute();

                header("location:index.php");
            ?>
                <script type="text/javascript">
                alert("USER REGISTRATION COMPLETED SUCCESSFULLY !!! ");
                </script>
            
            <?php    
                } else {
                    
                    header("location:registration.php");
            ?>
                    <script type='text/javascript'>alert('THE MAIL ID HAS ALREADY BEEN USED !!!')</script>
            <?php
                }
                $stmt->close();
                $stmt2->close();
                $conn->close();
            }else{
                
                header("location:registration.php");
            ?>
                <script>alert('Passwords do not match !!!')</script>
            <?php
            }
        }    
        die();
    }
    

catch (Exception $ex){
    echo"<script>
    alert('EXCEPTION OCCURED');
</script>";
}

?>