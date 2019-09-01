<?php
include('db_config.php');
session_start();
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart']=[];
}

if(isset($_SESSION['user'])){
    $user_check = $_SESSION['user'];
    $ses_sql = mysqli_query($connection,"select id_user from user where id_user = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    if ($row['id_user']!==$user_check){
        header("location:index.php");
    }
} else {
    $_SESSION['guest']=session_regenerate_id();
}
?>