<?php
require_once "functions.php";
require_once "data.php";

$main = include_template('add.php', [
    'mains' => $mains,
    'info' => $info,
    'currentLot' => $currentLot,
    'id' => $id,
]);
$layout_content = include_template('layout.php', [
    'title' => 'Добавление лотов',
    'main' => $main,
    'mains' => $mains,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
]);

print($layout_content);
?>
