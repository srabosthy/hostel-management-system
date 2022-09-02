<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

<style>
.grid{
  overflow: hidden;
  background-color: #ddd;
  
  
  	position:absolute;
	top:23%;
	left:50%;
}

.content {
	background-color: rgba(124, 158, 207, 0.308);
	padding: 10px;
	height: 200px; 
  	position:absolute;
	top:25%;
	left:45%;
}
</style>

<title>Log In</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
<div class="main">
<ul>
  <li class="active"><a href="index.php">Home</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="reg.php">Registration</a></li>

</ul>
</div>

<div class="Head">
<h1>CONTINENTAL</h1>
</div>

<div  align="center" class="gallery">
 <img src="picture/logo.png"><br>	
</div>

<div class = "grid">
<h2 >Sign In</h2>
</div>

<div class="login-box">

<form align="center" action="guest_login.php" method="post">

   Email:</br>
    <input type="text" id = "email" name="email"> <br>
	</br>
	</br>

   Password:</br>
    <input type="password" 	id = "password" name="password" ><br></br> 
    
	<input type="submit" value="Submit" name="submit"><br>
	
    <a href="#">Forget Password</a>
</form>
</div>

<div class="footer" align="center">
  <p>

  </p>
</div>

</header>
</body>


</html>


<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$guest_login = "select email,password from student_registration where email='$email' and password='$password'";
	
	
            $guest_loged_in=mysqli_query($con,$guest_login); 
            if(mysqli_num_rows($guest_loged_in) > 0)
            {
				//$id = "select s_id from student_registration where email='$email'";
                $_SESSION['user_id']= $email;
                $_SESSION['guest_login_status']="loged in";
                header("Location:guest/home_guest.php");
            }
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
}
?>