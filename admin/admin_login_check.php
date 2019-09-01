<?php
include ('admin_session.php');

$username=mysqli_escape_string($connection, $_POST['username']);
$password=md5(mysqli_escape_string($connection, $_POST['password']));
$SQL="SELECT * from admin WHERE username='$username' and password='$password' ";

$result=mysqli_query($connection, $SQL);

$user=mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($user) {
    $_SESSION['admin']=$username;
    // header('Location: ../admin_panel.php');
}
else {
    // header('Location: ../admin_login.php?failed');
    $_SESSION['guest']=true;

}