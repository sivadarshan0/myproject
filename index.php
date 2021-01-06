<?php
	ob_start();
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>

<title>Login page</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body style="background-color:#bdc3c7">
	<div id="main_wrapper">
	<center>
		<h2>Login form</h2>
		<img src="image/Logo_Tra.png" class="avatar"/>
	</center>
	
	<form id="main_form" action="index.php" method="post">
		<label><b>Username</label><br>
		<input name="n_username" type="text" class="inputvalues" placeholder="Type your username"></input><br>
		<label><b>Password</label><br>
		<input name="n_password" type="password"class="inputvalues" placeholder="Type your password"></input><br>
		<input name="n_loginbtn" type="submit" class="btn_login" value="Login"></input><br>
		<a href="register.php"><input type="button" class="btn_register" value="Sign Up"></input></a><br>
	</form>
	
	<?php
	  
	if(isset($_POST['n_loginbtn']))
	{
		$v_username = $_POST['n_username'];
		$v_password = $_POST['n_password'];
		$v_encpassword = md5($v_password);
		
		$query = "select * from mydb.p1_userinfo where username = '$v_username' and password = '$v_encpassword'";
		$query_run = mysqli_query($con,$query);
		
		if(mysqli_num_rows($query_run)>0)
		{
			echo '<script type = "text/javascript">alert("Username or password matched")</script>';
			$_SESSION['n_username'] = $v_username;
			header('location:home.php');
		}
		else
		{
			echo '<script type = "text/javascript">alert("Invalid username or password")</script>';
		}
	}
	
	?>
	
	</div>
</body>
</html>
