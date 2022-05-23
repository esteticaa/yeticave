<?php
require_once "functions.php";
require_once('data.php');


$id = 0;
$id = $_GET["id_lot"];
$error = 'ОШИБКА';

if(isset($_GET["id_lot"])){
    $id = $_GET["id_lot"];
    foreach ($info as $q)
    {
        if($q['id_lot']==$id){
            $currentLot=$q;
        }
    }
    if(empty($currentLot)) {
        $main = include_template('404.php', [
        ]);
        $layout_content = include_template('layout.php', [
            'title' => 'Главная страница',
            'main' => $main,
            'mains' => $mains,
            'is_auth' => $is_auth,
            'user_name' => $user_name,
        ]);

        print($layout_content);
    }
    else{
$main = include_template('lot.php', [
            'mains' => $mains,
            'info' => $info,
            'currentLot' => $currentLot,
            'id' => $id,
        ]);
        $layout_content = include_template('layout.php', [
            'title' => 'Главная страница',
            'main' => $main,
            'mains' => $mains,
            'is_auth' => $is_auth,
            'user_name' => $user_name,
        ]);

        print($layout_content);
    }
}


?>
