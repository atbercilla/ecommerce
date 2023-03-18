<?php
include_once "db_conn.php";


if(isset($_POST['u_userid'])){
    $table = "users";
    
    $p_user_id  = $_POST['u_userid'];
    $p_username = $_POST['u_username'];
    $p_password = $_POST['u_password'];
    $p_fullname = $_POST['u_fullname'];
    
    
    $fields = array( 'username' => $p_username
                   , 'password' => $p_password
                   , 'fullname' => $p_fullname 
                   );
    $filter = array( 'user_id' => $p_user_id );
    
   
   if( update($conn, $table, $fields, $filter )){
       header("location: index.php?update_status=success");
       exit();
   }
    else{
        header("location: index.php?update_status=failed");
        exit();
    }
 }
?>