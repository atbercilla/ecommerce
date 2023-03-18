<?php

if(isset($_GET['user_id'])){
    $user_id  = $_GET['user_id'];
    $password = $_GET['password'];
    $fullname = $_GET['fullname'];
    $username = $_GET['username'];

}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                       <label for="">User</label>
                        <input type="text" hidden name="u_userid" value="<?php echo $user_id; ?>" class="form-control">
                        <input type="text" name="u_username" value="<?php echo $username; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                       <label for="">Password</label>
                        <input type="password" name="u_password" value="<?php echo $password; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                       <label for="">Fullname</label>
                        <input type="text" name="u_fullname" value="<?php echo $fullname; ?>" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
                
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>