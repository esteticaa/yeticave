<?php
require_once "functions.php";
require_once "data.php";

if(empty($user))
{
    $main = include_template("403.php", array());

    $layout_content = include_template('layout.php', [
        'main' => $main,
        'mains'=>$mains,
        'arrayusers' =>$arrayusers,
        'title' => 'Добавление лота',
        'user_name' => $user
    ]);
    print($layout_content);
}
else
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $e = false;
        $error = array();

        if($_FILES['image']['name']==""||!exif_imagetype($_FILES['image']['tmp_name']))
        {
            $e = true;
            $error['image']=1;
        }
        else
        {
            $error['image'] = 0;
        }
        foreach ($_POST as $index=>$item){
            if($item==""||$item=="Выберите категорию"||(($index=='start_cost'||$index=='shag_sravka')&&preg_match('/^\d+$/',$item)===0))
            {
                $e = true;
                $error[$index]=1;
            }
            else{
                $error[$index]=0;
            }
        }
        if($e)
        {
            $connection = connection();
            $categorie = categorie($connection);
            $main = include_template('add.php', ['mains' => $categorie,'error'=>$error,'fatal'=>true,'data'=>$_POST]);
            print_r(
                include_template(
                    "layout.php",
                    ['mains' => $categorie,
                        "is_auth" => $is_auth,
                        "user_name" => $user_name,
                        "main" => $main,
                        "title" => "Добавление лота"]
                )
            );
        }
        else
        {
            $name = $_FILES['image']['name'];
            $to ="img/$name";
            $categorie = $_POST['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$to);
            $connection = connection();
            $query = "Insert into lot
    (
     id_lot,
     id_categorie,
     id_user,
     id_winner,
     data_creation,
     lot_name,
     description,
     image,
     start_cost,
     data_stop,
     shag_sravka
     )
values
    (
     null,
     (SELECT id_categorie from categorie where categorie.name='$categorie'),
     (SELECT id_user from  user where name='$user_name'),
     NULL,
     now(),
     '".$_POST['lot_name']."',
     '".$_POST['description']."',
     '".$to."',
     ".$_POST['start_cost'].",
     '".$_POST['data_stop']."',
     '".$_POST['shag_sravka']."'
    );select id_lot from lot where lot_name='".$_POST['lot_name']."';";
            $connection->multi_query($query);
            $connection->next_result();
            $result = $connection->store_result();
            $ID = $result->fetch_row()[0];
            print_r($ID);
            header("location:lot.php?id_lot=$ID");
        }
    }
    else {
        $connection = connection();
        $categorie = categorie($connection);
        $main = include_template('add.php', ['mains' => $categorie,'error'=>null,'fatal'=>false]);
        print_r(
            include_template(
                "layout.php",
                ['mains' => $categorie,
                    "is_auth" => $is_auth,
                    "user_name" => $user_name,
                    "main" => $main,
                    "title" => "Добавление лота"]
            )
        );
    }
}
