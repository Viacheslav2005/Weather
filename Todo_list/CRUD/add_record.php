<?php 
session_start();
require_once "../connect.php";
$title = isset($_POST['title']) ? $_POST['title'] : false;
$description = isset($_POST['description']) ? $_POST['description'] : false;
$id = isset($_POST['id']) ? $_POST['id'] : false;
if($title && $description && $id) {
    $query = mysqli_query($con, "INSERT INTO `tasks`(`user_id`, `title`, `description`) VALUES ($id, '$title', '$description')");
    $_SESSION["message"] = "Задание добавленно";
    header("Location: ../personal_account.php");
} else {
    $_SESSION["message"] = "Заполните все поля";
    header("Location: ../personal_account.php");
}
?>