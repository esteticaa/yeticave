<?php
require_once('functions.php');
require_once ('data.php');

$err = [];
$message = [];
$flag = 0;
$form = '';
$pattern = '/\A[А-Яа-яЁё]/';
$pattern1 = '/^[ 0-9]+$/';
$pattern2 = '/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i';

$connection = new mysqli('127.0.0.1', 'root', '', 'yeticave');


if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $image = $_FILES['image']['name'];

    if(empty($name))
    {
        $err['name'] = 'form__item--invalid';
        $message['name'] = '<span class="form__error">Введите Имя пользователя.</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern,$name))
        {
            $err['name'] = 'form__item--invalid';
            $message['name'] = '<span class="form__error">Имя пользователя может содержать только кириллицу.</span>';
            $flag = 1;
        }
    }
    if(empty($contact))
    {
        $err['contact'] = 'form__item--invalid';
        $message['contact'] = '<span class="form__error">Введите номер Вашего телефона.</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern1,$contact))
        {
            $err['contact'] = 'form__item--invalid';
            $message['contact'] = '<span class="form__error">Номер телефона может содержать только цифры.</span>';
            $flag = 1;
        }
    }
    if(empty($email))
    {
        $err['email'] = 'form__item--invalid';
        $message['email'] = '<span class="form__error">Введите e-mail</span>';
        $flag = 1;
    }
    else
    {
        if(!preg_match($pattern2,$email))
        {
            $err['email'] = 'form__item--invalid';
            $message['email'] = '<span class="form__error">Некорректно введен адрес электронной почты.</span>';
            $flag = 1;
        }
    }
    if(empty($pass))
    {
        $err['password'] = 'form__item--invalid';
        $message['password'] = '<span class="form__error">Введите пароль.</span>';
        $flag = 1;
    }
    if(empty($image))
    {
        $err['image'] = 'form__item--invalid';
        $message['image'] = '<span class="form__error">Добавьте фото профиля.</span>';
        $flag = 1;
    }
    else
    {
        if(!empty($form))
        {
            $err['image'] = 'form__item--invalid';
            $message['image'] = '<span class="form__error">Ошибка загрузки.</span>';
            $flag = 1;
        }
        else
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
        }
    }
    if(!empty($err))
    {
        $form = 'form--invalid';
        $message['form'] = '<span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>';
        $flag = 1;
    }
    if(!empty($name)&&!empty($contact)&&!empty($email)&&!empty($pass)&&!empty($image))
    {
        $result = $connection->query("SELECT email, contact FROM user WHERE email = '$email' OR contact = '$contact'");

        if (mysqli_num_rows($result) > 0)
        {
            $form = 'form--invalid';
            $message['form'] = '<span class="form__error form__error--bottom">Профиль с такими данными уже существует.</span>';
            $flag = 1;

            $data_main = ['mains' => $mains,'err' => $err, 'message' => $message, 'form' => $form,'user' => $user];

            $main = include_template('signup.php', $data_main);
            $layout_content = include_template('layout.php', [
                'main' => $main,
                'mains' => $mains,
                'arrayusers' =>$arrayusers,
                'title' => 'Регистрация',
                'user' => $user
            ]);

            print($layout_content);
        }
        else
        {
            $query = "INSERT INTO user (id_user,name,email,password,image,contact,date_regisrtatoin) VALUES (NULL,'$name','$email','$pass','$image','$contact',now())";

            $query_result = $connection->query($query);

            $connection->close();

            header('Location: login.php');
        }
    }
    $data_main = ['mains' => $mains,'err' => $err, 'message' => $message, 'form' => $form,'user' => $user];

    $main = include_template('signup.php', $data_main);
    $layout_content = include_template('layout.php', [
        'main' => $main,
        'mains' => $mains,
        'arrayusers' =>$arrayusers,
        'title' => 'Регистрация',
        'user' => $user
    ]);

    print($layout_content);
}
else
{
    $data_main = ['mains' => $mains,'err' => $err, 'message' => $message, 'form' => $form,'user' => $user];

    $main = include_template('signup.php', $data_main);
    $layout_content = include_template('layout.php', [
        'main' => $main,
        'mains' => $mains,
        'arrayusers' =>$arrayusers,
        'title' => 'Регистрация',
        'user' => $user
    ]);

    print($layout_content);
}
?>
