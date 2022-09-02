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
  <a href="#">Moderators</a>
</div>

<div class="content">
  
  <h2>Welcome to admin panel</h2>
  <p>Moderators info!</p>
   <div class="row">
    
	<?php
 include("../connection.php");
 
 $sql="select username,password from admin";
 $r=mysqli_query($con,$sql);
 echo "<table id='student'>";
 echo "<tr>
 <th>username</th>
 <th>password</th>
 
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['username'];
		$pass=$row['password'];
	
    echo "<tr>
    <td>$id</td><td>$pass</td>
    </tr>";
    }
	echo "</table>";
 
?>
  </div>

</div>

</body>
</html>
