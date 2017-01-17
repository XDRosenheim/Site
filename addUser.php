<?php

// sessions
if (true) {
    echo '<pre>';
    echo 'Post ';
    var_dump($_POST);
    echo 'Get ';
    var_dump($_GET);
    echo '</pre>';
}

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

$newuser_username = $_POST["newuser_username"];
$newuser_password = $_POST["newuser_password"];
$newuser_confpass = $_POST["newuser_confpass"];
echo '<pre>';
var_dump($newuser_username);
var_dump($newuser_password);
var_dump($newuser_confpass);
echo "Random string " . random_str(32);
echo '</pre>';
?>
