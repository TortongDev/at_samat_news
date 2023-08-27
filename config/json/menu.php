<?php

$menu = array (
    array(
        "menu"         => "หน้าแรก",
        "url_redirect" => "index.php"
    ),
    array(
        "menu"         =>"ข่าวสารอาจสามารถ"   ,
        "url_redirect" => "index1.php"
    ),
    array(
        "menu"      => "โพสต์คำถาม",
        "url_redirect"  => "index4.php"
    ),
    array(
        "menu"        => "เกี่ยวกับเรา",
        "url_redirect" => "index2.php"
    ),
    array(
        "menu"      => "สถานที่เที่ยว",
        "url_redirect" => "index3.php"
    ),
    

);
echo json_encode($menu);
?>