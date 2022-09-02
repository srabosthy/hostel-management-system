<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

<style>
.login{
  overflow: hidden;
  background-color:transparent;
  position:absolute;
	top:37%;
	left:43%;
}

.content {
	background-color: rgba(124, 158, 207, 0.308);
	padding: 10px;
	height: 200px; 
  	position:absolute;
	top:25%;
	left:45%;
}

.sign_in-box{
  width: 280px;
  position: absolute;
  transform: translate(-50%,-50%);
  color: white;
	top:70%;
	left:47%;
}

.sign_in-box h1,h2{
  float: left;
  font-size: 40px;
  border-bottom: 4px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}

header
{
	background-image:url("picture/1.jpg");
	height: 200vh;
	background-size:cover;
	background-position:center;
}

div.gallery {
	color: #cccc00;
  	position:absolute;
	top:10%;
	left:40%;
  margin: 4px;
  border: 2px solid black;
  float: center;
  width: 180px;
  height: 180px;
}

.main
{
	color:white;
	max-width:1200px;
	margin:auto;
	
}

div.gallery:hover {
  transition:0.5s ease;
  border: 3px solid #00cc00;
}

div.gallery img {
 position: center;  
  width: 100%;
  height: auto;
}

ul
{
	float:right;
	list-style-type:none;
	margin-top:25px;
}

ul li
{
	display:inline-block;
}

ul li a,a,h1
{
	text-decoration:none;
	color:	white;	
	padding:5px 20px;
	transition:0.5s ease;
}

h2,h3,p
{
	color:white;	
}


ul li a:hover
{
	background-color:#00b33c;
}


p a:hover
{
	background-color:#00b33c;
}




</style>

<title>Log In</title>

</head>

<body>
<header>
<div class="main">
<ul>
  <li class="active"><a href="index.php">Home</a></li>
 
</ul>
</div>

<div class="Header">
<br>
<h1>CONTINENTAL</h1>
<br><br><br><br>
<h1>Welcome to Administration</h1>
</div>

<div  align="center" class="gallery">
 <img src="picture/logo.png"><br>	
</div>



<div class = "login">
<h2 >Log In</h2>
</div>

<div class="sign_in-box">

<form align="center" action="admin_login.php" method="post">

   User Name:</br>
    <input type="text" id = "username" name="username"> <br>
	</br>
	</br>

   Password:</br>
    <input type="password" 	id = "password" name="password" ><br></br> 
    
	<input type="submit" value="Submit" name="submit"><br><br>
	
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
	$username=$_POST['username'];
	$password=$_POST['password'];
    $admin_login = "select username,password from admin where username='$username' and password='$password'";
            $admin_loged_in=mysqli_query($con,$admin_login); 
            if(mysqli_num_rows($admin_loged_in) > 0)
            {
                $_SESSION['user_id']=$username;
                $_SESSION['admin_login_status']="loged in";
                header("Location:admin/admin_homepage.php");
            }
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
}
?>