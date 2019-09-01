<?php
include('user_session.php');

var_dump($_POST);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$username = mysqli_real_escape_string($connection, $_POST['username']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
$city = mysqli_real_escape_string($connection, $_POST['city']);
$country = mysqli_real_escape_string($connection, $_POST['country']);
$street = mysqli_real_escape_string($connection, $_POST['street']);
$number = mysqli_real_escape_string($connection, $_POST['number']);
$post_number = mysqli_real_escape_string($connection, $_POST['post']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$confirmed = mysqli_real_escape_string($connection, $_POST['confirmed']);

$user_exists = false;

if ($password == $confirmed) {
    $password = md5($password);
}
if (isset($_POST['email'])) {

    $SQL = "SELECT email from user where email='$email'";
    $result = mysqli_query($connection, $SQL);
    var_dump($result);
    if ($result) {

        /** EMAIL POSTOJI U BAZI */

        $user_exists = true;
    } else {

        $user_exists = false;

        $code = md5(time());
        $SQL = "INSERT INTO `user` (`username`, `password`, `name`, `birthday`, `country`, `city`, `post_number`, `street`, `number`, `code`, `phone_number`, `email`) 
        VALUES ('$username', '$password', '$name', '$birthday', '$country', '$city', '$post_number', '$street', '$number', '$code', NULL, '$email')";

        if (mysqli_query($connection, $SQL)) {
            header('Location: ../confirm.php');
            echo "New record created successfully";
        } else {
            echo "Error: " . $SQL . "<br>" . mysqli_error($connection);
        }
    }

     
        $subject = 'Confirmation code | GiftShop';

        $headers = "From: support@giftshop.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        $message = <<< PORUKA
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

a {
text-decoration: none;
color: white;
}

#all {
background-color: #226647;
padding: 15px;
}

#container {
margin-bottom: 15px;
}

.link {
margin-top: 15px;
margin-bottom: 15px;
background-color: #3d97f7;
padding: 10px;
color: white;
}

.bottom {
    color: #686868;
    font-size: 10px;
}

.big {
font-size: 40px;
font-weight: 900;
}
</style>
</head>
<body>
    <div id="all">
        <div id="container">
            <span class="big">
                Poštovani,<br>
            </span>
            Hvala Vam na registraciji.
            <br>
            <br>
            <a href="http://localhost/giftshop/includes/verify_account.php?code=$code"><div class="link">Kliknite ovde da verifikujete email adresu</div></a>
            <div class="bottom">Ukoliko ne možete da kliknete na link gore, molimo vas da ručno odete na sledeći link: <a href="http://localhost/giftshop/includes/verify_account.php?code=$code">http://localhost/giftshop/includes/verify_account.php?code=$code</a> <br>Ovo je automatizovani email. Molimo da ne odgovarate na njega<br>Ukoliko ne znate odagle je došao, molimo Vas, ignorišite ga</span>
        </div>
    </div>
</body>
</html> 
PORUKA;

        mail($email, $subject, $message, $headers);

        echo "da";
    }

