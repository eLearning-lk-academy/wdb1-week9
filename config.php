<?php

$config = [
    'db_host' => 'localhost',
    'db_port' => '3309',
    'db_name' => 'posts',
    'db_username' => 'root',
    'db_password' => 'root',
    'site_url' => 'http://localhost:8075'
];

foreach($config as $key => $value){
    $GLOBALS[$key] = $value;
}