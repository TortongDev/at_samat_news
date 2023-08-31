<?php
    // require_once "../services/authen/authen.php";
    require_once "../../config/key/config.php";
    require_once "../../config/key/byepass_code.php";
    require_once "../../class/Connection.php";
    $db = new Connection(true);
    $newid = isset($_GET['newid']) ? htmlspecialchars($_GET['newid']) : '';
    $post_list =  $db->pdo->prepare("SELECT * FROM `samat_comment` WHERE ? AND NEW_ID = ? ORDER BY COMMENT_TIMESTAMP DESC");
    $post_list->execute(array("1=1",$newid));
    $arr_json = array();
    while ($r = $post_list->fetch(PDO::FETCH_ASSOC)): 
             
        $arr_json[] = array(
            'ID'    => $r['COMMENT_ID'],
            'TEXT'  => $r['COMMENT_TEXT']
        );
        
    endwhile;
    echo json_encode($arr_json);
?>