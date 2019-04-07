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

$cname = $_POST['cname'];
$designation = $_POST['designation'];
$start = $_POST['syear'];
$end = $_POST['eyear'];

$sql = "INSERT INTO experience(company_name, designation,start_year,end_year) VALUES ('$cname','$designation','$start','$end')";
// $sql = "INSERT INTO address(prmnt_add, prsnt_add) VALUES ('$fname','$lname')";
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
    