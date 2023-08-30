<?php
    require_once "../../autoload_class.php";
    $set = new Connection(true);
    
   
    try {
        $set->pdo->beginTransaction();
        
        $set->pdo->commit();
    } catch (PDOException $err) {
        $set->pdo->rollback();
        echo json_encode(array('status'=>'0','message'=> $err->getMessage()));
    }
    $set = null;
    exit;
?>