<?php 
include ('../includes/db_config.php');

$product_name = $_POST['name'];
$product_description = $_POST['description'];
$product_price = $_POST['price'];
$product_category_id = $_POST['category_id'];
$suc_upload = false;
$name = "";
//Check if the file is well uploaded
if($_FILES['image']['error'] > 0) { echo 'Error during uploading, try again'; }
	
//We won't use $_FILES['file']['type'] to check the file extension for security purpose

//Set up valid image extensions
$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );

//Extract extention from uploaded file
    //substr return ".jpg"
    //Strrchr return "jpg"
    
$extUpload = strtolower( substr( strrchr($_FILES['image']['name'], '.') ,1) ) ;
//Check if the uploaded file extension is allowed

if (in_array($extUpload, $extsAllowed) ) { 

//Upload the file on the server

$path = "img/{$_FILES['image']['name']}";
$name = "../img/{$_FILES['image']['name']}";
$result = move_uploaded_file($_FILES['image']['tmp_name'], $name);
$suc_upload = $result;
}

$product = mysqli_query($connection, "select name from product where name = '$product_name' ");

$row = mysqli_fetch_array($product, MYSQLI_ASSOC);
if ($row['name']!==$product_name) {
    $SQL = "INSERT INTO `product` (`id`, `name`, `description`, `price`, `category_id`, `image`) 
            VALUES (NULL, '$product_name', '$product_description', '$product_price', '$product_category_id', '$path')";
    $result = mysqli_query($connection, $SQL);
    if ($result && $suc_upload) {
        header('Location: admin_add_product.php?success');
    } else {
        header('Location: admin_add_product.php?error');
    }
}

?>

