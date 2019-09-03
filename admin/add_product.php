<?php 
include ('../includes/db_config.php');

$product_name = $_POST['name'];
$product_description = $_POST['description'];
$product_price = $_POST['price'];
$product_category_id = $_POST['category_id'];
$file = $_POST['image'];


//Check if the file is well uploaded
if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
	
//We won't use $_FILES['file']['type'] to check the file extension for security purpose

//Set up valid image extensions
$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );

//Extract extention from uploaded file
    //substr return ".jpg"
    //Strrchr return "jpg"
    
$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
//Check if the uploaded file extension is allowed

if (in_array($extUpload, $extsAllowed) ) { 

//Upload the file on the server

$name = "img/{$_FILES['file']['name']}";
$result = move_uploaded_file($_FILES['file']['tmp_name'], $name);

if($result){echo "<img src='$name'/>";}
    
} else { echo 'File is not valid. Please try again'; }




$product = mysqli_query($connection, "select name from product where name = '$product_name' ");

$row = mysqli_fetch_array($product, MYSQLI_ASSOC);
if ($row['name']!==$product_name){
    $SQL = "INSERT INTO `product` (`id`, `name`, `description`, `price`, `category_id`) 
            VALUES (NULL, '$product_name', '$product_description', '$product_price', '$product_category_id')";
    $result = mysqli_query($connection, $SQL);
    if ($result) {
        echo "true";
    } else {
        echo "false";
    }
}

?>

