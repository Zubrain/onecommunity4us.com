<?php

$db['db_host']= "localhost";
$db['db_user']= "onecommunity4us_zubby";
$db['db_pass']= "Sureboy20...";
$db['db_name']= "onecommunity4us_onecommunity4us";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if( !$connection){
    echo "we are not connected";
}
?>