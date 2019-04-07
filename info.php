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


             <?php
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
                                echo '<script>window.location.href="dashboard.php"</script>';
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
                                    echo '<script>window.location.href="dashboard.php"</script>';
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