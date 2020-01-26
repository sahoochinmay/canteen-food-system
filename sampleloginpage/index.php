<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: black" >
	<center>
		<div id="toppage" >
			<img src="image/text.jpg" class="home">
			<p class="Canteen" style="font-family: "Rammetto One";"><b>Saffron Canteen</b></p>
			<img src="image/house.png" class="house">

			<div class="rect">
				<div class="myform">
			<form  action="index.php" method="post">
				<br><br>
				<label style="font-size:28px;"><b>Sign in with E-mail<b></label>
				<br><br>
				<input name="email" type="text" class="inputvalues" placeholder="Enter e-mail id"/>
				<br><br>
				<label></label>
				<input name="password" type="password" class="inputvalues" placeholder="Enter password"/>
				<br><br>
				<input name="login" type="submit" id="login_btn" value="Login"/>
				<br><br>
				<a href="register.php"><input type="button" id="register_btn" value="Sign up"/></a>
			</form>
			<?php
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$password=$_POST['password'];

				$query="select * from userinfotable1 WHERE email='$email' AND  password='$password'";

				$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					//valid
					$_SESSION['email']= $email;
					header('location:home.php');
				}
				else
				{
					//invalid
					echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
				}
			}

			?>
		</div>
			</div>
		</div>	
		
	</center>
</body>
</html>