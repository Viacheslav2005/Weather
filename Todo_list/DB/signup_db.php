<?php 
session_start();
require_once "../connect.php";

$username = isset($_POST['username']) ? $_POST['username'] : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;
$query = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'");
$query_all = mysqli_fetch_assoc($query);

if($username && $password) {
    if(mysqli_num_rows($query) == 0) {
        $_SESSION["message"] = "Вы успешно зарегистрировались!";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query_add = mysqli_query($con, "INSERT INTO `users`(`username`, `password_hash`) VALUES ('$username','$hashedPassword')");
        header("Location: ../signin.php");
    } else {
        $_SESSION["message"] = "Данный никнейм занят!";
        header("Location: ../index.php");
    }
} else {
    $_SESSION["message"] = "Заполните все поля!";
    header("Location: ../index.php");
}
?>