<?php
include('admin_session.php');

$categories_sql = "SELECT * from category";
$categories_result = mysqli_query($connection, $categories_sql);

$admin = $_SESSION['admin'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Latest compiled and minified JavaScript -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Giftshop pokloni">

    <title>GiftSHOP</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="http://localhost/giftshop/admin/admin_panel.php">GIFTSHOP ADMIN</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <?php
                            while ($c = mysqli_fetch_array($categories_result, MYSQLI_ASSOC)) {
                                ?>
                                <li><a href="products.php?id_category=<?php echo $c['id_category']; ?>"><?php echo $c['category_name']; ?></a></li>
                                <li role="separator" class="divider"></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="http://localhost/giftshop/admin/admin_add_product.php">Add product</a></li>
                    <li><a href="http://localhost/giftshop/admin/admin_add_category.php">Add category</a></li>
                    <li class="right"><a href="http://localhost/giftshop/includes/logout.php">Log Out</a> </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->

    </nav>


    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

            <div>
                <h3>Porudzbine na cekanju</h3>
            </div>

            <?php
            $SQLporudzbine = "SELECT orders.id, orders.order_status, orders.price, order_date, user.name, user.street, user.number, user.city, user.country from orders left JOIN user ON orders.user_id=user.id_user WHERE order_status='ordered'";
            $resultPorudzbine = mysqli_query($connection, $SQLporudzbine);
            while ($row = mysqli_fetch_array($resultPorudzbine, MYSQLI_ASSOC)) {
                $status = "";
                echo "
                    <div class=\"panel panel-info\">
                    <div class=\"panel-heading\">Pošiljka na cekanju</div>
                    <div class=\"panel-body\">
                        <table class='table'>
                        <tr><th>Broj porudzbine</th><td>" . $row['id'] . "</td></tr>
                        <tr><th>Iznos posiljke</th><td>" . $row['price'] . "</td></tr>
                        <tr><th>Vreme porucivanja</th><td>" . $row['order_date'] . "</td></tr>
                        <tr><th>Ime</th><td>" . $row['name'] . "</td></tr>
                        <tr><th>Grad</th><td>" . $row['city'] . "</td></tr>
                        <tr><th>Ulica</th><td>" . $row['street'] . "</td></tr>
                        <tr><th>Broj</th><td>" . $row['number'] . "</td></tr>
                        <tr><th>Drzava</th><td>" . $row['country'] . "</td></tr>
                        </table>
                        <button class='btn btn-success right spremnaP' data-id='" . $row['id'] . "'>Spremna</button>

                    </div>
                </div>
                ";
            }
            ?>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

            <div>
                <h3>Spremne porudzbine</h3>
            </div>

            <?php
            $SQLporudzbine = "SELECT orders.id, orders.order_status, orders.price, order_date, user.name, user.street, user.number, user.city, user.country from orders left JOIN user ON orders.user_id=user.id_user WHERE order_status='ready'";
            $resultPorudzbine = mysqli_query($connection, $SQLporudzbine);
            while ($row = mysqli_fetch_array($resultPorudzbine, MYSQLI_ASSOC)) {
                $status = "";
                echo "
                    <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">Spremna porudzbina</div>
                    <div class=\"panel-body\">
                        <table class='table'>
                            <tr><th>Broj porudzbine</th><td>" . $row['id'] . "</td></tr>
                            <tr><th>Iznos posiljke</th><td>" . $row['price'] . "</td></tr>
                            <tr><th>Vreme porucivanja</th><td>" . $row['order_date'] . "</td></tr>
                            <tr><th>Ime</th><td>" . $row['name'] . "</td></tr>
                            <tr><th>Grad</th><td>" . $row['city'] . "</td></tr>
                            <tr><th>Ulica</th><td>" . $row['street'] . "</td></tr>
                            <tr><th>Broj</th><td>" . $row['number'] . "</td></tr>
                            <tr><th>Drzava</th><td>" . $row['country'] . "</td></tr>
                        </table>
                    </div>
                    </div>
                ";
            }
            ?>

        </div>


    </div>
</body>
<script>
    $('.spremnaP').click(function() {
        var id = $(this).data('id')
        $.post('order_ready.php', {
            'order_id': id
        }, function() {
            location.reload();
        })

    })
</script>

</html>