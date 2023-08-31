<?php
    require_once "../../autoload_class.php";
    require_once "../../config/key/config.php";
    require_once "../../config/key/byepass_code.php";

    

    if(
        @$_SERVER['HTTP_REFERER'] === 'http://localhost/atsamat/at_samat_news/webpage/index.php' 
        || 
        @$_SERVER['HTTP_REFERER'] === 'http://localhost/atsamat/at_samat_news/webpage/' ):
    else:
        http_response_code(404);
        exit;
    endif;
    header("Content-type: application/json; charset=utf-8");
    $get = new Connection(true);
    $setpage = isset($_GET['pages']) ? $_GET['pages'] : '0';
   

    $stmtCount = $get->pdo->query("SELECT * FROM `samat_news` ");
    $count = $stmtCount->rowCount();
    $pageNumber =  ceil( $count  /5 );
    if($setpage == '1'){
        $page = 0;
    }else{
        $page = ($setpage*$pageNumber)+1;
    }
    if($setpage < 1 ):
        $stmt = $get->pdo->prepare("SELECT * FROM `samat_news` WHERE ? ORDER BY SAMAT_TIMESTAMP DESC LIMIT 5 offset 0");
        $stmt->execute(array("1=1"));
    else:
        $stmt = $get->pdo->prepare("SELECT * FROM `samat_news` WHERE ? ORDER BY SAMAT_TIMESTAMP DESC LIMIT 5 offset {$page} ");
        $stmt->execute(array("1=1"));
    endif;
    $arrJsonData = array();
    $tag = "";
    $encrypted = "";
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // encrypt_code();
        $arrJsonData[] = array( 
            'NEW_ID'            => $r['NEW_ID'],
            'NEW_ID_ENCYPT'     => base64_encode(encrypt_code($r['NEW_ID'],PRIVATE_KEY,IV)),
            'NEW_TOPIC'         => $r['NEW_TOPIC'],
            'NEW_SUB_TOPIC'     => $r['NEW_SUB_TOPIC'],
            'NEW_TEXT'          => $r['NEW_TEXT'],
            'NEW_TAG'           => $r['NEW_TAG'],
            'NEW_LIKE'          => $r['NEW_LIKE'],
            'SAMAT_TIMESTAMP'   => $r['SAMAT_TIMESTAMP'],
            'AUTHEN_ADMIN_ID'   => $r['AUTHEN_ADMIN_ID'],
            'NEW_PROFILE'       => $r['NEW_PROFILE']
        );
    }
    // $inputShell = date('y/m/d').' => request news api.';
    // $shell = exc_shell("echo $inputShell >> requestAPINews.txt");
    echo json_encode($arrJsonData);


?>