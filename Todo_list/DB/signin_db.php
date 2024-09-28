<?php
session_start();
require_once "../connect.php";

$username = isset($_POST['username']) ? $_POST['username'] : false;
$password = isset($_POST['password']) ? $_POST['password'] : false;

$query = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'");
$user = mysqli_fetch_assoc($query);
$password_hash = $user['password_hash'];
if ($username == $user['username']) {
    if (password_verify($password, $password_hash)) {
        $_SESSION["message"] = "Вы успешно вошли!";
        $_SESSION["id"] = $user['id'];
        $_SESSION["auth"] = true;
        header('Location: ../personal_account.php');
    } else {
        $_SESSION["message"] = "Неправильный пароль!";
        header('Location: ../signin.php');
    }
} else {
    $_SESSION["message"] = "Пользователь не найден!";
    header('Location: ../signin.php');
}
?>
