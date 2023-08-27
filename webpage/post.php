<?php
    require_once('../autoload_class.php');
    $insert = new Connection(true);

        $username = $_POST['authen_username'];
        $password = $_POST['authen_password'];
        $email =    $_POST['authen_email'];
        $insert->db_insert('INSERT INTO `authen_admin`
        (
            `AUTHEN_USERNAME`, 
            `AUTHEN_PASSWORD`, 
            `AUTHEN_STAUS`, 
            `AUTHEN_TIMESTAMP`, 
            `AUTHEN_EMAIL`, 
            `AUTHEN_MOOBAN`, 
            `AUTHEN_TUMBON`, 
            `AUTHEN_AUMPHOR`, 
            `AUTHEN_JUNGWAT`, 
            `AUTHEN_ADDRESS`, 
            `AUTHEN_ADDRESS_ID`) VALUES (?,?,?,?,?,?,?,?,?,?,?)' , array($username,$password,$email,'S','S','S','S','S','S','S','S'));

?>