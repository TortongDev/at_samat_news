<?php
// อ่านข้อมูลจากไฟล์ .env
require "../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// ใช้งานค่าจากไฟล์ .env
$dbHost     = $_ENV['HOSTNAME'];
$dbUsername = $_ENV['USERNAME'];
$dbPassword = $_ENV['PASSWORD'];
$apiKey     = $_ENV['DBNAME'];

echo $dbHost;
?>
