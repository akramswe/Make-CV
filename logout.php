<!--
Into this file, we write a code for logout.
-->
<?php
session_start();
session_destroy();
header("Location: login.php");
?>