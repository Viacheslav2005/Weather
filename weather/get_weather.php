<?php
// Ваш API-ключ
$apiKey = "457880b13ecc6f44c62ac42ce3c39ec3";

// Функция для получения погоды по ID города
function getWeather($cityId) {
    global $apiKey;

    $url = "https://api.openweathermap.org/data/2.5/weather?id={$cityId}&units=metric&appid={$apiKey}&lang=ru";

    $response = file_get_contents($url);

    return $response;
}

// Получаем ID города из запроса
$cityId = $_GET['cityId'];

// Возвращаем данные о погоде
echo getWeather($cityId);
?>
