<?php
function html($text)
{
    echo $out = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function filter($string){
    return str_replace(str_split('\\/:*?"<>|!&@'), '', $string);
}

function testInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}