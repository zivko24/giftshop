<?php

include ('user_session.php');
$username=mysqli_escape_string($connection, $_POST['username']);
$password=md5(mysqli_escape_string($connection, $_POST['password']));
$SQL="SELECT * from user WHERE (email='$username' or username='$username') and password='$password' and code=1";

$result=mysqli_query($connection, $SQL);

$user=mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($result) {
    $_SESSION['user']=(int) $user['id_user'];
    $_SESSION['guest']=false;
}
else {
    header('Location: ../login.php?failed');
    $_SESSION['guest']=true;

}