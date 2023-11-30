<?php
require_once('connect.php');

$_SESSION['var']=0;
$ISBN="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$fine='0';
	$rollno=$_POST["rollno"];
	$ISBN=$_POST["ISBN"];
	$issue_date=$_POST["issue_date"];

	$sql1="SELECT * FROM `student_table` WHERE student_rollno = $rollno";
	$result1=$conn->query($sql1);

	if ($result1->num_rows > 0) 
	{   
		$sql2="SELECT * FROM `book` WHERE ISBN='$ISBN'";
		$result2=$conn->query($sql2);

		if ($result2->num_rows > 0) 
		{   
			$query="UPDATE book SET QUANTITY=QUANTITY-1 WHERE ISBN='$ISBN' AND QUANTITY!=0";
			$res=mysqli_query($conn, $query);

			if($res){

				$sql="INSERT INTO issued_books VALUES($rollno, '$ISBN', '$issue_date', '', $fine )";
				$result=mysqli_query($conn, $sql);

			}
			mysqli_close($conn);
			header('Location:home.php');
		} else{
			header('Location:issuebooks.php');
		}
		
	} else{
		header('Location:issuebooks.php');
	}
}