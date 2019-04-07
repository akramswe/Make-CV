<?php
include 'connection.php';
include_once('link.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Info</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Loader -->
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
            });

        </script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  margin-left: 22%;
  margin-right: 23%;
  margin-top: 1%;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
   margin-left: 22%;
  margin-right: 23%;
  margin-top: 0%;
}


.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

.headeroption{
      background: #444;
      color: #fff;
      text-align: center;
      padding: 10px;
    }


</style>

</head>
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
   $id = $row['ID'];
  $fname = $row["Firstname"];
  $lname = $row["Lastname"];
  $email = $row["Email"];
  $gender = $row["Gender"];
   $phone = $row['Phone'];
   $website=$row['website']
  

?>

<body onload="myFunction()" style="margin:0;">

  <div class="headeroption">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="dashboard.php" class="navbar-brand"><h2>Back to Home</h2></a>
      <center>
    <h1>Welcome Admin <?php echo $fname." ".$lname; ?></h1>
    <marquee> <h1>Update Your Information</h1></marquee>
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

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen">Pesonal Information</button>
  <button class="tablinks" onclick="openCity(event, 'Education')">Education</button>
  <button class="tablinks" onclick="openCity(event, 'address')">Address</button>
   <button class="tablinks" onclick="openCity(event, 'Experience')">Experience</button>
    <button class="tablinks" onclick="openCity(event, 'Software')">Software</button>
</div>

<div id="" class="tabcontent">
       
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Webasite</th>
                </tr>
            </thead>
            <tbody>
 <?php 
                 
                    // $sql = "SELECT * FROM tbluser ";
                    // $result = $conn->query($sql);
                    // if ($result->num_rows > 0) {
                    //     // output data of each row
                    //     while($row = $result->fetch_assoc()) {
                    //         $id = $row['ID'];
                    //         $fname = $row['Firstname'];
                    //         $lname = $row['Lastname'];
                    //         $gender = $row['Gender'];
                    //         $email = $row['Email'];
                    //         $phone = $row['Phone'];
                    //         $website=$row['website']

                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $fname; ?>
                    </td>
                    <td>
                        <?php echo $lname; ?>
                    </td>
                    <td>
                        <?php echo $gender; ?>
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td>
                        <?php echo $phone; ?>
                    </td>
                    <td>
                        <?php echo $website; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    
<!--Edit Item Modal -->
                    <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Item</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_code">ID:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $id; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">First Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form-control" id="item_code" name="Firstname" value="<?php echo $fname; ?>" placeholder="Item Code" required> </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Last Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form-control" id="item_code" name="Lastname" value="<?php echo $lname; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">Gender:</label>
                                            <div class="col-sm-4">
                                                <input type="text"class="form-control" id="item_code" name="Gender" value="<?php echo $gender; ?>" placeholder="Item Code" required> </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Email:</label>
                                            <div class="col-sm-4">
                                                <input type="text"class="form-control" id="item_code" name="Email" value="<?php echo $email; ?>" placeholder="Item Code" required>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Phone:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="Phone" value="<?php echo $phone; ?>" placeholder="Category" required>  </div>
                                                 <label class="control-label col-sm-2" for="item_category">Website:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="website" value="<?php echo $website; ?>" placeholder="Category" required> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $fname; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        
                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $fname = $_POST['Firstname'];
                            $lname = $_POST['Lastname'];
                            $gender = $_POST['Gender'];
                            $email = $_POST['Email'];
                            $phone = $_POST['Phone'];
                            $website=$_POST['website'];
                            $sql = "UPDATE tbluser SET 
                                Firstname='$fname',
                                Lastname='$lname',
                                Gender='$gender',
                                Email='$email',
                                Phone = '$phone',
                                website = '$website'
                                WHERE ID = '$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="update.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="update.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                   
?>
            </tbody>
        </table>

</div>
<div id="Paris" class="tabcontent">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Website</th>
      </tr>
    </thead>
    <tbody>
 <?php

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
   $id = $row['ID'];
  $fname = $row["Firstname"];
  $lname = $row["Lastname"];
  $email = $row["Email"];
  $gender = $row["Gender"];
   $phone = $row['Phone'];
   $website=$row['website'];
   $age=$row['age'];
  

?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $fname; ?>
                    </td>
                    <td>
                        <?php echo $lname; ?>
                    </td>
                    <td>
                         <?php echo $email; ?>
                    </td>
                    <td>
                      <?php echo $phone; ?>
                    </td>
                    <td>
                      <?php echo $gender; ?>
                    </td>
                    <td>
                        <?php echo $age; ?>
                    </td>
                    <td>
                        <?php echo $website; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>

                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit1<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete1<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    
<!--Edit Item Modal -->
                    <div id="edit1<?php echo $id;?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Item</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_code">ID:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $id; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">First Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form-control" id="item_code" name="Firstname" value="<?php echo $fname; ?>" placeholder="Item Code" required> </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Last Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form-control" id="item_code" name="Lastname" value="<?php echo $lname; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">Gender:</label>
                                            <div class="col-sm-4">
                                                <input type="text"class="form-control" id="item_code" name="Gender" value="<?php echo $gender; ?>" placeholder="Item Code" required> </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Email:</label>
                                            <div class="col-sm-4">
                                                <input type="text"class="form-control" id="item_code" name="Email" value="<?php echo $email; ?>" placeholder="Item Code" required>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Phone:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="Phone" value="<?php echo $phone; ?>" placeholder="Category" required>  </div>
                                                 <label class="control-label col-sm-2" for="item_category">Website:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="website" value="<?php echo $website; ?>" placeholder="Category" required> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete1<?php echo $id;?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $fname; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        
                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $fname = $_POST['Firstname'];
                            $lname = $_POST['Lastname'];
                            $gender = $_POST['Gender'];
                            $email = $_POST['Email'];
                            $phone = $_POST['Phone'];
                            $website=$_POST['website'];
                            $sql = "UPDATE tbluser SET 
                                Firstname='$fname',
                                Lastname='$lname',
                                Gender='$gender',
                                Email='$email',
                                Phone = '$phone',
                                website = '$website'
                                WHERE ID = '$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="update.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="update.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                   
?>
            </tbody>
        </table>

  </div>

<div id="Education" class="tabcontent">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>SSC Result</th>
        <th>SSC Borad</th>
        <th>HSC Result</th>
        <th>HSC Board</th>
         <th>Hounors</th>
         <th>University</th>
      </tr>
    </thead>
    <tbody>
 <?php

        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];

$fname = $lname = $email = $gender = '';
   $sql = "SELECT * FROM education ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
  {
   $id = $row['e_id'];
  $ssc = $row["ssc"];
  $ssc_board = $row["ssc_board"];
  $hsc = $row["hsc"];
  $hsc_board = $row["hsc_board"];
   $honours = $row['honours'];
   $university=$row['university']
  

?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $ssc; ?>
                    </td>
                    <td>
                        <?php echo $ssc_board; ?>
                    </td>
                    <td>
                        <?php echo $hsc; ?>
                    </td>
                    <td>
                        <?php echo $hsc_board; ?>
                    </td>
                    <td>
                        <?php echo $honours; ?>
                    </td>
                    <td>
                        <?php echo $university; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>

                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit2" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete2" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    
<!--Edit Item Modal -->
                    <div id="edit2" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Education Information</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_code">ID:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $id; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">SSC :</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form-control" id="item_code" name="Firstname" value="<?php echo $ssc; ?>" placeholder="Item Code" required> </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">SSC Board:</label>
                                            <div class="col-sm-4">
                                                <input type="text"  class="form-control" id="item_code" name="Lastname" value="<?php echo $ssc_board; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">HSC Result:</label>
                                            <div class="col-sm-4">
                                                <input type="text"class="form-control" id="item_code" name="Gender" value="<?php echo $hsc; ?>" placeholder="Item Code" required> </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">HSC Board:</label>
                                            <div class="col-sm-4">
                                                <input type="text"class="form-control" id="item_code" name="Email" value="<?php echo $hsc_board; ?>" placeholder="Item Code" required>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Hounors:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="Phone" value="<?php echo $phone; ?>" placeholder="Category" required>  </div>
                                                 <label class="control-label col-sm-2" for="item_category">University:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="website" value="<?php echo $website; ?>" placeholder="Category" required> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete2" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $fname; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        
                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $fname = $_POST['Firstname'];
                            $lname = $_POST['Lastname'];
                            $gender = $_POST['Gender'];
                            $email = $_POST['Email'];
                            $phone = $_POST['Phone'];
                            $website=$_POST['website'];
                            $sql = "UPDATE tbluser SET 
                                Firstname='$fname',
                                Lastname='$lname',
                                Gender='$gender',
                                Email='$email',
                                Phone = '$phone',
                                website = '$website'
                                WHERE ID = '$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="update.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="update.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                   
?>
            </tbody>
        </table>

  </div>
</div>

<div id="address" class="tabcontent">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Present Address</th>
        <th>Permanent Address</th>
      </tr>
    </thead>
    <tbody>
 <?php

        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];

$fname = $lname = $email = $gender = '';
   $sql = "SELECT * FROM address";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
  {
   $id = $row['a_id'];
  $prmnt_add = $row["prmnt_add"];
  $prsnt_add = $row["prsnt_add"];
?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $prsnt_add; ?>
                    </td>
                    <td>
                        <?php echo $prmnt_add; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>

                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit3" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete3" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    
<!--Edit Item Modal -->
                    <div id="edit3" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Address Information</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_code">ID:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $id; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code">Present Address:</label>
                                            <div class="col-sm-4">
                                              <textarea type="text"  class="form-control" id="item_code" name="prsnt_add" placeholder="Item Code" required>  <?php echo $prsnt_add; ?></textarea>
                                                
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Permanent Address:</label>
                                            <div class="col-sm-4">
                                               <textarea type="text"  class="form-control" id="item_code" name="prmnt_add" placeholder="Item Code" required>  <?php echo $prmnt_add; ?></textarea>
                                           
                                        </div>   
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete3" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $fname; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        
                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $prsnt_add = $_POST['prsnt_add'];
                            $prmnt_add = $_POST['prmnt_add'];
                            $sql = "UPDATE address SET 
                                prmnt_add='$fname',
                                prsnt_add='$lname',
                                WHERE a_id = '$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="update.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="update.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                   
?>
            </tbody>
        </table>

  </div>
</div>


<div id="Experience" class="tabcontent">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Company Name</th>
        <th>Designation</th>
        <th>Start Year</th>
        <th>End Year</th>
      </tr>
    </thead>
    <tbody>
 <?php

        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];

$fname = $lname = $email = $gender = '';
   $sql = "SELECT * FROM experience";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
  {
   $id = $row['ex_id'];
  $cname = $row["company_name"];
  $designation = $row["designation"];
  $syear =  $row["start_year"];
  $eyear =  $row["end_year"];
?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $cname; ?>
                    </td>
                    <td>
                        <?php echo $designation; ?>
                    </td>
                    <td>
                        <?php echo $syear; ?>
                    </td>
                    <td>
                        <?php echo $eyear; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>

                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit45" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete456" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    
<!--Edit Item Modal -->
                    <div id="edit45" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Experience</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id1" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_code1">ID:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code1" name="item_code" value="<?php echo $id; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code1">Company Name:</label>
                                            <div class="col-sm-4">
                                              <input type="text"  class="form-control" id="item_code1" name="cname" value="<?php echo $cname; ?>" placeholder="Item Code" required>
                                                
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Designation:</label>
                                            <div class="col-sm-4">
                                               <input type="text"  class="form-control" id="item_code" name="designation" value="<?php echo $designation; ?>" placeholder="Item Code" required>
                                           
                                        </div>   
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Start Year:</label>
                                            <div class="col-sm-4">
                                               <input type="text" class="form-control" id="item_code1" name="syear" value="<?php echo $syear; ?>" placeholder="Item Code" required>
                                           
                                        </div>   
                                    </div>

                                       <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">End Year:</label>
                                            <div class="col-sm-4">
                                               <input type="text"  class="form-control" id="item_code" name="eyear" value="<?php echo $eyear; ?>" placeholder="Item Code" required>
                                           
                                        </div>   
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item1"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete456" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $fname; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        
                        //Update Items
                        if(isset($_POST['update_item1'])){
                            $edit_item_id1 = $_POST['edit_item_id1'];
                            $cname = $_POST['cname'];
                            $designation = $_POST['designation'];
                            $syear = $_POST['syear'];
                            $eyear = $_POST['eyear'];
                            $sql = "UPDATE experience SET company_name ='$cname',designation='$designation',start_year='$syear',end_year='$eyear' WHERE ex_id = '$edit_item_id1'  ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="update.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="update.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                   
?>
            </tbody>
        </table>

  </div>
</div>

<div id="Software" class="tabcontent">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Company Name</th>
        <th>Designation</th>
        <th>Start Year</th>
        <th>End Year</th>
      </tr>
    </thead>
    <tbody>
 <?php

        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];

$fname = $lname = $email = $gender = '';
   $sql = "SELECT * FROM experience";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
  {
   $id = $row['ex_id'];
  $cname = $row["company_name"];
  $designation = $row["designation"];
  $syear =  $row["start_year"];
  $eyear =  $row["end_year"];
?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $cname; ?>
                    </td>
                    <td>
                        <?php echo $designation; ?>
                    </td>
                    <td>
                        <?php echo $syear; ?>
                    </td>
                    <td>
                        <?php echo $eyear; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>

                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit45" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete456" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    
<!--Edit Item Modal -->
                    <div id="edit45" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Experience</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id1" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_code1">ID:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code1" name="item_code" value="<?php echo $id; ?>" placeholder="Item Code" required> </div>
                                            <label class="control-label col-sm-2" for="item_code1">Company Name:</label>
                                            <div class="col-sm-4">
                                              <input type="text"  class="form-control" id="item_code1" name="cname" value="<?php echo $cname; ?>" placeholder="Item Code" required>
                                                
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Designation:</label>
                                            <div class="col-sm-4">
                                               <input type="text"  class="form-control" id="item_code" name="designation" value="<?php echo $designation; ?>" placeholder="Item Code" required>
                                           
                                        </div>   
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Start Year:</label>
                                            <div class="col-sm-4">
                                               <input type="text" class="form-control" id="item_code1" name="syear" value="<?php echo $syear; ?>" placeholder="Item Code" required>
                                           
                                        </div>   
                                    </div>

                                       <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">End Year:</label>
                                            <div class="col-sm-4">
                                               <input type="text"  class="form-control" id="item_code" name="eyear" value="<?php echo $eyear; ?>" placeholder="Item Code" required>
                                           
                                        </div>   
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item1"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete456" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $fname; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        
                        //Update Items
                        if(isset($_POST['update_item1'])){
                            $edit_item_id1 = $_POST['edit_item_id1'];
                            $cname = $_POST['cname'];
                            $designation = $_POST['designation'];
                            $syear = $_POST['syear'];
                            $eyear = $_POST['eyear'];
                            $sql = "UPDATE experience SET company_name ='$cname',designation='$designation',start_year='$syear',end_year='$eyear' WHERE ex_id = '$edit_item_id1'  ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="update.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbluser WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="update.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                   
?>
            </tbody>
        </table>

  </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>

</html>
