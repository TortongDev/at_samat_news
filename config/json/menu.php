<?php
$HTTP_REFERER = 'localhost';
if(@$_SERVER['SERVER_NAME'] === $HTTP_REFERER){
    http_response_code(200);
}else{
    exit;
}
$menu = array (
    array(
        "menu"         => "หน้าแรก",
        "url_redirect" => "index.php"
    ),
    array(
        "menu"         =>"ข่าวสารอาจสามารถ",
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