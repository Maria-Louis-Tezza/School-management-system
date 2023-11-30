<?php
require_once('connect.php');

$_SESSION['var']=0;
$ISBN="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$ISBN=$_POST["ISBN"];

		$query2="SELECT * FROM `book` WHERE ISBN=$ISBN";
    	$save2= mysqli_query($conn,$query2);
   		$num= mysqli_num_rows($save2);

		if($num == 1){
			
			$query3="DELETE FROM book WHERE ISBN = $ISBN";
    		$save3= mysqli_query($conn,$query3);
			header('Location:books.php');
		} else{
			header('Location:removeBook.php');
		}

		
	mysqli_close($conn);

}
?>
