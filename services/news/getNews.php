<?php
    require_once "../../autoload_class.php";
    header("Content-type: application/json; charset=utf-8");
    $get = new Connection(true);
    $stmt = $get->pdo->prepare("SELECT * FROM `samat_news` WHERE ?");
    $stmt->execute(array("1=1"));
    
    $secret_key = "getter";
    $arrJsonData = array();

    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $encrypted =  base64_encode(hash_hmac('sha256',$r['NEW_ID'], $secret_key, true));
        $arrJsonData[] = array(
            'NEW_ID'            => $r['NEW_ID'],
            'NEW_ID_ENCYPT'     => $encrypted,
            'NEW_TOPIC'         => $r['NEW_TOPIC'],
            'NEW_SUB_TOPIC'     => $r['NEW_SUB_TOPIC'],
            'NEW_TEXT'          => $r['NEW_TEXT'],
            'NEW_TAG'           => $r['NEW_TAG'],
            'NEW_LIKE'          => $r['NEW_LIKE'],
            'SAMAT_TIMESTAMP'   => $r['SAMAT_TIMESTAMP'],
            'AUTHEN_ADMIN_ID'   => $r['AUTHEN_ADMIN_ID']
        );
    }
    echo json_encode($arrJsonData);


?>