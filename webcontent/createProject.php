<?php
    spl_autoload_register(function ($class_name) {
        include 'C:\xampp\htdocs\SyncLab_AR_Prototip\webcontent\BL/'.$class_name . '.php';
    });

    session_start();

    $BtnC = filter_input(INPUT_POST, 'btcCreate');
    
    if(isset($BtnC))
    {
        $emri = filter_input(INPUT_POST, 'projectname');
        $img = filter_input(INPUT_POST, 'img');

        $projectResult = projektet::makeProject($emri, $img, $_SESSION['ID']);
        Temp::insertNew();

        if($projectResult)
        {
            echo "u bo";
            header("Location: AR_Drag_and_Drop.php"); 
        }
        else
        {
            echo "ERROR!!!";
        }
    }
?>