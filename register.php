<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>

<title>Registration page</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body style="background-color:#bdc3c7">
	<div id="main_wrapper">
	<center>
		<h2>Registration form</h2>
		<img src="image/Logo_Tra.png" class="avatar"/>
	</center>
	
	<form id="main_form" action="register.php" method="post">
		<label><b>Full name | Gender :</label>
		<input name="n_gender" type="radio" value="Male">Male</input>
		<input name="n_gender" type="radio" value="female">Female</input><br>
		<input name="n_fullname" type="text" class="inputvalues" placeholder="Type your full name"></input><br>
		<label><b>Username</label><br>
		<input name="n_username" type="text" class="inputvalues" placeholder="Type your username"></input><br>
		<label><b>Password</label><br>
		<input name="n_password" type="password"class="inputvalues" placeholder="Type your password"></input><br>
		<label><b>Confirmed password</label><br>
		<input name="n_cpassword" type="password"class="inputvalues" placeholder="Type your conirmend password"></input><br>
		<input name="n_registerbtn" type="submit" class="btn_register" value="Sign Up"></input><br>
		<a href="index.php"><input type="button" class="btn_back" value="Back"></input></a><br>		
	</form>
	
	<?php
		if(isset($_POST['n_registerbtn']))
		{
			$v_fullname = $_POST['n_fullname'];
			$v_gender = $_POST['n_gender'];
			$v_username = $_POST['n_username'];
			$v_password = $_POST['n_password'];
			$v_cpassword = $_POST['n_cpassword'];
			$v_encpassword = md5($v_password);
			
			if($v_password==$v_cpassword)
			{
				$query = "SELECT * from mydb.p1_userinfo where username = '$v_username'";
				$query_run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo'<script type="text/javascript">alert("User already exist please try diffrent user")</script>';
				}
				else
				{
					$query="insert into p1_userinfo (fullname, gender, username, password) values ('$v_fullname', '$v_gender', '$v_username', '$v_encpassword')";
					$query_run=mysqli_query($con,$query);
					
					if($query_run)
					{
						echo'<script type="text/javascript">alert("Registration suceed")</script>';
					}
					else
					{
						echo'<script type="text/javascript">alert("Registration failed")</script>';
					}
				}
			}
			else
			{
				//Password miss matched
				echo '<script type="text/javascript">alert("Please retype the same password")</script>';
			}
		}
	?>
	
	</div>
</body>
</html>
