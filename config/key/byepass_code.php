<?php
// require_once "../key/config.php";
// $encryptionKey = 'your_encryption_key'; // Should be a secure random string
// $iv = "asdfghjkmnbvcx1z";
// $plainText = 'Sensitive data to be encrypted';
function encrypt_code($plainText , $encryptionKey , $iv)
{
    $encryptedData = openssl_encrypt($plainText, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return $encryptedData;
}

function decrypt_code($encryptedData , $encryptionKey , $iv)
{
    $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return $decryptedData;
}
// echo encrypt_code($plainText,$encryptionKey,$iv);
// echo decrypt_code("lh+yMubDzUbFhvz2Z1yBTQ==" , PRIVATE_KEY , IV);
?>