<?php

    // อ่านข้อมูลจากไฟล์ .env
    require_once dirname(__DIR__)."/../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    define("HOSTNAME",$_ENV['HOSTNAME']);
    define("USERNAME",$_ENV['USERNAME']);
    define("PASSWORD",$_ENV['PASSWORD']);
    define("DBNAME"  ,$_ENV['DBNAME']);
    define("DB_TYPE" ,"MYSQL");

    
    
?>