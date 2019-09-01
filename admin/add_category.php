<?php 
include ('../includes/db_config.php');
$category_name = $_POST['category_name'];

$category_sql = mysqli_query($connection,"select category_name from category where category_name = '$category_name' ");

$row = mysqli_fetch_array($category_sql, MYSQLI_ASSOC);
if ($row['category_name']!==$category_name){
    $SQL = "INSERT INTO `category` (`id_category`, `category_name`) VALUES (NULL, '$category_name')";
    $result = mysqli_query($connection, $SQL);
    if ($result) {
        echo "true";
    } else {
        echo "false";
    }
}

?>