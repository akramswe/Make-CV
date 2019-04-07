<?php

require_once('connection.php');
include_once('link.php');
        session_start();
        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];
        $id = $_SESSION['id'];

$fname = $lname = $gender = $email = $password = $pwd = '';

$fname = $_POST['Presentadd'];
$lname = $_POST['Permanentadd'];

$sql = "INSERT INTO address(prmnt_add, prsnt_add) VALUES ('$fname','$lname')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: createcv.php");
}
else
{
	echo "Error :".$sql;
}
?>
    <script type="text/javascript">
    alert('You are Successfully Register Thank You');
    window.location="createcv.php";
    </script>

    <?php
    
    ?>
    