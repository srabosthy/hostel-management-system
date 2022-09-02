<?php
   session_start();
   if($_SESSION['guest_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['guest_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html>
<head>
<style>
*
{
	margin:0;
	padding:10;
}

header
{
	background-image:url("picture/b.jpg");
	height: 200vh;
	background-size:cover;
	background-position:center;
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
	color:black;	
}

h2,h3,p
{
	color:white;	
}


ul li a,h3:hover
{
	background-color:#00b33c;
}


p a:hover
{
	background-color:#00b33c;
}

.active{
	display:inline-block;
	color:	#00b33c;	
	padding:5px 20px;
}

.main
{
	color:white;
	max-width:1200px;
	margin:auto;
	
}

.title
{
	position:absolute;
	top:40%;
	left:45%;
	right:60%
    font-size:60px;
}


.xn {	
	position:absolute;
	color:	 #e6e600;
}
.footer p{
	
	position:absolute;
	top:600px;
	left:18%;
	backkcolor-color: #e6e600;
	 font-size: 40px;
  border: 9px solid #4caf50;
  margin: 50px;
  padding: 15px 5;

}

ul .Head
{
	float:left;
	padding-top:-25px;
}


.grid{
  overflow: hidden;
  background-color: transparent;
   	
	top:15%;
	left:20%;
	
}
.content {
  background-color: #99e699;
  padding: 60px;

  
  height: 200px; 
  
  
  	position:absolute;
	top:25%;
	left:45%;
	
}

.login-box{
  width: 280px;
  position: absolute;
  transform: translate(-50%,-50%);
  color: white;
	top:45%;
	left:25%;
}

.login-box h1,h2{
  float: left;
  font-size: 40px;
  border-bottom: 4px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}

.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
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

div.gallery:hover {
  transition:0.5s ease;
  border: 3px solid #00cc00;
}

div.gallery img {
 position: center;  
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}


.Sign-up{
	color: #cccc00;
  	position:absolute;
	top:19%;
	left:68%;
}

.contact{
	position:absolute;
	top:50%;
	left:29%;
	color:white;}
	
	
.Touch{
	position:absolute;
	top:40%;
	left:42%;
	right:40%}
	
	
.room1{
	position:absolute;
	top:27%;
	left:10%;
	}
	
.room2{
	position:absolute;
	top:27%;
	left:65%;
	}
.bostaa{
	position:absolute;
	top:67%;
	left:43%;
	}	
.choice1{
	position:absolute;
	top:12%;
	left:35%;
	}
.choice2{
	position:absolute;
	top:18%;
	left:42%;
	}
.room2 h1{

  font-size: 40px;
  border: 4px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 5;
	}
	img{
		border:1px solid #ddd;
		border-radius: 4px;
		padding : 5px;
		width: 150px;
	}
	
.button
{
	border-radius: 12px;
}

</style>

<title>profile</title>

</head>

<body>
<header>
<h1>CONTINENTAL</h1>
<div class="main">
<ul>
   <li><a href="home_guest.php">Home</a></li>
  <li><a href="?sign=out">Log Out</a></li>
  
</ul>

<div class = "choice1">
<h2>My Information</h2></br>
</div>

<div class = "room1">
<br><br><br>
<?php
		include("../connection.php");
		$email  = $_SESSION['user_id'];
		$prama   = "select photo from student_registration where email = '$email' " ;
		$r     = mysqli_query($con,$prama);
		$row   = mysqli_fetch_assoc($r);
		$photo = $row['photo'];
		echo "<img src='../reg_img/$photo' height='150px' width='200px'>";
		?> 
		
		<br><br><br><br>
		<form align="center" action="profile.php" method="post">
		<input type = "submit" class = "button" name = "delete" value = "delete profile">
		</form>
		
<?php
//deletion
include("../connection.php");
if(isset($_POST['delete']))
{
	$email=$_SESSION['user_id'];
	$balloc = "SELECT  bed_id FROM `student_allocation` where email = '$email'";
	$r1 = mysqli_query($con,$balloc);
	$row = mysqli_fetch_assoc($r1);
	$bid = $row['bed_id'];
	if($r1)
	{
		$updt = "UPDATE `admin_c_room` SET `status`='0' where bed_id = '$bid'";
		$r2 = mysqli_query($con,$updt);
		$delete1 = "delete from student_allocation where email='$email'";
		$r3 = mysqli_query($con,$delete1);
	}
	$delete2 = "delete from student_registration where email='$email'";
	$r3 = mysqli_query($con,$delete2); 
	echo "successfully deleted";
}
?>
		
		
</div>

<div class = "room2">
<ul><div class="card">
    
	  <?php
		include("../connection.php");
		$email  = $_SESSION['user_id'];
		$prama   = "select s_name,address,phone,email from student_registration where email = '$email' " ;
		$r     = mysqli_query($con,$prama);
		$row   = mysqli_fetch_assoc($r);
		$name  = $row['s_name'];
		$adds  = $row['address'];
		$phone = $row['phone'];
		$email = $row['email'];
		echo "<h2> $name.</h2>";
		echo "<p class='fakeimg' align='right'><b align='center'>Address: $adds</b></br><b>Mobile No.: $phone</b></br><b>Email: $email</b></br></p>";
	  ?> 
	  <br><br><br>

     </div>
</div>


</header>
</body>
</html>