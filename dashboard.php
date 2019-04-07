<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  .bordered {
   width: 200px;
   height: 100px;
   position: relative;
   /*vertical-align: middle;*/
   /*margin-right: 100px;*/
   margin-top: 100px;
   margin-left: 700px;
    padding: 20px;
    border: 1px dashed green;
    border-style: dashed;
    vertical-align: center;
     border-radius: 8px;
     }

      .bordered1{
   width: 200px;
   height: 100px;
   position: relative;
   /*vertical-align: middle;*/
   /*margin-right: 100px;*/
   margin-top: -97px;
   margin-left: 438px;
    padding: 20px;
    border: 1px dashed green;
    border-style: dashed;
    vertical-align: center;
     border-radius: 8px;
     }

     .bordered2{
   width: 200px;
   height: 100px;
   position: relative;
   /*vertical-align: middle;*/
   /*margin-right: 100px;*/
   margin-top: -104px;
   margin-left: 1249px;
    padding: 20px;
    border: 1px dashed green;
    border-style: dashed;
    vertical-align: center;
     border-radius: 8px;
     }

     .bordered3{
   width: 200px;
   height: 100px;
   position: relative;
   /*vertical-align: middle;*/
   /*margin-right: 100px;*/
   margin-top: -97px;
   margin-left: 1516px;
    padding: 20px;
    border: 1px dashed green;
    border-style: dashed;
    vertical-align: center;
     border-radius: 8px;
     }

     .bordered4{
   width: 200px;
   height: 100px;
   position: relative;
   /*vertical-align: middle;*/
   /*margin-right: 100px;*/
   margin-top: -97px;
   margin-left: 990px;
    padding: 20px;
    border: 1px dashed green;
    border-style: dashed;
    vertical-align: center;
     border-radius: 8px;
     }

.headeroption{
      background: #444;
      color: #fff;
      text-align: center;
      padding: 10px;
    }

.footeroption{
      background: #444;
      color: #fff;
      text-align: center;
      padding: 9px;
      position: relative;
      margin-top: 434px;
    }
    button{
      height: 26px;
      width: 118px;
      border-radius: 8px;
      text-align: center;
      background-color: rgba(232, 236, 241, 1);
      /*text-decoration-color: white;*/
    }



    .headeroption h1,.footeroption h3{
      margin: 0;
    }

  </style>

</head>
<body>


<?php
include_once('link.php');
require_once('connection.php');
        session_start();
        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];

$fname = $lname = $email = $gender = '';
   $sql = "SELECT * FROM tbluser where Email = '$name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
  {
  $fname = $row["Firstname"];
  $lname = $row["Lastname"];
  $email = $row["Email"];
  $gender = $row["Gender"];
  }
}
?>

<!-- <?php


//$id = $_SESSION['id'];


?> -->

<div class="headeroption">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="dashboard.php" class="navbar-brand"><h1>Build Your CV</h1></a>
      <center>
    <h1>Welcome Admin <?php echo $fname." ".$lname; ?></h1>
    <marquee> <h1>Developed By Washim Akram</h1></marquee>
  </center>
    </div>
    <div class="dropdown navbar-right" id="right">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $fname." ".$lname;?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="account.php">Account</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
  </div>
</div>
    
  

   <div>
  <div align="center" class="bordered">
    <img src="icon/plus.png"> <br>
<button onclick="location.href='createcv.php';" type="submit" name="submit" class="btn btn-primary"><i class="icon-save icon-large"></i> Create New CV </button>
  </div>  

  <div align="center" class="bordered1">
    <img src="icon/view.png"> <br>
<button type="submit" name="submit" class="btn btn-primary" onclick="myFunction1()"><i class="icon-save icon-large"></i> View CV </button>
</div>

<div align="center" class="bordered4">
    <img src="icon/update.png"> <br>
<button type="submit" name="submit" class="btn btn-primary" onclick="window.location.href='update.php'"><i class="icon-save icon-large"></i> Update CV </button>
</div>

<div align="center" class="bordered2">
    <img src="icon/edit.png"> <br>
<button type="submit" name="submit" class="btn btn-primary" onclick="myFunction()"><i class="icon-save icon-large"></i>Cover Letter </button>
</div>

<div align="center" class="bordered3">
    <img src="icon/video.png"> <br>
<button type="submit" name="submit" class="btn btn-primary"><i class="icon-save icon-large"></i>Upload video </button>
</div>

</div>
      
    <script>
function myFunction() {
  location.replace("coverletter.php")
}

function myFunction1() {
  location.replace("cv.php")
}
</script>

<section class="footeroption">
 
  <p>Copyright © 2019 Washim Akram</p> 
</section>


</body>
</html>