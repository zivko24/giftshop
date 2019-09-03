<?php 
include('db_config.php');

$category_id = $_POST['category_id'];
$order = $_POST['order'];

$SQL = "SELECT * from product where category_id='$category_id' ORDER BY `name` $order";
$result = mysqli_query($connection, $SQL);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($products as $product) {
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top img-fluid thumb img-thumbnail" style="height:200px;" src="<?=$product["image"]?>" alt="<?=$product["name"]?>"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?=$product["name"]?></a>
                  </h4>
                  <h5><?=$product["price"]?> RSD</h5>
                  <p class="card-text"><?=$product["description"]?></p>
                </div>
                <div class="card-footer text-center">
                    <button data-id="<?=$product["id"]?>" class="btn btn-success addInCart">Add to cart</button>
                </div>
              </div>
        </div>
        <?php
}

?>