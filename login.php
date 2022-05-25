<?php
require_once('functions.php');
require_once('data.php');

session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form = $_POST;
        print_r($form);
        $required = ['email', 'password'];
        $errors = [];
        /*foreach ($required as $field) {
            if (empty($form[$field])) {
                /*$errors[$field] = 'Это поле надо заполнить';*/
                /*print('ERROR');*/
/*            }
        }*/
        foreach ($users as $user)
        {
            if ($user['email'] == $form['email'])
            {
                $email_true = 1;
                $user = $user['email'];
            }
            else
            {
                $email_true = 0;
            }

        }
        if($email_true){
            $_SESSION['user'] = $user;
            foreach ($users as $user)
            {
                if ($user['password'] == $form['password'])
                {
                    $password_true = 1;
                }
                else
                {
                    $password_true = 0;
                }

            }
        }
        print ($email_true);
        print ($password_true);
    }

    $main = include_template('login.php', ['username' => $_SESSION['user']['name']]);

    $layout_content = include_template('layout.php', [
        'title' => 'Главная страница',
        'main' => $main,
        'mains' => $mains,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
    ]);

print($layout_content);
