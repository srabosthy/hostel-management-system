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
  <a href="#">Search</a>
  <a href="view_students.php">View students</a>
  <a  href="?sign=out">Log off</a>
  <a href="moderators.php">Moderators</a>
</div>

<div class="content">
  
  <h2>Welcome to admin panel</h2>
<div class="row">

    <form action="search.php" method="post">
	Allocation type:
	<input type="text" 	id = "type" name="type" >
	<input type="submit" value="search" name="search">
	</form>
	<?php
 include("../connection.php");
 if(isset($_POST['search']))
 {
 $type=$_POST['type'];
 $sql="select email,bed_id from student_allocation where student_allocaton.bed_id=admin_c_room.bed_id and admin_c_room.room_type='$type'";
 $r=mysqli_query($con,$sql);
 echo "<table id='student'>";
 echo "<tr>
 <th>Email</th>
 <th>Bed ID</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['email'];
		$bid=$row['bed_id'];
    echo "<tr>
    <td>$id</td><td>$bid</td>
    </tr>";
    }
	echo "</table>";
 }
?>
  </div>
  
</div>

</body>
</html>
