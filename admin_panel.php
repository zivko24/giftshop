<?php
include ('admin/admin_session.php');

$categories_sql="SELECT * from category";
$categories_result=mysqli_query($connection, $categories_sql);

$admin=$_SESSION['admin'];

?>
<!DOCTYPE html>
<html lang="en">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="css/salate.css" rel="stylesheet">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dezert salate u tegli. Ukusne poslastice zdrave i hranljive.">
    <meta name="keywords" content="Dezert salate, Slatke salate, Salate sa nutelom, salate sa eurokremom,
                                    salata, eurokrem, dezert, slatko, cokolada, chokocake, honey cake, homeroche, monaliza, nugat,
                                    jabuka cake"/>
    <meta name="author" content="BPP team">
    <title>Salad in a jar</title>
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
                <li><a href="index.php">GIFTSHOP ADMIN</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <?php
                        while ($c=mysqli_fetch_array($categories_result, MYSQLI_ASSOC)) {
                            ?>
                            <li><a href="salate.php?category_id=<?php echo $c['idkategorija']; ?>"><?php echo $c['naziv_kategorije']; ?></a></li>
                            <li role="separator" class="divider"></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="admin/add_product.php">Add product</a></li>
                <li><a href="admin/add_category.php">Add category</a></li>
                <li class="right"><a href="includes/logout.php">Log Out</a> </li>

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
$SQLporudzbine="SELECT * from porudzbina WHERE status=1";
$resultPorudzbine=mysqli_query($connection, $SQLporudzbine);
while ($row=mysqli_fetch_array($resultPorudzbine,MYSQLI_ASSOC)) {
    $status = "";
        echo "
                    <div class=\"panel panel-info\">
                    <div class=\"panel-heading\">Pošiljka na cekanju</div>
                    <div class=\"panel-body\">
                        <table class='table'>
                            <tr><th>Broj porudzbine</th><td>" . $row['broj_posiljke'] . "</td></tr>
                            <tr><th>Iznos posiljke</th><td>" . $row['ukupan_iznos'] . "</td></tr>
                            <tr><th>Vreme porucivanja</th><td>" . $row['datum_porudzbine'] . "</td></tr>
                        </table>
                        <button class='btn btn-success right spremnaP' data-id='".$row['idporudzbina']."'>Spremna</button>

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
        $SQLporudzbine="SELECT * from porudzbina WHERE status=2";
        $resultPorudzbine=mysqli_query($connection, $SQLporudzbine);
        while ($row=mysqli_fetch_array($resultPorudzbine,MYSQLI_ASSOC)) {
            $status = "";
            echo "
                    <div class=\"panel panel-success\">
                    <div class=\"panel-heading\">Spremna porudzbina</div>
                    <div class=\"panel-body\">
                        <table class='table'>
                            <tr><th>Broj porudzbine</th><td>" . $row['broj_posiljke'] . "</td></tr>
                            <tr><th>Iznos posiljke</th><td>" . $row['ukupan_iznos'] . "</td></tr>
                            <tr><th>Vreme porucivanja</th><td>" . $row['datum_porudzbine'] . "</td></tr>
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
    $('.spremnaP').click(function () {
        var id = $(this).data('id')
        $.post('ajax/spremna.php', {
            'id_porudzbine':id
        }, function () {
            location.reload();
        })

    })
</script>
</html>