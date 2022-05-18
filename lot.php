<?php
require_once "functions.php";
require_once "data.php";


$id = 0;
if(isset($_GET["id_lot"])){
    $id = $_GET["id_lot"];
    $sql3 = 'SELECT * FROM lot WHERE id_lot ='.$id;
    $result3 = mysqli_query($link,$sql3);
    $lot_site = mysqli_fetch_all($result3,MYSQLI_ASSOC);
    $page_content = include_template('lot.php', ['array' => $array, 'categorie_info'=>$categorie_info , 'lot'=>$lot_site, 'id' => $id ]);
    $layout_content = include_template('layout.php', [
        'main' => $page_content,
        'array' => $array,
        'title' => 'Лот'
    ]);

        print($layout_content);
}


?>
