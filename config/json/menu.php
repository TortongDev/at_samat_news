<?php
;
$HTTP_REFERER = 'http://localhost/atsamat/at_samat_news/webpage/';
if(@$_SERVER['HTTP_REFERER'] != $HTTP_REFERER){
    http_response_code(400);
    exit;
}else{
    http_response_code(200);
}
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
function menuOption($menu){
    return json_encode($menu);
}
echo menuOption($menu);


?>