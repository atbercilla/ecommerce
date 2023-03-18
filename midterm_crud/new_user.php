<?php
include_once "db_conn.php";

if(isset($_POST['new_username'])){
    $n_username=$_POST['new_username'];
    $n_password=$_POST['new_password'];
    $n_fullname=$_POST['new_fullname'];
    
    $table = "users";
    $fields = array('username' => $n_username
                   , 'password' => $n_password
                   , 'fullname' => $n_fullname 
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: index.php?new_user=added");
        exit();
    }  
    else{
        header("location: index.php?new_user=failed");
        exit();
    }
}