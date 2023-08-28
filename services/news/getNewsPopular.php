<?php
    require_once "../../autoload_class.php";
    $get = new Connection(true);
    $stmt = $get->db_query("SELECT * FROM `samat_news` WHERE ?  ORDER BY SAMAT_TIMESTAMP DESC Limit 5",array("1=1"));
    echo json_encode($stmt);
?>