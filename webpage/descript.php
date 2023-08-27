<?php
$get = isset($_GET['token']) ? $_GET['token'] : '';
$private_key = "getter";
$signature = hash_hmac('sha256' ,base64_decode($get) ,  $get);
echo $signature;
?>