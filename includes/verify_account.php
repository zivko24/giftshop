<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 04/09/2018
 * Time: 05:00
 */
include ('user_session.php');
$code=$_GET['code'];

$SQL="UPDATE user SET code=1 WHERE code='$code' ";
$SQL2="SELECT id_user from user where code='$code'";
$result=mysqli_query($connection, $SQL2);
while ($c=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $_SESSION['user']=$c['id_user'];
}

if (mysqli_query($connection, $SQL)) {
    echo "Uspesno ste verifikovali nalog";
    header('Location: ../confirm.php?confirmed');
} else {
    echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
    header('Location: ../confirm.php');
}