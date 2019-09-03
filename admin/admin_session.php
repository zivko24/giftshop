<?php
session_start();
include('db_config.php');

if(isset($_SESSION['admin'])){
    $user_check = $_SESSION['admin'];
    $ses_sql = mysqli_query($connection,"select username from admin where username = '$user_check'");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    if ($row['username']!=$user_check){
        header("location:admin_login.php");
    } else {
    }
} else {
    header("location:admin_login.php");
}
?>