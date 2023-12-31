<?php
require_once('connect.php');
session_start();
include 'header.php';
include('navbar.php');?>

<div class="main-content-inner">
<div class="row">
<div class="col-12">
            <div class="card mt-5">
                <div class="card-body table-responsive">
	
	<table class="table table-striped text-center">
	  <thead>
	    <tr>
	      <th scope="col">Book ID</th>
	      <th scope="col">Title</th>
        <th scope="col">MRP</th>
	      <th scope="col">AUTHOR</th>
        <th scope="col">LANGUAGE</th>
	      <th scope="col">PUBLISHER</th>
	    </tr>
	  </thead>
	  <tbody>
		<?php 
			include('connect.php');
			$query="SELECT * FROM book JOIN written ON book.ISBN = written.ISBN JOIN author ON written.AUTH_ID = author.AUTH_ID";

            if(!($result = mysqli_query($conn,$query))){

                echo "Retrieval of data from database failed".mysql_error();
            }
            if(mysqli_num_rows($result)>0){

                while ($row=mysqli_fetch_assoc($result)){

                    echo "<tr><td>".$row["ISBN"]."</td><td>".$row["TITLE"]."</td><td>".$row["MRP"]."</td><td>".$row["AUTH_NAME"]."</td><td>".$row["LANGUAGE"]."</td><td>".$row['PUBLISHER']."</td></tr>";
                }
            }
            else{

                echo "0 Results";
            }

            mysqli_close($conn)?>
        </tbody>
	</table>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php');?>