<?php
    // require_once "../services/authen/authen.php";
    require_once "../../config/key/config.php";
    require_once "../../config/key/byepass_code.php";
    require_once "../../class/Connection.php";
    
        $newID          = isset($_GET['newID']) ? $_GET['newID'] : '';
        $ID_Decrypt     = decrypt_code(base64_decode($newID),PRIVATE_KEY,IV);
        $db = new Connection(true);
        $new = $db->pdo->prepare("SELECT * FROM `samat_news` WHERE ? AND NEW_ID = ?");
        $new->execute(array("1=1", $ID_Decrypt ));
    $arr_json = array();
    while ($r = $new->fetchALL(PDO::FETCH_ASSOC)): 
             
        $arr_json[] = array(
            'res' => $r
        );
        
    endwhile;
    echo json_encode($arr_json);
?>