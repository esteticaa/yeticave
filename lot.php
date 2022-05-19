<?php
require_once "functions.php";
require_once "data.php";


$id = 0;
if(isset($_GET["id_lot"])){
    $id = $_GET["id_lot"];
    foreach ($info as $q)
    {
        if($q['id_lot']==$id){
            $currentLot=$q;
        }
    }
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


?>
