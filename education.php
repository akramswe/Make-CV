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

$ssc_rslt = $_POST['sscrslt'];
$ssc_board = $_POST['sscbrd'];
$hsc_rslt = $_POST['hscrslt'];
$hsc_board = $_POST['hscbrd'];
$honours = $_POST['hnrs'];
$university = $_POST['unvrsty'];

$sql = "INSERT INTO education(ssc, ssc_board,hsc, hsc_board, honours, university) VALUES ('$ssc_rslt','$ssc_board', ' $hsc_rslt', ' $hsc_board', ' $honours', ' $university')";
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
    