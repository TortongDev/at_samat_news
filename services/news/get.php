<?php

$key = '1212121';
$data = "tokenapi1";
$iv = 'asdfgh1234567890';
$tag = null;
$ssl = openssl_encrypt($data,'aes-128-gcm',$key,OPENSSL_RAW_DATA, $iv,$tag);
$ssl = base64_encode($ssl);
echo $ssl;
$ssl1 = openssl_decrypt(base64_decode($ssl),'aes-128-gcm',$key,OPENSSL_RAW_DATA, $iv,$tag);
echo $ssl1;
?>