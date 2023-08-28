<?php
// อ่านข้อมูลจากไฟล์ .env
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// ใช้งานค่าจากไฟล์ .env
$dbHost     = $_ENV['DB_HOST'];
$dbUsername = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];
$apiKey     = $_ENV['API_KEY'];

echo $dbHost;
?>
