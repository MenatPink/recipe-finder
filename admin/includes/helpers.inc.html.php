<?php
function html($text)
{
    echo $out = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function filter($form_field) {  
    return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
    }