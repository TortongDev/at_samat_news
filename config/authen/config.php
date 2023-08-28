<?php

    // อ่านข้อมูลจากไฟล์ .env
    require_once dirname(__DIR__)."/../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    define("PRIVATE_KEY",$_ENV['PRIVATE_KEY']);
    define("IV",$_ENV['IV']);

    echo PRIVATE_KEY;
    
    
?>