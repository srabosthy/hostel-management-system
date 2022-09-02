<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  background-color: #ddd;
  margin-left: 200px;
  padding-left: 20px;
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
}

/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  background-color: #ddd;
  margin-left: 200px;
  padding-left: 20px;
}

#student {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#student td, #student th {
  border: 1px solid #ddd;
  padding: 8px;
}

#student tr:nth-child(even){background-color: #f2f2f2;}

#student tr:hover {background-color: #ddd;}

#student th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2e2f30;
  color: white;
}

</style>
</style>
</head>
<body>

<div class="sidenav">
  <a href="admin_create_room.php">Create room</a>
  <a href="#">Delete</a>
  <a href="#">Update</a>
  <a href="admin_confirm.php">approval</a>
  <a href="view_students.php">View students</a>
  <a  href="?sign=out">Log off</a>
  <a href="moderators.php">Moderators</a>
</div>

<div class="content">
  
  <h2>Welcome to admin panel</h2>
  
  

  <div class="row">
    
	<?php
 include("../connection.php");
 
 $sql="select email,bed_id,amount from request";
 $r=mysqli_query($con,$sql);
 echo "<table id='student'>";
 echo "<tr>
 <th>Email</th>
 <th>Bed_id</th>
 <th>Amount</th>
 <th>Confirmation</th>
 
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $e=$row['email'];
		$bid=$row['bed_id'];
		$a=$row['amount'];
		echo "<form action='admin_confirm.php' method='post'>";
	
	
    echo "<tr>
    <td>$e</td><td>$bid</td><td>$a</td><td><input type = 'submit' name = 'submit' value = 'approve'></form>
    </tr>";

    }
		if(isset($_POST['submit']))
{
	$email  = $e;
	$bid=$bid;
	 $num=rand(1,20);
    $fno="f-".$num;
	
	$num1=rand(1,99);
    $rid="r-".$num1;
	 
	$amount=$a;
	$update = "update admin_c_room set status = '2' where bed_id = '$bid'";
	$query1="delete from request where email = '$email'";
	$query="insert into student_allocation values('$email','$bid','$fno','$rid','$amount')";
	if(mysqli_query($con,$query) && mysqli_query($con,$update) && mysqli_query($con,$query1))
	{
		echo "Successfully inserted!";
		echo "Successfully deleted !";
	}
	else
	{
		echo "error!".mysqli_error($con);
	}
	
} 	
	echo "</table>";
 
?>
  </div>
  
</div>

</body>
</html>
<?php
/*include("../connection.php");
if(isset($_POST['submit']))
{
	$email  = $e;
	$bid=$bid;
	 $num=rand(1,20);
    $fno="f-".$num;
	
	$num1=rand(1,99);
    $rid="r-".$num1;
	 
	$amount=$a;
	$update = "update admin_c_room set status = '2' where bed_id = '$bid'";
	$query1="delete from request where email = '$email'";
	$query="insert into student_allocation values('$email','$bid','$fno','$rid','$amount')";
	if(mysqli_query($con,$query) && mysqli_query($con,$update) && mysqli_query($con,$query1))
	{
		echo "Successfully inserted!";
		echo "Successfully deleted !";
	}
	else
	{
		echo "error!".mysqli_error($con);
	}
	
}*/
?>