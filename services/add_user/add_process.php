<?php
    require_once "../../autoload_class.php";    
    header('Access-Control-Allow-Origin: div22clsss.xyz'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
   
    $db = new Connection( true );
    
    var_dump($_GET['username']);
    
    
    
    $db = null;
    exit;
?>