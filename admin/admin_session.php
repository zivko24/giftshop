<?php
include('includes/db_config.php');

session_start();
if(isset($_SESSION['admin'])){
    $user_check = $_SESSION['admin'];
    $ses_sql = mysqli_query($connection,"select username from admin where username = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    if ($row['username']!==$user_check){
        header("location:index.php");
    }
} else {
    header("location: admin_panel.php");
}
?>