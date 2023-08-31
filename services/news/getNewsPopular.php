<?php
    require_once "../../autoload_class.php";
    $get = new Connection(true);
    if( @$_SERVER['SERVER_NAME'] === 'localhost'  ||  @$_SERVER['SERVER_NAME'] === 'localhost'):
    else:
        http_response_code(402);
        exit;
    endif;
    $stmt = $get->db_query("SELECT * FROM `samat_news` WHERE ?  ORDER BY SAMAT_TIMESTAMP DESC Limit 5",array("1=1"));
    echo json_encode($stmt);

?>