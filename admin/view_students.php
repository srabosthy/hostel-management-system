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
<link rel="stylesheet" href="style.css">
<link rel="stylesheet2" href="table.css">
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
  <p>Student Information</p>
  
  <div class="row">
    
	<?php
 include("../connection.php");
 
 $sql="select s_id,s_name,mother,father,b_date,local_guardian,address,phone,email from student_registration";
 $r=mysqli_query($con,$sql);
 echo "<table id='student'>";
 echo "<tr>
 <th>Student id</th>
 <th>Student Name</th>
 <th>Mother</th>
 <th>Father</th>
 <th>Birth Date</th>
 <th>Local guardian</th>
 <th>Address</th>
 <th>Phone</th>
 <th>Email</th>
 
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['s_id'];
		$sname=$row['s_name'];
		$mother=$row['mother'];
		$father=$row['father'];
		$b_date=$row['b_date'];
		$local_guard=$row['local_guardian'];
		$add=$row['address'];
	    $phone=$row['phone'];
		$email=$row['email'];
	
    echo "<tr>
    <td>$id</td><td>$sname</td><td>$mother</td><td>$father</td><td>$b_date</td><td>$local_guard</td><td>$add</td><td>$phone</td><td>$email</td>
    </tr>";
    }
	echo "</table>";
 
?>
  </div>

  
</div>

</body>
</html>

