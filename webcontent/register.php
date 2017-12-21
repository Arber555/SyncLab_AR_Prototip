<?php
    //include "BL/useri.php";
    spl_autoload_register(function ($class_name) {
        include 'C:\xampp\htdocs\SyncLab_AR_Prototip\webcontent\BL/'.$class_name . '.php';
    });

    session_start();

    $registerBtn = filter_input(INPUT_POST, 'register-button');
    echo "ccccccccccccc";
    if(isset($registerBtn))
    {
        echo "bbbbbbbb";
        $name = filter_input(INPUT_POST, 'name');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $user = new useri($name, $username, $password, $email, $lastname);
        $insert = $user->insert($user);

        if($insert)
        {
            $_SESSION['name'] = $name;
            header("Location: logged-in.php");
        }
        else
        {
            //alert
            echo "Error";
        }
    }
?>