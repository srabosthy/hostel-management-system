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
	background-image:url("picture/1.jpg");
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
	top:100%;
	left:48%;
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
	top:37%;
	left:45%;
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
	left:28%;
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
	
	
</style>

<title>Business class</title>

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
<h2>Business class available bed and rooms</h2></br>
</div>

<div class = "room1">
	<form action="guest_r_alloc_b.php" method="post">
	Bed ID:</br>
    <select name="bid">
	<?php
	include("../connection.php");
	$sql="select bed_id from admin_c_room where room_type = 'business'  and status = '0'";
	$r=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['bed_id'];
        echo "<option value='$id'>$id</option>";
    }
?>
</select><br></br>
	
  <input type="submit" value="book now" name="submit">
	</form>
</div>
</div>
</header>
</body>
</html>

<?php
include("../connection.php");
if(isset($_POST['submit']))
{
	
	$email  = $_SESSION['user_id'];
	$bid=$_POST['bid'];
	 $num=rand(1,20);
    $fno="f-".$num;
	
	$num1=rand(1,99);
    $rid="r-".$num1;
	
	$update = "update admin_c_room set status = '1' where bed_id = '$bid'";
	
	$query="insert into request values('$email','$bid','9999')";
	if(mysqli_query($con,$query) && mysqli_query($con,$update))
	{
		echo "Successfully inserted!";
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
	
	
}
?>