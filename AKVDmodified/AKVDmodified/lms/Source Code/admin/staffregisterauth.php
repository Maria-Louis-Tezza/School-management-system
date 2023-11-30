<?php

$empid=$_POST['empid'];
$e_fname = $_POST['e_fname'];
$e_mname = $_POST['e_mname'];
$e_lname = $_POST['e_lname'];
$e_dob = $_POST['e_dob'];
$e_email = $_POST['e_email'];
$e_gender = $_POST['e_gender'];


$e_contact = $_POST['e_contact'];
$e_address = $_POST['e_address'];
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
            $SELECT = "SELECT EMP_ID From employeee Where EMP_ID = ? Limit 1";
            $INSERT = "INSERT INTO `employeee`(`EMP_ID`, `E_FNAME`, `E_MNAME`, `E_LNAME`, `E_DOB`, `E_GENDER`, `E_ADDRESS`) VALUES (?,?,?,?,?,?,?)";
            $INSERT2="INSERT INTO `emplogin`(`EMP_ID`, `PASS`, `EMAIL`, `CONTACT NO`) VALUES (?,?,?,?)";

        //Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("i", $empid);
            $stmt->execute();
            $stmt->bind_result($empid);
            $stmt->store_result();
            $rnum = $stmt->num_rows;


            if($pass === $cpass){
                //checking username
                if ($rnum==0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("isssiss",$empid, $e_fname,$e_mname,$e_lname,$e_dob,$e_gender,$e_address);
                $stmt->execute();

                $stmt2 = $conn->prepare($INSERT2);
                $stmt2->bind_param("sssi",$empid, $pass,$e_email,$e_contact);
                $stmt2->execute();

                header("location:index.php");
            ?>
                <script type="text/javascript">
                alert("STAFF REGISTRATION COMPLETED SUCCESSFULLY !!! ");
                </script>
            
            <?php    
                } else {
                    
                    header("location:staffregister.php");
            ?>
                    <script type='text/javascript'>alert('THE MAIL ID HAS ALREADY BEEN USED !!!')</script>
            <?php
                }
                $stmt->close();
                $stmt2->close();
                $conn->close();
            }else{
                
                header("location:staffregister.php");
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