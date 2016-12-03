<?php 

	include("connection.php");
	$query = "SELECT * FROM `fullapp`";
	$result = mysqli_query($link, $query)
		//$row = mysqli_fetch_all($result);
		//print_r($row) ;

?>
<?php include("header.php");?>
<nav class="navbar navbar-dark bg-inverse">
	<a class="btn btn-success float-xs-right" href="add.php" role="button">Add Email </a>
	<a class="btn btn-secondary float-xs-left" href="index.php" role="button">Home </a>
</nav>
<body id="mainBody">
		<div class= "container" id = "list">
		<table id = "table" class="table table-md table-inverse">
		  <thead>
		    <tr>
		      <th>Name</th>
		      <th>Email</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
            	
               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>".$row['name']."</td>";
                   echo "<td>".$row['email']."</td>";
                   
                   echo "</tr>";
               }

            ?>
		  </tbody>
		
		</div>
	</body>

<?php include("footer.php"); ?>