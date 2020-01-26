<?php
   require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/regstyle.css">
</head>
<body style="background-color: black" >
	 
		<div id="toppage" >
			<img src="image/text.jpg" class="home">
			<p class="Canteen" style="font-family: "Rammetto One";"><b>Saffron Canteen</b></p>
			<img src="image/house.png" class="house">
			<center>
			<div class="rect">
				<div class="myform">
			<form  action="register.php" method="post" class="myforms">
				<label style="font-size:28px;" class="reg" ><b><u>User Registration</u><b></label>
				<br><br>
				<label style="font-size: 22px;"><b>Full Name:</b></label>
				<input name="fullname" type="text" class="inputvalues" placeholder="Enter Full name" required />
				<br>
				<label style="font-size: 22px;"><b>Gender:</b></label>
				<input type="radio" name="gender" class="radiobtns" value="male" checked required>Male
				<input type="radio" name="gender" class="radiobtns" value="female" checked required>Female
				<br>
				<label style="font-size: 22px;"><b>Mobile Number:</b></label>
				<input name="mobilenumber" type="text" class="inputvalues" placeholder="Enter mobile number" required /><br><br>
				<label style="font-size: 22px;"><b>E-mail:</b></label>
				<input name="email" type="text" class="inputvalues" placeholder="Enter e-mail id" required /><br><br>
				<label style="font-size: 22px;"><b>Password</b></label>
				<input name="password" type="password" class="inputvalues" placeholder="Enter password" required />
				<br><br>
				<label style="font-size: 22px;"><b>Confirm Password</b></label>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Renter password" required />
				<br><br>
				<input name="submit_btn" type="submit" id="signup_btn" value="Signup"/>
				<br><br>
				<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
			</form>
			<?php
			   if(isset($_POST['submit_btn']))
			   {
			   	//echo '<script type="text/javascript"> alert("Sign up button clicked")</script>';
			   	$fullname = $_POST['fullname'];
			   	$gender = $_POST['gender'];
			   	$mobilenumber = $_POST['mobilenumber'];

			   	$email = $_POST['email'];
			   	$password = $_POST['password'];
			   	$cpassword = $_POST['cpassword'];
			   	if($password==$cpassword)
			   	{
			   		$query= "select * from userinfotable1 WHERE email= '$email'";
			   		$query_run = mysqli_query($con,$query);

			   		if(mysqli_num_rows($query_run)>0)
			   		{
			   			//there is a user with same user name
			   			echo '<script type="text/javascript"> alert("user already exist try another way")</script>';
			   		}
			   		else
			   		{
			   			$query= "insert into userinfotable1 values('','$email' ,'$fullname','$gender','$mobilenumber','$password')";
			   			$query_run = mysqli_query($con,$query);

			   			if($query_run)
			   			{
			   				echo '<script type="text/javascript"> alert("user registered ... Go to login page to login")</script>';
			   			}
			   			else{
			   				echo '<script type="text/javascript"> alert("Error")</script>';
			   			}
			   		}

			   	}
			   	else{
			   		echo '<script type="text/javascript"> alert("Password and confirm password doesnot match")</script>';
			   	}

			   }

			?>
		</div></center>
			</div>
          
			
		</div>	

	
</body>
</html>