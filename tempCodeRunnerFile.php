<?php

$path = __DIR__ ."/skillhub/public/uploads/skills";
$ext = "png";
$st = 1;
$end = 40;

for ($i = $st+1 ; $i<=$end ; $i++){
    copy("$path/1.$ext","$path/$i.$ext");

}