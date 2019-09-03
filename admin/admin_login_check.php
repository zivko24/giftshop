<?php
session_start();

if ($_SESSION['admin']!=null) {
    header('Location: admin_panel.php');
}

include ('../includes/db_config.php');

$username=mysqli_escape_string($connection, $_POST['username']);
$password=md5(mysqli_escape_string($connection, $_POST['password']));
$SQL="SELECT * from admin WHERE username='$username' and password='$password' ";

$result=mysqli_query($connection, $SQL);
$user=mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($user) { 
    $_SESSION['admin']=$username;
    $_SESSION['guest']=false;
    header('Location: admin_panel.php');
}
else {
    $_SESSION['guest']=true;
    header('Location: ../admin_login.php?failed');
}