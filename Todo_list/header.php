<?php
session_start();
if(isset($_SESSION["message"])) {
  $mes = $_SESSION["message"];
  echo "<script>alert('$mes')</script>";
  unset($_SESSION["message"]);
}
require_once "connect.php";
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : false;

$query = mysqli_query($con, "SELECT `username` FROM `users` WHERE `id` = '$id'");
if(mysqli_num_rows($query) > 0) {
  $username = mysqli_fetch_all($query)[0][0];
}
?>
<ul class="nav">
  <?php if(isset($_SESSION["auth"])) { ?>
    <li class="nav-item">
        <a class="nav-link" href="personal_account.php"><?=$username?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Выход</a>
    </li>
  <?php } else { ?>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Авторизация</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signin.php">Регистрация</a>
    </li>
  <?php } ?>
</ul>