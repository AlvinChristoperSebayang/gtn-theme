<?php

function dd($value){
    echo '<pre>';
    echo print_r($value);
    echo '</pre>';
    exit;
    return;
}

function pp($value){
    echo '<pre>';
    echo print_r($value);
    echo '</pre>';
    return;
}

function insertArrayAtPosition($array, $insert, $position)
{
    return array_slice($array, 0, $position, true) + $insert + array_slice($array, $position, null, true);
}
