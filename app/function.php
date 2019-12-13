<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function modelmessage($messages)
{
    $mes = '';
    foreach ($messages as $message) {
        $mes .= $message . " ";
    }
    return $mes;
}


function dumpc100()
{
    static $a = 1;
    $a++;
    if ($a > 100) {
        dd(func_get_args());
    } else {
        dump(func_get_args());
    }
}