<html>
<?php include_once "db_conn.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Users</title>
 <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3>New User</h3>
                
                <?php
                     if(isset($_GET['new_user'])){
                            switch($_GET['new_user']){
                                case "added": echo "<div class='alert alert-success'>User Added.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>User Not Added</div>";
                                      break;
                                        
                            }
                       }
                ?>
                
                <form action="new_user.php" method="post">
                    <div class="mb-3">
                        <label for="new_username" class="form-label">Username</label>
                        <input type="text" id="new_username" required name="new_username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password</label>
                        <input type="password" required id="new_password" name="new_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new_fullname" class="form-label">Fullname</label>
                        <input type="text" required id="new_fullname" name="new_fullname" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
                
            </div>
            <div class="col-8">
               <h3>Update User</h3>
                <?php
                  $userlist = query($conn, "select user_id, username, password, fullname from users where user_status='A'");
                 // var_dump($userlist);
                  echo "<hr>";
                       if(isset($_GET['update_status'])){
                            switch($_GET['update_status']){
                                case "success": echo "<div class='alert alert-success'>User Updated.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>User Failed to be updated.</div>";
                                      break;
                                        
                            }
                       }
                  echo "<hr>";
                  
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                         echo "<th>Username</th>";
                         echo "<th>Password</th>";
                         echo "<th>Fullname</th>";
                         echo "<th>Action</th>";
                    echo "</thead>";
                  foreach($userlist as $key => $row){
                      echo "<tr>";
                         echo "<td>" . $row['username'] . "</td>";
                         echo "<td>" . $row['password'] . "</td>";
                         echo "<td>" . $row['fullname'] . "</td>";
                         echo "<td> <a class='btn btn-success' href='submit.php?password=" . $row['password'] . "&fullname=" .$row['fullname'] . "&username=" . $row['username']. "&user_id=". $row['user_id'] ."' > Update </a> </td>";
                         echo "<td> <a class='btn btn-danger' href='delete.php?user_id=". $row['user_id'] ." ' > Delete </a> </td>";
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