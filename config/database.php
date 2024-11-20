<?php
// Настройка параметров подключения к базе данных MySQL.

// Указываем параметры подключения.
$host = 'localhost'; // Хост, где находится база данных (обычно localhost для локальных серверов).
$db = 'db_name'; // Название базы данных.
$user = 'root'; // Имя пользователя для подключения к базе данных.
$pass = ''; // Пароль пользователя (для локальной разработки часто оставляется пустым).
$charset = 'utf8mb4'; // Кодировка, поддерживающая все символы Unicode, включая эмодзи.

// Формируем строку DSN (Data Source Name) для подключения через PDO.
$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // Строка подключения, указывающая хост, имя базы данных и кодировку.

// Опции для подключения через PDO.
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Включаем режим выброса исключений при ошибках.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Устанавливаем ассоциативный режим выборки данных (ключи как названия столбцов).
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Отключаем эмуляцию подготовленных запросов (для повышения безопасности).
];

try {
    // Попытка создать объект PDO с указанными параметрами и опциями.
    $pdo = new PDO($dsn, $user, $pass, $options); // Создаем подключение.
} catch (\PDOException $e) {
    // Если возникает ошибка при подключении, выбрасываем исключение с сообщением об ошибке.
    throw new \PDOException($e->getMessage(), (int)$e->getCode()); // Обрабатываем ошибку, передавая сообщение и код ошибки.
}
