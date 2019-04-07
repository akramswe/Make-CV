<?php
include 'include/controller.php';
require_once('connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD</title>
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
</head>

<body onload="myFunction()" style="margin:0;">
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                <?php echo $session_username . " ($session_role)"; ?> <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#logout" data-toggle="modal"><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span> Logout</a></li>
                <li><a href="#changepass" data-toggle="modal"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Change Password</a></li>
            </ul>
            <a href="#add" data-toggle="modal">
                <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Item</button>
            </a>
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Item Code</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Item Code</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    $sql = "SELECT tbl_items.id, tbl_items.item_name, tbl_items.item_code, tbl_items.item_description, tbl_items.item_category, tbl_items.item_critical_lvl AS critical_lvl, tbl_inventory.qty AS qty FROM tbl_items join tbl_inventory ON tbl_items.item_code=tbl_inventory.item_code";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $item_name = $row['item_name'];
                            $item_code = $row['item_code'];
                            $item_category = $row['item_category'];
                            $item_description = $row['item_description'];
                            $critical_lvl = $row['critical_lvl'];
                            $qty = $row['qty'];

                            if($qty == 0){
                                $alert = "<div class='alert alert-danger'>
                                <strong>$qty</strong> No Stock
                                </div>";
                            }else if($critical_lvl >= $qty){
                                $alert = "<div class='alert alert-warning'>
                                <strong>$qty</strong> Critical Level
                                </div>";
                            }else {
                                $alert = $qty;
                            }

                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $item_name; ?>
                    </td>
                    <td>
                        <?php echo $item_code; ?>
                    </td>
                    <td>
                        <?php echo $item_category; ?>
                    </td>
                    <td>
                        <?php echo $item_description; ?>
                    </td>
                    <td>
                        <?php echo $alert; ?>
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
                    <!--In Stock/s Modal -->
                    <div id="add<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form method="post" class="form-horizontal" role="form">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Stocks</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" name="add_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>"> </div>
                                            <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>" autocomplete="off"> </div>
                                            <label class="control-label col-sm-1" for="dr_no">DR #:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="dr_no" name="dr_no" placeholder="DR #" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" autocomplete="off" required min="1"> </div>
                                            <label class="control-label col-sm-2" for="item_name">Remarks:</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="add_inventory"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Out Stocks Modal -->
                    <div id="out<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <form method="post" class="form-horizontal" role="form">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Out Stocks</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                            <div class="col-sm-2">
                                                <input type="hidden" name="minus_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>"> </div>
                                            <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>"> </div>
                                            <label class="control-label col-sm-2" for="dr_no">DR No.:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="dr_no" name="dr_no" placeholder="DR No." autocomplete="off" required autofocus> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" autocomplete="off" required max="<?php echo $qty; ?>" min="1"> </div>
                                            <label class="control-label col-sm-2" for="received_by" data-toggle="tooltip" title="Unit of Measurement">Receive By:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="received_by" name="received_by" autocomplete="off" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Remarks:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="minus_inventory"><span class="glyphicon glyphicon-plus"></span> Out</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="changepass" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Current:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="current_password" required placeholder="Current Password" autofocus autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">New:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="new_password" required placeholder="New Password" autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Repeat:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="repeat_password" required placeholder="Repeat Password" autocomplete="off"> </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="change_pass">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Item Name" required autofocus> </div>
                                            <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Item Code" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Description:</label>
                                            <div class="col-sm-4">
                                                <textarea cclass="form-control" id="item_description" name="item_description" placeholder="Description" required style="width: 100%;">
                                                            <?php echo $item_description; ?>
                                                        </textarea>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Category:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Category" required> </div>
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
                                                <?php echo $item_name; ?>?</strong> </div>
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
                        if(isset($_POST['change_pass'])){
                            $sql = "SELECT password FROM tbl_user WHERE username='$session_username'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    if($row['password'] != $current_password){
                                        echo "<script>window.alert('Invalid Password');</script>";
                                        $passwordErr = '<div class="alert alert-warning"><strong>Password!</strong> Invalid.</div>';
                                    } elseif($new_password != $repeat_password) {
                                        echo "<script>window.alert('Password Not Match!');</script>";
                                        $passwordErr = '<div class="alert alert-warning"><strong>Password!</strong> Not Match.</div>';
                                    } else{
                                        $sql = "UPDATE tbl_user SET password='$new_password' WHERE username='$session_username'";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<script>window.alert('Password Successfully Updated');</script>";
                                        } else {
                                            echo "Error updating record: " . $conn->error;
                                        }
                                    }    
                                }
                            } else {
                                $usernameErr = '<div class="alert alert-danger"><strong>Username</strong> Not Found.</div>';
                                $username = "";
                            }
                        }


                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_item_id = $_POST['edit_item_id'];
                            $item_name = $_POST['item_name'];
                            $item_code = $_POST['item_code'];
                            $item_category = $_POST['item_category'];
                            $item_description = $_POST['item_description'];
                            $sql = "UPDATE tbl_items SET 
                                item_name='$item_name',
                                item_code='$item_code',
                                item_category='$item_category',
                                item_description='$item_description'
                                WHERE id='$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbl_items WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbl_inventory WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbl_inventory WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="inventory.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                    //Add Item        
                    if(isset($_POST['add_item'])){
                        $item_name = $_POST['item_name'];
                        $item_code = $_POST['item_code'];
                        $item_category = $_POST['item_category'];
                        $item_description = $_POST['item_description'];
                        $sql = "INSERT INTO tbl_items (item_name,item_code,item_description,item_category,item_critical_lvl,item_date)VALUES ('$item_name','$item_code','$item_description','$item_category','$item_critical_lvl','$date')";
                        if ($conn->query($sql) === TRUE) {
                            $add_inventory_query = "INSERT INTO tbl_inventory(item_name,item_code,date,qty)VALUES ('$item_name','$item_code','$date','0')";

                            if ($conn->query($add_inventory_query) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['add_inventory'])){
                        $add_stocks_id = clean($_POST['add_stocks_id']);
                        $remarks = clean($_POST["remarks"]);
                        $quantity = clean($_POST['quantity']);
                        $sql = "INSERT INTO tbl_issuance(date,item_name,item_code,qty, in_out,            remarks)VALUES ('$date_time','$item_name','$item_code','$quantity','in','$remarks')";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE tbl_inventory SET qty=(qty + '$quantity') WHERE id='$add_stocks_id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }

                    if(isset($_POST['minus_inventory'])) {
                        $minus_stocks_id = clean($_POST['minus_stocks_id']);
                        $remarks = clean($_POST["remarks"]);
                        $quantity = clean($_POST['quantity']);
                        $sql = "INSERT INTO tbl_issuance(date,item_name,item_code,qty, sender_receiver,in_out,            remarks)VALUES ('$date_time','$item_name','$item_code','$quantity','$received_by','out','$remarks')";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE tbl_inventory SET qty=(qty - '$quantity') WHERE id='$minus_stocks_id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
?>
            </tbody>
        </table>
    </div>
    <!--Add Item Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" autocomplete="off" autofocus required> </div>
                            <label class="control-label col-sm-2" for="item_code">Item Code:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" autocomplete="off" required> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_category">Category:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_category" name="item_category" placeholder="Item Category" autocomplete="off" required> </div>
                            <label class="control-label col-sm-2" for="item_critical_lvl">Critical Level:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="item_critical_lvl" name="item_critical_lvl" autocomplete="off" required> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_sub_category">Description:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="item_description" name="item_description" autocomplete="off" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Add</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Logout Modal -->
    <div id="logout" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">3
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Logout</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                    <div class="alert alert-danger">Are you Sure you want to logout
                        <strong>
                            <?php echo $_SESSION['user_name']; ?>?
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <a href="logout.php">
                            <button type="button" class="btn btn-danger">YES </button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
