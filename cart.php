<?php
session_start();
include('includes/db_config.php');

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

                <!-- /.col-lg-3 -->

                <div class="col-lg-12">
                    <table class="table table-success text-center">
                        <tr>
                            <th>Item name</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Option</th>
                        </tr>
                        <?php
                        foreach ($_SESSION['cart'] as $index => $cart_item) {
                            ?>
                            <tr data-id="<?= $index ?>">
                                <td> <?= $cart_item['item_name'] ?> </td>
                                <td>
                                    <input data-id="<?= $index ?>" data-price="<?= $cart_item['item_price'] ?>" type="number" class="form-control quantity_number" value="<?= $cart_item['quantity'] ?>">
                                </td>
                                <td data-id="<?= $index ?>"> <?= $cart_item['item_price'] * $cart_item['quantity'] ?> </td>
                                <td> <button data-id="<?= $index ?>" class="btn btn-danger delete_cart_item">Delete item</td>
                            </tr>

                        <?php
                        }
                        ?>

                        <tr>
                            <td colspan="2"> <button id="checkout" class="btn btn-success"> Checkout </button> </td>
                            <td colspan="2"> <button id="reset_cart" class="btn btn-danger"> Remove everything </button> </td>
                        </tr>
                    </table>

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

            $(".delete_cart_item").on("click", function(e) {
                var id = $(this).data("id");
                $.post('includes/delete_cart_item.php', {
                    "product_id": id
                }, function() {
                    var tr = $("tr[data-id='" + id + "']");
                    tr.remove();
                });
            });

            $(".quantity_number").on("change", function(e) {
                var id = $(this).data("id");
                var price = $(this).data("price");
                var quantity = $(this).val();
                $.post('includes/update_cart_item.php', {
                    "product_id": id,
                    "quantity": quantity
                }, function() {
                    var td = $("td[data-id='" + id + "']")[0];
                    td.innerHTML = price * quantity;
                });
            });

            $("#reset_cart").on("click", function(e) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    $.post('includes/reset_cart.php');

                    if (result.value) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        location.reload();

                    }
                })
            });

            $("#checkout").on("click", function(e) {
                Swal.fire({
                    title: 'Checkout?',
                    text: "Do you wana order your gifts?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, finish my order!'
                }).then((result) => {
                    $.post('includes/checkout.php', {}, function(result) {
                        if (result === "success") {

                            Swal.fire(
                                'Ordered!',
                                'Your gifts has been ordered',
                                'success'
                            )
                        } else if (result === "user_error") {
                            Swal.fire({
                                type: 'error',
                                title: 'Error...',
                                text: 'You need to Log In first!'
                            });
                            window.setTimeout(function() {
                                window.location = "http://localhost/giftshop/login.php";
                            }, 1500);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Error!'
                            })
                        }
                    });


                })
            });








        })
    </script>

</body>

</html>