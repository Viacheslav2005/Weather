<?php 
session_start();
require_once "../connect.php";
// $id = isset($_POST["task_id"]) ? $_POST["task_id"] : false;
$id = isset($_POST["id"]) ? $_POST["id"] : false;

$title = isset($_POST["title"]) ? $_POST["title"] : false;

if($id && $title) { 
    $query = mysqli_query($con, "UPDATE `tasks` SET `title`= '$title' WHERE `id` = '$id'");
}
?>