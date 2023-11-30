<?php 

		include('connect.php');

		$ISBN=$TITLE=$LANGUAGE=$MRP=$PUB_DATE=$QUANTITY=$AUTHID=$AUTHNAME=$PUBLISHER="";

		$ISBN_ERR=$TITLE_ERR=$LANGUAGE_ERR=$AUTHID_ERR=$AUTHNAME_ERR=$MRP_ERR=$PUB_DATE_ERR=$QUANTITY_ERR=$PUBLISHER_ERR="";

		if($_SERVER["REQUEST_METHOD"]=="POST")
		{

			//ROLL NUMBER
			if(empty(trim($_POST["ISBN"])))
			{
				$ISBN_ERR = "Kindly enter a ISBN";
			}
			else
			{
				$ISBN=$_POST["ISBN"];
			}
			//TITLE
			if (empty(trim($_POST["TITLE"]))) 
			{
				$TITLE_ERR = "Enter TITLE of a Book";
			}
			else
			{
				$TITLE=trim($_POST["TITLE"]);
			}
			//LANGUAGE
			if (empty(trim($_POST["LANGUAGE"]))) 
			{
				$LANGUAGE_ERR = "Enter LANGUAGE of a Book";
			}
			else
			{
				$LANGUAGE=trim($_POST["LANGUAGE"]);
			}

			//Author_id
			if (empty(trim($_POST["Author_id"]))) 
			{
				$AUTHID_ERR = "Enter AUTHOR ID of a Book";
			}
			else
			{
				$AUTHID=trim($_POST["Author_id"]);
			}

			//Author_id
			if (empty(trim($_POST["Author_name"]))) 
			{
				$AUTHNAME_ERR = "Enter Author Name of a Book";
			}
			else
			{
				$AUTHNAME=trim($_POST["Author_name"]);
			}

			//PUBLISHER
			if (empty(trim($_POST["PUBLISHER"]))) 
			{
				$PUBLISHER_ERR = "Enter PUBLISHER of a Book";
			}
			else
			{
				$PUBLISHER=trim($_POST["PUBLISHER"]);
			}
			//MRP
			if (empty(trim($_POST["MRP"]))) 
			{
				$MRP_ERR= "Enter Price of Book";
			}
			else
			{
				$MRP=trim($_POST["MRP"]);
			}
			//PUB_DATE
			if (empty(trim($_POST["PUB_DATE"]))) 
			{
				$PUB_DATE_ERR= "Enter Published Date of Book";
			}
			else
			{
				$PUB_DATE=trim($_POST["PUB_DATE"]);
			}
			//QUANTITY
			if (empty(trim($_POST["QUANTITY"]))) 
			{
				$QUANTITY_ERR= "Please select quantity of book";
			}
			else
			{
				$QUANTITY=trim($_POST["QUANTITY"]);
			}
			
			if (empty($ISBN_ERR) &&empty($TITLE_ERR) &&empty($LANGUAGE_ERR)&&empty($MRP_ERR)&&empty($QUANTITY_ERR)&&empty($PUB_DATE_ERR)) 
			{
				$query1="INSERT INTO book(ISBN,TITLE,LANGUAGE,PUBLISHER,MRP,PUB_DATE,QUANTITY)VALUES($ISBN,'$TITLE','$LANGUAGE','$PUBLISHER',$MRP,'$PUB_DATE',$QUANTITY)";
				$save = mysqli_query($conn,$query1);

				$query2="SELECT * FROM `author` WHERE AUTH_ID=$AUTHID";
    			$save2= mysqli_query($conn,$query2);
   			 	$num= mysqli_num_rows($save2);

				if($num == 0){
					$query3="INSERT INTO `author`(`AUTH_ID`, `AUTH_NAME`) VALUES ($AUTHID,'$AUTHNAME')";
    				$save3= mysqli_query($conn,$query3);
				}

				$query4="INSERT INTO `written`(`ISBN`, `AUTH_ID`) VALUES ($ISBN,$AUTHID)";
				$save4 = mysqli_query($conn,$query4);
			}
			mysqli_close($conn);
			if(isset($save) && $save){
				header('location:./books.php');
			}else{
				header('location:./addBook.php');
			}
		}
		?>