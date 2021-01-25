<?php
function html($text)
{
    echo $out = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function filter($string){
    return str_replace(str_split('\\/:*?"<>|!&@'), '', $string);
}