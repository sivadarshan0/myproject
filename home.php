<?php
	session_start();
?>

<!DOCTYPE html>

<html>
<head>

<title>Home page</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body style="background-color:#bdc3c7">
	<div id="main_wrapper">
	<center>
		<h2>Home</h2>
		<h3>Welcome 
		<?php echo $_SESSION['n_username']?>
		</h3>
		<img src="image/Logo_Tra.png" class="avatar"/>
	</center>
	
	<form id="main_form" action="home.php" method="post">
		<input name="n_logout" type="submit" class="btn_logout" value="Logout"></input><br>
	</form>
	
	<?php
	
	if(isset($_POST['n_logout']))
	{
		session_destroy();
		header('location:index.php');
	}
	
	?>
	
	</div>
</body>
</html>
