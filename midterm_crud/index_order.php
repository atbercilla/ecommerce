<html>
<?php include_once "db_conn.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
 <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3>New Order</h3>
                
                <?php
                     if(isset($_GET['new_order'])){
                            switch($_GET['new_order']){
                                case "added": echo "<div class='alert alert-success'>Order Added.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>Order Not Added</div>";
                                      break;
                                        
                            }
                       }
                ?>
                
                <form action="new_order.php" method="post">
                    <div class="mb-3">
                        <label for="new_user_order" class="form-label">User</label>
                        <select id="new_user_order" required name="new_user_order" class="form-select">
                            <option disabled selected>--select--</option>
                            <?php
                            $user = query($conn, "SELECT user_id, fullname FROM users WHERE user_status= 'A'");
                            foreach ($user as $key => $row) { ?>
                            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['fullname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="new_item_order" class="form-label">Product</label>
                        <select id="new_item_order" required name="new_item_order" class="form-select">
                            <option disabled selected>--select--</option>
                            <?php
                            $item = query($conn, "SELECT item_id, item_name FROM products");
                            foreach ($item as $key => $row) { ?>
                            <option value="<?php echo $row['item_id']; ?>"><?php echo $row['item_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="new_item_qty" class="form-label">Quantity</label>
                        <input type="number" id="new_item_qty" required name="new_item_qty" min="1" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
                
            </div>
            <div class="col-9">
               <h3>Order Records</h3>
                <?php
                  $orderlist = query($conn, "SELECT o.order_id, u.username, u.fullname, p.item_name, o.item_qty, o.date_ordered FROM orders o JOIN users u ON o.user_id = u.user_id JOIN products p ON o.item_id = p.item_id WHERE o.order_status = 'P'");
                 // var_dump($orderlist);
                  echo "<hr>";
                       if(isset($_GET['update_status'])){
                            switch($_GET['update_status']){
                                case "success": echo "<div class='alert alert-success'>Order list updated!</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>Order list failed to be updated.</div>";
                                      break;
                            }
                       }
                  echo "<hr>";
                  
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                         echo "<th>Username</th>";
                         echo "<th>Fullname</th>";
                         echo "<th>Item Name</th>";
                         echo "<th>Item Quantity</th>";
                         echo "<th>Date Ordered</th>";
                         echo "<th>Action</th>";
                    echo "</thead>";
                  foreach($orderlist as $key => $row){
                      echo "<tr>";
                         echo "<td>" . $row['username'] . "</td>";
                         echo "<td>" . $row['fullname'] . "</td>";
                         echo "<td>" . $row['item_name'] . "</td>";
                         echo "<td>" . $row['item_qty'] . "</td>";
                         echo "<td>" . $row['date_ordered'] . "</td>";
                         echo "<td> <a class='btn btn-success' href='order_submit.php?fullname=" . $row['fullname'] . "&item_name=" .$row['item_name'] . "&item_qty=" .$row['item_qty'] . "&date_ordered=" . $row['date_ordered']. "&username=". $row['username'] ."' > Update </a> </td>";
                         echo "<td> <a class='btn btn-danger' href='order_cancel.php?order_id=". $row['order_id'] ." ' > Delete </a> </td>";
                    echo "</tr>";
                  }
                   echo "</table>";
                
                ?>
                
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>