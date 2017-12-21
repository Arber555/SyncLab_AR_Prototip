<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncLab</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

    <header style="background-color: rgb(247,247,247); z-index: 1; position: relative;">
        <div id="wrapper">
            <div id="logo">
                <div class="main-logo">
                    <img src="images/logo.png" alt="Logo">
                </div>
            </div>
            <div id="account">
                <h1 id="loggedin-user"></h1>
            </div>
        </div>
    </header>

    <div id="left-container">
        <div class="left-content">
            <h1>3D Model</h1>

            <input type="text" id="model-search" placeholder="Search on models">
            <input type="checkbox" class="read-more-state" id="post-1" />
            <label for="post-1" class="read-more-trigger">
                <div id="addmodel">
                    <img id="addmodel" src="images/Add.svg" alt="">
                    <p>3D Model</p>
                </div>
            </label>
            <div class="read-more-wrap">
                <span class="read-more-target">
                    <div class="first-models">
                      <ul>
                          <li>3D Model 1</li>
                          <li>3D Model 2</li>
                          <li>3D Model 3</li>
                          <li>3D Model 4</li>
                      </ul>
                    </div>
                    
                </span>
            </div>
            <!--
            <div id="model-wrapper">
                <div id="models">
                    <input type="checkbox" class="read-more-state" id="post-1" />
                    <label for="post-1" class="read-more-trigger">
                        <span class="addmodel">
                            <img id="addmodel" src="images/Add.svg" alt="">
                            <p>3D Model</p>
                        </span>
                    </label>
                    <div class="read-more-wrap">
                        <span class="read-more-target">
                          
                           
                        </span>
                    </div>
                </div>
            </div>
        -->
        </div>
        <div class="left-content">
            <input type="checkbox" class="read-more-state" id="post-2" />
            <label for="post-2" class="read-more-trigger">
                <div id="basic-model">
                    <img id="basic-model" src="images/Add.svg" alt="">
                    <p>Basic Model</p>
                </div>
            </label>
            <div class="read-more-wrap">
                <span class="read-more-target">
                    <div class="models">
                    <label for="submitbox">
                        <img for="submit" class="model" src="images/Box.svg" alt="">
                        <p>Box</p>
                        </label>
                    
                        <form name="hidden-form" action="AR_Drag_and_Drop.php" method="post">
                            <input type="hidden" name="Box" value="<a-box position='0 0.5 0' material='color: red; opacity: 0.5;' id='object'></a-box>">
                            <input name="submit" id="submitbox" type="submit" value="Box" />
                        </form>
                    </div>
                    <div class="models">
                        <label for="submitcylinder">
                        <img class="model" src="images/Cylinder.svg" alt="">
                        <p>Cylinder</p>
                        </label>

                        <form name="hidden-form" action="AR_Drag_and_Drop.php" method="post">
                            <input type="hidden" name="Cylinder" value="Cylinder">
                            <input name="submit" id="submitcylinder" type="submit" value="Cylinder" />
                        </form>
                    </div>
                    <div class="models">
                        <label for="submitsphere">
                        <img class="model" src="images/Sphere.svg" alt="">
                        <p>Sphere</p>
                        </label>
                        <form name="hidden-form" action="AR_Drag_and_Drop.php" method="post">
                            <input type="hidden" name="Sphere" value="<a-sphere position='0 0.5 0' material='color: red; opacity: 0.5;'></a-sphere>">
                            <input name="submit" id="submitsphere" type="submit" value="Sphere" />
                        </form>
                    </div>
                </span>
            </div>
        </div>
        <hr>
        <div class="left-content">
            <h1>Visuals</h1>
            <input type="text" id="visual-search" placeholder="Search on visuals">
            <div id="visuals">
            <input type="checkbox" class="read-more-state" id="post-3" />
            <label for="post-3" class="read-more-trigger">
                <div class="visuals">
                    <img class="visual" src="images/text.svg" alt="">
                    <p>Lable</p>
                </div>
</label>
            
                <div class="visuals">
                    <img class="visual" src="images/image.svg" alt="">
                    <p>Image</p>
                </div>
                <div class="read-more-wrap">
                <span class="read-more-target">
                    <div class="models">
                        <form action="AR_Drag_and_Drop.php" method="post">
                            <input type="text" name="label" id="labelname" value="Type text here..">
                            <input type="submit" name="textSubmit" id="submitsphere" value="Sphere" />
                        </form>
                    </div>
                </span>
            </div>
            </div>
        </div>
    </div>
    
    <?php
        spl_autoload_register(function ($class_name) {
            include 'C:\xampp\htdocs\SyncLab_AR_Prototip\webcontent\BL/'.$class_name . '.php';
        });


        $temp = new Temp("temp");
        $num =  $temp->getTheLastID() - 1;
    ?>

    <div id="right-container">
        <div class="right-content">
            <a href="http://localhost/SyncLab_AR_Prototip/webcontent/temp/temp<?php echo $num; ?>.php" target="_blank"><input id="test-button" type="button" value="Test"></a>
            
            <input id="save-button" type="button" value="Save">
        </div>
    </div>

    <?php
        $basicModel = filter_input(INPUT_POST, 'submit');
        
        $tempCount = "temp/temp".  $num .".php";

        if(isset($basicModel))
        {
            $box = filter_input(INPUT_POST, 'Box');
            $sphere = filter_input(INPUT_POST, 'Sphere');

            if(isset($box))
            {
                $f = fopen($tempCount, "r+");
                
                $oldstr = file_get_contents($tempCount);
                //$str_to_insert = "Write the string to insert here";
                $specificLine = "<a-marker preset='hiro' id='marker'>";
                
                
                //read lines with fgets() until you have reached the right one
                //insert the line and than write in the file.
                
                
                while (($buffer = fgets($f)) !== false) {
                    if (strpos($buffer, $specificLine) !== false) {
                        $pos = ftell($f); 
                        $newstr = substr_replace($oldstr, $box, $pos, 0);
                        file_put_contents($tempCount, $newstr);
                        break;
                    }
                }
                fclose($f);
            }

            if(isset($sphere))
            {
                $f = fopen($tempCount, "r+");
                
                $oldstr = file_get_contents($tempCount);
                //$str_to_insert = "Write the string to insert here";
                $specificLine = "<a-marker preset='hiro' id='marker'>";
                
                
                //read lines with fgets() until you have reached the right one
                //insert the line and than write in the file.
                
                
                while (($buffer = fgets($f)) !== false) {
                    if (strpos($buffer, $specificLine) !== false) {
                        $pos = ftell($f); 
                        $newstr = substr_replace($oldstr, $sphere, $pos, 0);
                        file_put_contents($tempCount, $newstr);
                        break;
                    }
                }
                fclose($f);
            }
        }

        //label
        $labelBtn =  filter_input(INPUT_POST, 'textSubmit');
        $labelText = filter_input(INPUT_POST, 'label');

        if(isset($labelBtn))
        {
            $f = fopen($tempCount, "r+");
            
            $oldstr = file_get_contents($tempCount);
            //$str_to_insert = "Write the string to insert here";
            $specificLine = "<a-marker preset='hiro' id='marker'>";
            
            
            //read lines with fgets() until you have reached the right one
            //insert the line and than write in the file.
            $htmlText = "<a-text value='".$labelText."'></a-text>";
            
            while (($buffer = fgets($f)) !== false) {
                if (strpos($buffer, $specificLine) !== false) {
                    $pos = ftell($f); 
                    $newstr = substr_replace($oldstr, $htmlText, $pos, 0);
                    file_put_contents($tempCount, $newstr);
                    break;
                }
            }
            fclose($f);
        }
    ?>

    <script>

        document.getElementById("loggedin-user").innerHTML = localStorage.username;

    </script>
</body>

</html>