<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "6666";
$db['db_name'] = "cms";

// print_r($db);

foreach ($db as $key => $value) {

	define(strtoupper($key), $value);
    //將$key定義為常數的名稱並以大寫呈現，透過呼叫$key來帶入$value

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


 ?>