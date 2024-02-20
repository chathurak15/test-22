<?php 

function pd($d){
    echo '<pre>';
    print_r($d);
    echo '</pre>';
    die;
}
function dd($d){
    echo '<pre>';
    var_dump($d);
    echo '</pre>';
    die;
}
function p($d){
    echo '<pre>';
    print_r($d);
    echo '</pre>';
}
function d($d){
    echo '<pre>';
    var_dump($d);
    echo '</pre>';
}
function hr(){
    echo '<hr>';
}