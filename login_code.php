<!--
Here, we write code for login.
-->
<?php

require_once('connection.php');
$email = $password = $pwd = '';

$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM tbluser WHERE Email='$email' AND Password='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$email = $row["Email"];
		$fname = $row["Firstname"];
		$lname=$row["Lastname"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lame;
	}
	header("Location: dashboard.php");
}
else
{
	echo "Invalid email or password";
}
?>