<?php
    //include "BL/useri.php";
    spl_autoload_register(function ($class_name) {
        include 'C:\xampp\htdocs\SyncLab_AR_Prototip\webcontent\BL/'.$class_name . '.php';
    });

    session_start();

    $loginBtn = filter_input(INPUT_POST, 'login-button');
    echo "ccccccccccccc";
    if(isset($loginBtn))
    {
        echo "bbbbbbbb";
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $loginResult = useri::loginUser($username, $password);

        if($loginResult['login'])
        {
            echo "aaaaaa";
            //ja lshon sesionin edhe ja ndron pagin!!!
            session_start();
            $_SESSION['ID'] = $loginResult['user']['id'];
            $_SESSION['name'] = $loginResult['user']['emri'];
            header("Location: logged-in.php");
        }
        else
        {
            //alert
            echo "keq";
        }
    }
?>