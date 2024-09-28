<?php
require_once "../connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $taskId = $_POST['id'];
 $status = $_POST['status'];

 $query = "UPDATE `tasks` SET `is_complete` = '1' WHERE `id` = '$taskId'";
 $result = mysqli_query($con, $query);

if ($result) {
    echo "Хорошо"; // Успешное обновление
} else {
    echo "Плохо"; // Ошибка обновления
}

}
?>