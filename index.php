<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Responsive Sticky Navbar</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/jquery-3.4.1.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <style>
      .blur{
         background-color: #a5a5a5;
         border-radius: 25px;
         padding:20px;
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-expand-md navbar-light bg-light position-fixed container-fluid">
         <a class="navbar-brand" href="#">
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
                  <a class="nav-link" href="about.php">About us</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
               </li>
          
            </ul>

            <ul class="nav navbar-nav ml-auto">
            <?php if (isset($_SESSION['user']) && $_SESSION['user']!=0) {
               echo '<li class="nav-item">
               <a class="nav-link" href="includes/logout.php">Logout</a>
            </li>';
               
            } else {
               echo '<li class="nav-item">
               <a class="nav-link" href="login.php">Login</a>
            </li>';
            }
            
            ?>
            
         </ul>
         </div>
      </nav>
   <div class="wrapper">

      <header>
      <div class="container">
              <div class="carousel-caption text-left blur">
                <h1>Welcome to our shop</h1>
                <p> Visit our SHOP page for more products!</p>
                <p><a class="btn btn-lg btn-primary" href="shop.php" role="button">SHOP</a></p>
              </div>
            </div>
      </header>
      <div class="content">
      <h3>Pokloni</h3>
                        <p>Gift.shop doo je danas prodavnica najludjih i najorginalnijih poklona u Srbiji, kakve ste do sada mogli samo da gledate na internetu, ali ne i da naručite.
                            Trudimo se i uživamo birajući artikle za našu ponudu, ali prihvatamo sve sve kritike i sugestije naših dragih posetilaca.

                            Nama je bitno da uživamo u svom poslu i da su naše mušterije zadovoljne, jer bez toga ništa ne vredi. Osim novca..</p>
      </div>
   </div>
</body>

</html>