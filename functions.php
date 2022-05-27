<?php
require_once('data.php');
$is_auth = 0;

$user_name = 'esteticaa'; // укажите здесь ваше имя

/*$mains = [
    [
        'eng' => 'boards',
        'rus' => 'Доски и лыжи',
    ],
    [
        'eng' => 'attachment',
        'rus' => 'Крепления',
    ],
    [
        'eng' => 'boots',
        'rus' => 'Ботинки',
    ],
    [
        'eng' => 'clothing',
        'rus' => 'Одежда',
    ],
    [
        'eng' => 'tools',
        'rus' => 'Инструменты',
    ],
    [
        'eng' => 'other',
        'rus' => 'Разное',
    ],
];*/
/*$info = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'categorie' => 'Доски и лыжи',
        'price' => '10990',
        'url' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'categorie' => 'Доски и лыжи',
        'price' => '159999',
        'url' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'categorie' => 'Крепления',
        'price' => '8000',
        'url' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'categorie' => 'Ботинки',
        'price' => '10999',
        'url' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'categorie' => 'Одежда',
        'price' => '7500',
        'url' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'categorie' => 'Разное',
        'price' => '5400',
        'url' => 'img/lot-6.jpg'
    ],
];
*/
    function sub_format ($number)
    {
        $number = ceil($number);
        if($number<1000)
        {
            $result = $number;
        }
        else
        {
            $result = number_format($number,0,","," ");
        }
        return $result.'<b class="rub">p</b>';
    }

    function timer()
    {
        $now = new DateTime('now');
        $nextdaynight = new DateTime('24:00');
        $interval = $now->diff($nextdaynight);
        if($interval ->format('%i')<10){
            return $interval->format('%h:0%i');
        }
        else {
            return $interval->format('%h:%i');
        }
    }

    function include_template($name, $data)
    {
        $user = $_COOKIE['user'] ?? "";
        $is_auth = isset($_COOKIE['user']);
        $name = 'templates/' . $name;
        $result = '';
        if (!file_exists($name)) {
            return $result;
        }
        $data['is_auth'] = $is_auth;
        $data['user'] = $user;
        ob_start();
        extract($data);
        require($name);
        $result = ob_get_clean();
        return $result;
    }
    function connection(): mysqli
    {
        return new mysqli('127.0.0.1','root','','yeticave');
    }
    function categorie(mysqli $connection): array
    {
        $query = "Select * from categorie order by id_categorie";
        $categorie_result = $connection->query($query);
        return $categorie_result->fetch_all(MYSQLI_ASSOC);
    }
?>
