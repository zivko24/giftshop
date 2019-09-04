<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gift Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gift shop" />
    <meta name="keywords" content="gifts, poklon, shop, gift" />
    <meta name="author" content="Nemanja Levnajic i Zivko Popic" />


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
    </head>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="csss/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="csss/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="csss/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="csss/magnific-popup.css">
    <!-- Superfish -->
    <link rel="stylesheet" href="csss/superfish.css">

    <link rel="stylesheet" href="csss/style.css">


    <!-- Modernizr JS -->
    <script src="jss/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="jss/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Header -->

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

    <div class="fh5co-hero fh5co-hero-2">

        <!-- end:header-top -->
        <div id="fh5co-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                        <h3>Kako smo nastali?</h3>
                        <p style="font-family: 'Kristen ITC'">Gift.shop doo nastao je jedne hladne prednovogodišnje večeri, dok smo testirali „Mirna Bačka” Vojvodjansko belo vino iz Sremskih Karlovaca u lokalnoj kafani u mirnoj varošici na severu Bačke. Malko smo se zaneli u testiranju, i nekoliko flaša kasnije (čitaj 8), kao i svi pod dejstvom, došli smo na ideju da uradimo nešto pozitivno sa svojim životima.
                            Kako nismo previše popili planovi za pozitivu su bili na državnom nivou, to jest na nivou Republike Srbije. Da smo nastavili piti rešavali bi mi i globalne stvari.Bilo je tu ideja od reforme zdravstva, izgradnja brzih pruga u Srbiji, pa sve do zaključka da u Srbiji ne može čovek da kupi normalan poklon kad ide nekom na „nešto” (čitaj slavu, rodjendan, imendan, veridbu, udadbu, prasenje krmače, etc).

                            Imaš toliko dobrih stranih gift shopova sa svim moćnim ludim gedžitima, poklonima za sve prilike, sve super moćno fensi, al ne može kod nas. Il neće da šalju, il ne primaju naše kartice, il ti naši zalepe carinu pa ti bude žao što si se rodio a ne što si naručio nešto preko neta.

                            Ajmo mi da napravimo sajt, u Srbiji, koji će svvvedda to prrodajje, hik ! – AJMOOO.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row-bottom-padded-md">
                    <div class="col-md-6 animate-box">
                        <figure>
                        </figure>
                    </div>
                    <div class="col-md-6 animate-box">
                        <h3>Pokloni</h3>
                        <p>Gift.shop doo je danas prodavnica najludjih i najorginalnijih poklona u Srbiji, kakve ste do sada mogli samo da gledate na internetu, ali ne i da naručite.
                            Trudimo se i uživamo birajući artikle za našu ponudu, ali prihvatamo sve sve kritike i sugestije naših dragih posetilaca.

                            Nama je bitno da uživamo u svom poslu i da su naše mušterije zadovoljne, jer bez toga ništa ne vredi. Osim novca..</p>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-8 col-md-offset-2 animate-box">
                                <h3>Simple &amp; Humble Beginning</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut rerum perspiciatis, debitis pariatur atque vitae sed blanditiis nobis sint, reprehenderit quas, natus corrupti! Ipsum cum possimus corporis aut architecto! Delectus enim adipisci quidem possimus voluptates! Aut ut aliquid molestias laudantium.</p>
                            </div> -->
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <div class="footer_bar">

    </div>
    </footer>

    <!-- jQuery -->


    <script src="jss/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="jss/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="jss/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="jss/jquery.waypoints.min.js"></script>
    <!-- Stellar -->
    <script src="jss/jquery.stellar.min.js"></script>
    <!-- Superfish -->
    <script src="jss/hoverIntent.js"></script>
    <script src="jss/superfish.js"></script>

    <!-- Main JS (Do not remove) -->
    <script src="jss/main.js"></script>



    <script src="styles/bootstrap-4.1.2/popper.js"></script>
    <script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/progressbar/progressbar.min.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>