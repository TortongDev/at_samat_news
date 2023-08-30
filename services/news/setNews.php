<?php
    require_once "../../autoload_class.php";
    $set = new Connection(true);
    
    $NEW_TOPIC      = isset($_POST['NEW_TOPIC']) ? $_POST['NEW_TOPIC'] : '';
    $NEW_SUB_TOPIC  = isset($_POST['NEW_SUB_TOPIC']) ? $_POST['NEW_SUB_TOPIC'] : '';
    $NEW_TEXT       = isset($_POST['NEW_TEXT']) ? $_POST['NEW_TEXT'] : '';
    $NEW_TAG        = isset($_POST['NEW_TAG']) ? $_POST['NEW_TAG'] : '';
    $NEW_SIGNATURE  = isset($_POST['NEW_SIGNATURE']) ? $_POST['NEW_SIGNATURE'] : '';
    $AUTHEN_ADMIN_ID = isset($_POST['AUTHEN_ADMIN_ID']) ? $_POST['AUTHEN_ADMIN_ID'] : '';

    $arr_data = array(
        htmlspecialchars($NEW_TOPIC),
        htmlspecialchars($NEW_SUB_TOPIC),
        htmlspecialchars($NEW_TEXT),
        htmlspecialchars($NEW_TAG),
        htmlspecialchars($NEW_SIGNATURE),
        htmlspecialchars($AUTHEN_ADMIN_ID)
    );
    try {
       $insert = $set->pdo->prepare('INSERT INTO `samat_news`(`NEW_TOPIC`, `NEW_SUB_TOPIC`, `NEW_TEXT`, `NEW_TAG`, `NEW_SIGNATURE`,`AUTHEN_ADMIN_ID`) VALUES (?,?,?,?,?,?)');
       $insert->execute($arr_data);
        echo "seccess";
    } catch (PDOException $err) {
        echo json_encode(array('status'=>'0','message'=> $err->getMessage()));
    }
    $set = null;
    exit;
?>