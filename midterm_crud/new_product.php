<?php
include_once "db_conn.php";

if(isset($_POST['new_item_name'])){
    $n_item_name=$_POST['new_item_name'];
    $n_item_price=$_POST['new_item_price'];
    
    $table = "products";
    $fields = array('item_name' => $n_item_name
                  , 'item_price' => $n_item_price
                  );
    
    if(insert($conn, $table, $fields) ){
        header("location: index_product.php?new_product=added");
        exit();
    }  
    else{
        header("location: index_product.php?new_product=failed");
        exit();
    }
}