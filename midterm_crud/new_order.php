<?php
include_once "db_conn.php";

if(isset($_POST['new_user_order'])){
    $n_user_order=$_POST['new_user_order'];
    $n_item_order=$_POST['new_item_order'];
    $n_item_qty=$_POST['new_item_qty'];
    
    $table = "orders";
    $fields = array('user_id' => $n_user_order
                   , 'item_id' => $n_item_order
                   , 'item_qty' => $n_item_qty
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: index_order.php?new_order=added");
        exit();
    }  
    else{
        header("location: index_order.php?new_order=failed");
        exit();
    }
}