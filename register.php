<?php 
   include('includes/user_session.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Register</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/login.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="js/jquery-3.4.1.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
</head>

<body>
   <nav class="navbar navbar-expand-md navbar-light bg-light container-fluid">
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
            <form id="myform" method="POST" action="includes/register_check.php">
               <input type="text" id="name" class="fadeIn second" name="name" placeholder="Full Name">
               <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
               <input type="text" id="email" class="fadeIn second" name="email" placeholder="E-mail">
               <input type="text" name="birthday" id="datepicker" class="datepicker" data-date-format="dd/mm/yyyy" placeholder="Birthday">
               <input type="text" id="city" class="fadeIn second" name="city" placeholder="City">
               <input type="text" id="country" class="fadeIn second" name="country" placeholder="Country">
               <input type="text" id="street" class="fadeIn second" name="street" placeholder="Street name">
               <input type="text" id="number" class="fadeIn second" name="number" placeholder="Street number">
               <input type="text" id="post" class="fadeIn second" name="post" placeholder="Post number">
               <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
               <input type="password" id="confirmed" class="fadeIn third" name="confirmed" placeholder="Confirm Password">
               <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
               <a class="underlineHover" href="login.php">Already have account? Login</a>
            </div>

         </div>
      </div>
   </div>
   <script>
      $(function() {
         $("#datepicker").datepicker();
         //Pass the user selected date format
         $("#datepicker").datepicker("option", "dateFormat", "mm/dd/yy");

      });

      $("#myform").validate({
            rules: {
               name: {
                  required: true,
                  minlength: 5
               },
               username: {
                  required: true,
                  minlength: 5
               },
               birthday: {
                  required: true,
               },
               email: {
                  required: true,
                  email: true
               },
               city: {
                  required: true
               },
               country: {
                  required: true
               },
               street: {
                  required: true
               },
               number: {
                  required: true,
                  number: true
               },
               password: {
                  required: true,
                  minlength: 8
               },
               confirmed: {
                  equalTo: "#password"
               }
            
            }
         });

   </script>
</body>

</html>