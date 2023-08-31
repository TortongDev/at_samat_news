<?php
    // echo ;
    // echo ;

    require_once "../../config/db/config.php";
    require_once "../../autoload_class.php";
    $db = new Connection(true);

    $sql = "INSERT INTO `samat_comment`(`COMMENT_TEXT`,  `USER_ID`,  `NEW_ID`) VALUES (?,?,?) ";
    $arr_values = array(
        htmlspecialchars($_POST['message']),
        htmlspecialchars($_POST['userid']),
        htmlspecialchars($_POST['newid'])
    );
    $insert = $db->pdo->prepare($sql);
    try {
        $db->pdo->beginTransaction();
        $insert->execute($arr_values);
        $db->pdo->commit();
        echo json_encode(array('status'=>'0','message'=>'insert success. '));
    } catch (PDOException $err) {
        $db->pdo->rollback();
        echo json_encode(array('status'=>'0','message'=>'insert error : '. $err->getMessage()));
    }
    $db = null;
 ?>