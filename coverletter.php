<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: dashboard.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
?>
<!DOCTYPE html>
<html>
<head>
	<title>cover letter</title>
</head>
<body>
   <p>Hi [name of hiring manager],I'm [name], a [cashier, software developer, nurse]. I have worked in this field for more than [two, five, ten] years, including experience with [logistics, PHP, customer service] and [cash-handling, project management, inventory]. I am [hard-working, independent] and passionate about [solving problems, working in a team].I believe that [organization name] is an impressive company whose values I share. I thrive in a [fast-paced, collaborative, innovative] environment and I know that I have the skills, experience, and attitude to excel in this position.I would love to meet and discuss what I can bring to this role. I can be reached at [email] and [phone number].Thanks,[name]</p>
</body>
</html>