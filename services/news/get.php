
<meta charset="utf-8">
<?php

$s1 = hash_hmac('sha256','1233f','1212121',true);
$s1 = base64_encode($s1);
echo $s1; //KH7TGLVG+k8TToayZULu9XlXwagpEnY+ZmGTaPAP6oE=
echo "<br>";

$s2 = hash_hmac('sha256','KH7TGLVG+k8TToayZULu9XlXwagpEnY+ZmGTaPAP6oE=','1212121',true);
$s2 = base64_decode($s2);
echo $s2; //����
echo "<br>";



?>