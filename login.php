<?php 
    include('includes/user_session.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/login.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/jquery-3.4.1.js"></script>
   <script src="js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-light container-fluid">
         <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" class="col-1 d-none d-sm-inline-block" alt="giftshop">
            <strong>GiftSHOP</strong>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
               </li>
            </ul>

         </div>
      </nav>

      <div class="container-fluid">
      <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/logo.png" class="col-3" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST" action="includes/login_check.php">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <div id="formFooter">
        <a class="underlineHover" href="register.php">Don't have account? Register</a>
    </div>

  </div>
</div>
      </div>
</body>

</html>