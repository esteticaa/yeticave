<?php
    require_once('functions.php');
    $connection = connection();
    $mains = categorie($connection);
    $main = include_template('index.php', [
        'mains' => $mains,
        'info' => $info,
        ]);
    $layout_content = include_template('layout.php', [
        'title' => 'Главная страница',
        'main' => $main,
        'mains' => $mains,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
    ]);
    print($layout_content);



?>

