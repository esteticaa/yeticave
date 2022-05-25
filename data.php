<?php
    $link = new mysqli('127.0.0.1','root','','yeticave');
    mysqli_set_charset($link, utf8);

    $sql = 'SELECT * FROM categorie';
    $result = mysqli_query($link, $sql);

    $mains = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $sql_1 = 'SELECT lot_name,id_lot, categorie.name, description, image, start_cost FROM lot INNER JOIN categorie on lot.id_categorie = categorie.id_categorie';
    $result_1 = mysqli_query($link, $sql_1);

    $info = mysqli_fetch_all($result_1, MYSQLI_ASSOC);
    $users = [
        [
            'email' => 'ignat.v@gmail.com',
            'password' => 'ug0GdVMi',
        ],
        [
            'email' => 'kitty_93@li.ru',
            'password' => 'daecNazD',
        ],
        [
            'email' => 'warrior07@mail.ru',
            'password' => 'oixb3aL8',
        ],
        [
            'email' => 'burik02@bk.ru',
            'password' => 'qwerty',
        ],
    ];

