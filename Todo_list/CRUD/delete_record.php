<?php 
require_once "../connect.php";
$id = isset($_POST["id"]) ? $_POST["id"] : false;

if ($id) {
    $query = mysqli_query($con, "DELETE FROM `tasks` WHERE `id` = '$id'");
    echo "Успех";
} else {
    echo "не успех";
}
?>