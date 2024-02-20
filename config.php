<?php
$config = [
   'mysql' => [
    'host' => 'localhost',
    'port' => '3306',
    'username' => 'root',
    'password' => '',
    'database' => 'week8',
   ]
   ];

   foreach  ($config as $key => $value){
      $GLOBALS[$key] = $value;
   }