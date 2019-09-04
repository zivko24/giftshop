<?php

include('admin_session.php');
if(isset($_POST['order_id'])){
    $id=$_POST['order_id'];
    $SQL="UPDATE orders SET order_status='ready' WHERE id=$id";

    if (mysqli_query($connection, $SQL)) {
        echo "success";
    } else {
        echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
    }

}