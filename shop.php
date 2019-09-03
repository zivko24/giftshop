<?php
session_start();
include('includes/db_config.php');
var_dump($_SESSION);
$categories_sql = "SELECT * from category";
$categories_result = mysqli_query($connection, $categories_sql);

$random_sql = "SELECT * from product ORDER BY RAND() LIMIT 3";
$random_result =  mysqli_query($connection, $random_sql);
$random = mysqli_fetch_all($random_result, MYSQLI_ASSOC);
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

  <style>
    .presentation {
      width: 900px;
      height: 350px;
      object-fit: scale-down;
      background-color: #c5c5c5;
    }

    .thumb {
      width: 700px;
      height: 400px;
      object-fit: scale-down;
      background-color: #c5c5c5;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

      <ul class="nav navbar-nav ml-auto">
        <?php if (isset($_SESSION['cart'])) {
          ?>
          <a href="cart.php">
          <button type="button" class="btn btn-primary">
            <i class="fa fa-shopping-cart d-inline" aria-hidden="true"></i>
          </button>
          </a>
        <?php
        }
        ?>

      </ul>




    </div>
  </nav>

  <div class="container-fluid">
    <div class="container push-down">

      <div class="row">
        <div class="col-lg-3">

          <h1 class="my-4"></h1>
          <div class="list-group">
            <?php
            while ($c = mysqli_fetch_array($categories_result, MYSQLI_ASSOC)) {
              ?>
              <a href="" data-id="<?php echo $c['id_category']; ?>" class="list-group-item category_select"><?php echo $c['category_name']; ?></a>

            <?php
            }
            ?>

          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <?php
              foreach ($random as $product) {
                if ($random[0] == $product) { ?>
                  <div class="carousel-item active">
                    <img class="d-block img-fluid presentation" src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                  </div> <?php
                            } else {
                              ?>
                  <div class="carousel-item">
                    <img class="d-block img-fluid presentation" src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                  </div> <?php
                            }
                          }
                          ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="false"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="false"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row" id="products">

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
  </div>
  </div>
  </div>
  <script>
    $(document).ready(function() {

      $(".category_select").on("click", function(e) {
        e.preventDefault();
        console.log($(this).data("id"));

        $("#products").load('includes/load_products.php', {
          "category_id": $(this).data("id"),
          "order": "ASC",
        }, load_cart_functions)
      });



      $(".category_select").ready(function(e) {
        var category_id = $(".category_select").first().data("id");
        $("#products").load('includes/load_products.php', {
          "category_id": category_id,
          "order": "ASC",
        }, load_cart_functions);
      });
    })

    function load_cart_functions() {
      $(".addInCart").on("click", function(e) {

        $.post('includes/add_to_cart.php', {
          "product_id": $(this).data("id"),
          "quantity": 1
        }, function(data) {
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Item added to cart',
            showConfirmButton: false,
            timer: 1500
          })
        });
      });
    }
  </script>

</body>

</html>