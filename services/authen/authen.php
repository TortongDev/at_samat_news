<?php
session_start();
if(!empty($_SESSION['USER_ID']) && !empty($_SESSION['USERNAME'])){
}else{
    $path_redirect = dirname(dirname($_SERVER['HTTP_REFERER'])).'\webpage\index.php';
    header("Location: $path_redirect");
    exit;
}

?>