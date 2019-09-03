<?php

include('admin_session.php');

$categories_sql = "SELECT * from category";
$categories_result = mysqli_query($connection, $categories_sql);

$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

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

        <form id="myForm" method="post" action="add_product.php" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" id="name" name="name" placeholder="Prijatelj šolja">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="description" name="description" placeholder="Idealan poklon za..."></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="category_id" id="category_id">
                    <?php
                    $categories_sql = "SELECT * from category";
                    $categories_result = mysqli_query($connection, $categories_sql);

                    while ($c = mysqli_fetch_array($categories_result, MYSQLI_ASSOC)) {

                        echo "<option value=\"" . $c['id_category'] . "\">" . $c['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" id="price" name="price" placeholder="235din...">
            </div>

            <div class="form-group">
                <input type="file" class="form-control" id="image" name="image" placeholder="Please uplaod an image">
            </div>

            <button class="btn btn-success" type="submit" id="add_product">Add product</button>

        </form>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        <?php
        if (isset($_GET)) {
            if (isset($_GET['success'])) {
                echo "Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Product added',
                        showConfirmButton: false,
                        timer: 1500
                    })";
            } else if (isset($_GET['error'])) {
                echo "Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something happened!'
                    })";
            }
        }
        ?>

    })


    $("#myForm").validate({
        rules: {
            name: {
                required: true,
                rangelength: [4, 32]

            },
            select: "required",
            price: {
                required: true,
                number: true
            },
            description: {
                required: true,
            },
            image: {
                required: true,
            }
        }
    });
</script>

</html>