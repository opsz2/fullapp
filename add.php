<?php 
	$error = "";
	$success = "";
	if(array_key_exists('submit', $_POST)){
		include("connection.php");

		if(!$_POST['email']){
			$error.= "<p>An Email Address is required</p>";
		}
	    if(!$_POST['name']){
			$error.= "<p>Please input full name for that mailing address</p>";


		}
		if($error != ""){
			$error = "There were error(s) in your form: ".$error;
		}else{
			
				$query = "INSERT INTO `fullapp` (name, email) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['email'])."')";
				if(!mysqli_query($link, $query)){
					$error = "<p>Could not add new data, please try again later</p>";

				}else{
					$success .= "<p>Data has been successfully added in the mailing list. </p><a href='list.php'>Mailing List</a>";
				}
			}
		}

?>
<?php include("header.php");?>
<nav class="navbar navbar-dark bg-inverse">
	<a class="btn btn-success float-xs-right" href="list.php" role="button">Email List </a>
	<a class="btn btn-secondary float-xs-left" href="index.php" role="button">Home </a>
</nav>
<body id="mainBody">
		<div class= "container" id = "form">
		<h1>Add To Mailing List</h1>
		<div id = "error"><?php if ($error!=""){
		echo '<div class="alert alert-danger" role="alert"> '.$error.'</div>';
			}  ?></div>
		<div id = "success"><?php if ($success!=""){
		echo '<div class="alert alert-success" role="alert"> '.$success.'</div>';
			}  ?></div>
		<form method="post">
		   <div class="form-group">
		    <label for="name">Full Name</label>
		    <input type="text" name="name" class="form-control" id="name" placeholder="e.g. Sam Kelvin Smith">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="e.g. sam@yahoo.com">
		  </div>
		  <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
		</form>
		
		</div>
	</body>

<?php include("footer.php"); ?>